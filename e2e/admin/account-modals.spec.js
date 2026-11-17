const path = require('node:path');
const { test, expect } = require('@playwright/test');
const { ADMIN, ACCOUNT } = require('../support/servers');
const { signIn } = require('../support/admin');

/**
 * The topbar account modals: profile (names and picture) and password.
 *
 * The picture round trip happens here because the client half of it cannot be
 * unit tested: the preview, the hover overlay, the recovery after a rejected
 * upload and the messages for bodies PHP rejects before Laravel sees them.
 */

const PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.png');
const NOT_A_PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.pdf');

const DEFAULT_AVATAR = /static\/icons\/user\.png$/;
const STORED_PICTURE = /uploads\/users\/.+\.webp$/;

const PROFILE_MODAL = '#account_profile_modal';
const PASSWORD_MODAL = '#account_password_modal';

/**
 * Assert the toast and wait for it to go away: it sits over the topbar, where
 * the next click has to land.
 */
const waitForToast = async (page, message) => {
    await expect(page.locator('.swal2-toast')).toContainText(message);
    await expect(page.locator('.swal2-container')).toHaveCount(0);
};

const openAccountMenu = async (page) => {
    // A closing modal and its backdrop also sit over the topbar.
    await expect(page.locator('.modal-backdrop')).toHaveCount(0);
    await expect(page.locator('.swal2-container')).toHaveCount(0);

    const menu = page.locator('.nav-user .dropdown-menu');

    if (! (await menu.isVisible())) {
        await page.click('.nav-user .dropdown-toggle');
    }

    await expect(menu).toBeVisible();
};

const openProfile = async (page) => {
    await openAccountMenu(page);
    await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_profile_modal"]');
    await expect(page.locator(PROFILE_MODAL)).toBeVisible();
};

const openPassword = async (page) => {
    await openAccountMenu(page);
    await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_password_modal"]');
    await expect(page.locator(PASSWORD_MODAL)).toBeVisible();
};

const saveProfile = async (page) => {
    await page.click('#account_profile_form button[type="submit"]');
};

const fillPasswordForm = async (page, { current, next, confirm = next }) => {
    await page.fill('#account_password_current', current);
    await page.fill('#account_password_new', next);
    await page.fill('#account_password_confirmation', confirm);
};

const submitPassword = async (page) => {
    await page.click('#account_password_form button[type="submit"]');
};

/** Make PHP reject the body before Laravel ever validates it. */
const rejectBody = async (page, status) => {
    await page.route('**/account/profile', (route) =>
        route.fulfill({
            status,
            contentType: 'application/json',
            body: JSON.stringify({ message: 'rejected by the server' }),
        })
    );
};

