const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');
const { waitForStoredPick } = require('../support/filepond');

const PAGE = '/element/project';
const PROFILE_INPUT = '#create_update_form input[name="profile_image"][type="file"]';
const TYPE_ERROR = 'must be a JPEG, PNG, GIF or WebP file';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const TITLE = `Portfolio ${UNIQUE}`;
const IMAGE_TITLE = `Imaged ${UNIQUE}`;
const KEPT_TITLE = `Kept ${UNIQUE}`;
const REMOVED_TITLE = `Removed ${UNIQUE}`;
const DATED_TITLE = `Dated ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-project tr', { hasText: text });
}

/**
 * The modal is saved over JS and then reloads the listing, so wait for that
 * reload before reading anything off the page: an older success banner or the
 * previous table would otherwise answer too early.
 */
async function save(page) {
    const documentBefore = await page.evaluate(() => performance.timeOrigin);

    await page.click('#create_update_form button[type="submit"]');

    // A new timeOrigin means the reloaded document is up. The load event can
    // fire before this test listens for it, and an evaluate that lands
    // mid-navigation is itself proof the reload started.
    await expect.poll(async () => {
        try {
            return await page.evaluate(() => performance.timeOrigin);
        } catch (error) {
            if (String(error).includes('Execution context was destroyed')) {
                return 'navigating';
            }

            throw error;
        }
    }).not.toBe(documentBefore);
    await expect(page.locator('.alert-success')).toBeVisible();
}

async function createProject(page, title, { image = false } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.fill('#project_title', title);
    await page.fill('#start_date', '2020-01-01');
    await page.fill('#end_date', '2020-06-30');

    if (image) {
        await page.setInputFiles(PROFILE_INPUT, FIXTURE_IMAGE);
        await waitForStoredPick(page, 'profile_image');
    }

    await save(page);
}

async function openEdit(page, title) {
    const row = await findRow(page, title);
    await expect(row).toBeVisible();

    // After a save the page has just reloaded; the module binds the edit button.
    await expect(page.locator('.filepond--root')).toHaveCount(2);

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

test.describe('project element', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // FilePond is built by the page's module, so its existence (it lives in
        // the closed modal) means the page's handlers are bound too. The project
        // form has two pickers: profile and cover image.
        await expect(page.locator('.filepond--root')).toHaveCount(2);
    });

    test('creates a project record through the modal', async ({ page }) => {
        await createProject(page, TITLE);

        await expect(await findRow(page, TITLE)).toBeVisible();
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        // Everything is valid in the browser, so only the server can reject it.
        await page.fill('#project_title', 'X'.repeat(260));
        // Required in the browser as well; without it the form never submits.
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#project_location', 'Dhaka');

        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#project_title')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'project title field must not be greater than 255 characters'
        );
        await expect(page.locator('#project_location')).toHaveValue('Dhaka');
    });

    test('rejects an end date before the start date without posting it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#project_title', TITLE);
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#end_date', '2019-01-01');

        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'on or after the start date'
        );

        await page.click('#create_update_form button[type="submit"]');
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('.alert-success')).toHaveCount(0);
    });

    test('replaces a rejected image with the valid file that follows it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Wrong type: rejected by the browser, nothing is posted.
        await page.setInputFiles(PROFILE_INPUT, {
            name: 'notes.txt',
            mimeType: 'text/plain',
            buffer: Buffer.from('not an image'),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText(TYPE_ERROR);

        // The rejected item has to go, or the field looks like it holds two files.
        // (FilePond's hidden screen-reader alert keeps the last message, so
        // only the item list is meaningful here.)
        await page.setInputFiles(PROFILE_INPUT, FIXTURE_IMAGE);
        await expect(page.locator('.filepond--item')).toHaveCount(1);
        await expect(page.locator('.filepond--item').getByText(TYPE_ERROR)).toHaveCount(0);
    });

    test('refuses an oversized image as soon as it is picked', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Oversized image: the 10 MB ceiling is the one the server enforces.
        await page.setInputFiles(PROFILE_INPUT, {
            name: 'huge.png',
            mimeType: 'image/png',
            buffer: Buffer.alloc(11 * 1024 * 1024),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText('too large');
        await expect(page.locator('.filepond--file-status-sub')).toContainText('10 MB');
    });

    test('shows the stored profile image when editing', async ({ page }) => {
        await createProject(page, IMAGE_TITLE, { image: true });
        await openEdit(page, IMAGE_TITLE);

        await expect(page.locator('#current_profile_image')).toBeVisible();
        await expect(page.locator('#current_profile_image_preview')).toHaveAttribute(
            'src',
            /uploads\/project\/profile\/.+\.webp$/
        );
        // A project without a cover image has no card to show.
        await expect(page.locator('#current_cover_image')).toBeHidden();
    });

    test('keeps the profile image when an edit does not touch it', async ({ page }) => {
        await createProject(page, KEPT_TITLE, { image: true });
        await openEdit(page, KEPT_TITLE);

        // Nothing is picked or removed; the stored image must survive.
        await save(page);

        const row = await findRow(page, KEPT_TITLE);
        await expect(row.locator('td').nth(1).locator('img')).toHaveAttribute(
            'src',
            /uploads\/project\/profile\/.+\.webp$/
        );
    });

    test('removes the stored profile image when asked', async ({ page }) => {
        await createProject(page, REMOVED_TITLE, { image: true });
        await openEdit(page, REMOVED_TITLE);

        await page.click('#current_profile_image_remove');
        await expect(page.locator('#current_profile_image')).toBeHidden();
        await expect(page.locator('#current_profile_image_removed')).toBeVisible();

        await save(page);

        // The row falls back to the module placeholder once the file is gone.
        const row = await findRow(page, REMOVED_TITLE);
        await expect(row.locator('td').nth(1).locator('img')).toHaveAttribute(
            'src',
            /static\/module\/project\.png$/
        );
    });

    test('prefills the local dates when editing', async ({ page }) => {
        await createProject(page, DATED_TITLE);
        await openEdit(page, DATED_TITLE);

        await expect(page.locator('#start_date')).toHaveValue('2020-01-01');
        await expect(page.locator('#end_date')).toHaveValue('2020-06-30');
    });
});