test.describe('account modals', () => {
    test('the profile modal edits the names and keeps the email read-only', async ({ page }) => {
        await signIn(page);

        await openAccountMenu(page);
        const menu = page.locator('.nav-user .dropdown-menu');

        await expect(menu.locator('.dropdown-item', { hasText: 'Profile' })).toBeVisible();
        await expect(menu.locator('.dropdown-item', { hasText: 'Change Password' })).toBeVisible();
        await expect(menu.locator('.dropdown-item', { hasText: 'Account Settings' })).toHaveCount(0);
        await expect(menu.locator('.dropdown-item', { hasText: 'Notifications' })).toHaveCount(0);

        await openProfile(page);

        // Displayed, never editable.
        const email = page.locator('#account_profile_email');
        await expect(email).toBeDisabled();
        await expect(email).toHaveValue(ADMIN.email);

        await page.fill('#account_profile_first_name', 'Browser');
        await page.fill('#account_profile_last_name', 'Tester');
        await saveProfile(page);

        await waitForToast(page, 'Your profile has been updated.');
        await expect(page.locator(PROFILE_MODAL)).toBeHidden();
        await expect(page.locator('.nav-user h5')).toHaveText('Browser');

        // Reopening shows what was saved, and the address is still untouched.
        await openProfile(page);
        await expect(page.locator('#account_profile_first_name')).toHaveValue('Browser');
        await expect(page.locator('#account_profile_email')).toHaveValue(ADMIN.email);

        // Leave the seeded account as the rest of the run expects it.
        await page.fill('#account_profile_first_name', 'E2E');
        await page.fill('#account_profile_last_name', 'Admin');
        await saveProfile(page);
        await waitForToast(page, 'Your profile has been updated.');
        await expect(page.locator('.nav-user h5')).toHaveText('E2E');
    });

    test('the picture is uploaded, removed from the avatar overlay and survives a rejection', async ({ page }) => {
        await signIn(page);
        await openProfile(page);

        const avatar = page.locator('#account_profile_avatar');
        const overlay = page.locator('#account_profile_remove_picture');

        // Upload: the stored file is a WebP and the topbar follows it.
        await page.setInputFiles('#account_profile_picture', PICTURE);
        await saveProfile(page);

        await waitForToast(page, 'Your profile has been updated.');
        await expect(page.locator('.nav-user .topbar-link img')).toHaveAttribute('src', STORED_PICTURE);

        await openProfile(page);
        await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
        await expect(overlay).not.toHaveClass(/d-none/);

        // The removal control is the picture itself, explained by a tooltip.
        const wrapper = page.locator('#account_profile_avatar_wrapper');
        const opacity = () => overlay.evaluate((el) => getComputedStyle(el).opacity);

        expect(await opacity()).toBe('0');
        await wrapper.hover();
        await expect.poll(opacity).toBe('1');

        await page.hover('#account_profile_remove_picture');
        await expect(page.locator('.tooltip-inner')).toHaveText('Remove your profile picture');

        // Arming swaps the preview, the icon and the tooltip; undo restores them.
        await overlay.click();
        await expect(wrapper).toHaveClass(/is-armed/);
        await expect(overlay).toHaveAttribute('aria-label', 'Keep your current picture');
        await expect(avatar).toHaveAttribute('src', DEFAULT_AVATAR);

        await page.hover('#account_profile_remove_picture');
        await expect(page.locator('.tooltip-inner')).toHaveText('Keep your current picture');

        await overlay.click();
        await expect(wrapper).not.toHaveClass(/is-armed/);
        await expect(avatar).toHaveAttribute('src', STORED_PICTURE);

        // A file the server refuses: the message is shown, the pick is dropped
        // and the stored picture comes back instead of a broken preview.
        const errors = page.locator('#account_profile_form .account-errors');

        await page.setInputFiles('#account_profile_picture', NOT_A_PICTURE);
        await saveProfile(page);

        await expect(errors).toBeVisible();
        await expect(errors).toContainText(/profile picture/i);
        await expect(page.locator(PROFILE_MODAL)).toBeVisible();
        await expect(page.locator('#account_profile_picture')).toHaveValue('');
        await expect(avatar).toHaveAttribute('src', STORED_PICTURE);

        // PHP rejects the whole body: 413 when it is too large...
        await rejectBody(page, 413);
        await page.setInputFiles('#account_profile_picture', PICTURE);
        await saveProfile(page);

        await expect(errors).toContainText('HTTP 413');
        await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
        await page.unroute('**/account/profile');

        // ...and 419 when the body never reaches Laravel at all.
        await rejectBody(page, 419);
        await page.setInputFiles('#account_profile_picture', PICTURE);
        await saveProfile(page);

        await expect(errors).toContainText(/dropped the upload/i);
        await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
        await page.unroute('**/account/profile');

        // Without a file the same 419 means the session went away.
        await rejectBody(page, 419);
        await saveProfile(page);

        await expect(errors).toContainText(/session expired/i);
        await page.unroute('**/account/profile');

        // Removing still works after all of that, and leaves the disk clean.
        await wrapper.hover();
        await overlay.click();
        await saveProfile(page);

        await waitForToast(page, 'Your profile has been updated.');
        await expect(page.locator('.nav-user .topbar-link img')).toHaveAttribute('src', DEFAULT_AVATAR);

        await openProfile(page);
        await expect(page.locator('#account_profile_remove_picture')).toHaveClass(/d-none/);
        await expect(page.locator('#account_profile_avatar')).toHaveAttribute('src', DEFAULT_AVATAR);
    });

    test('the password modal gates the change and rotates the password', async ({ page }) => {
        // A second account, so this test never leaves the run without a sign-in.
        await signIn(page, ACCOUNT);

        const hint = page.locator('#account_password_hint');
        const errors = page.locator('#account_password_form .account-errors');
        const rotated = 'Rotated#2026';

        await openPassword(page);

        // The sign-up strength meter is reused here.
        await expect(page.locator('#account_password_modal .password-bar .strong-bar')).toHaveCount(4);

        // Blocked in the browser before the request goes out.
        await fillPasswordForm(page, { current: ACCOUNT.password, next: 'weakpass' });
        await submitPassword(page);
        await expect(hint).toContainText('8+ characters');

        await fillPasswordForm(page, { current: ACCOUNT.password, next: rotated, confirm: 'Rotated#2027' });
        await submitPassword(page);
        await expect(hint).toContainText('do not match');

        await fillPasswordForm(page, { current: ACCOUNT.password, next: ACCOUNT.password });
        await submitPassword(page);
        await expect(hint).toContainText('must be different from your current password');

        // Rejected by the server.
        await fillPasswordForm(page, { current: 'Not-My-Password#1', next: rotated });
        await submitPassword(page);
        await expect(errors).toContainText(/password is incorrect/i);

        // Accepted.
        await fillPasswordForm(page, { current: ACCOUNT.password, next: rotated });
        await submitPassword(page);
        await waitForToast(page, 'Your password has been changed.');
        await expect(page.locator(PASSWORD_MODAL)).toBeHidden();

        // The seeded password no longer matches...
        await openPassword(page);
        await fillPasswordForm(page, { current: ACCOUNT.password, next: 'Rotated#2027' });
        await submitPassword(page);
        await expect(errors).toContainText(/password is incorrect/i);

        // ...so put the account back for the next run.
        await fillPasswordForm(page, { current: rotated, next: ACCOUNT.password });
        await submitPassword(page);
        await waitForToast(page, 'Your password has been changed.');
        await expect(page.locator(PASSWORD_MODAL)).toBeHidden();
    });
});
