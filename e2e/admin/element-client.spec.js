const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');
const { waitForStoredPick } = require('../support/filepond');

const PAGE = '/element/client';
const PICTURE_INPUT = '#create_update_form input[name="client_picture"]';
const LOGO_INPUT = '#create_update_form input[name="organization_logo"]';
const TYPE_ERROR = 'must be a JPEG, PNG, GIF or WebP image';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const FIXTURE_PDF = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.pdf');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const NAME = `Acme ${UNIQUE}`;
const IMAGE_NAME = `Imaged ${UNIQUE}`;
const REMOVED_NAME = `Removed ${UNIQUE}`;
const KEPT_NAME = `Kept ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-client tr', { hasText: text });
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

async function createClient(page, name, { picture = false, logo = false } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.fill('#client_name', name);
    await page.fill('#client_email', `${name.replace(/\s+/g, '.').toLowerCase()}@example.test`);

    if (picture) {
        await page.setInputFiles(PICTURE_INPUT, FIXTURE_IMAGE);
        await waitForStoredPick(page, 'client_picture');
    }

    if (logo) {
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
        await waitForStoredPick(page, 'organization_logo');
    }

    await save(page);
}

async function openEdit(page, name) {
    const row = await findRow(page, name);
    await expect(row).toBeVisible();

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

/**
 * Bootstrap ignores a hide request that arrives while the modal is still
 * animating open, so retry the close instead of asserting on the first click.
 */
async function closeModal(page) {
    await expect(async () => {
        await page.click('#create_update_modal .btn-light');
        await expect(page.locator('#create_update_modal')).not.toHaveClass(/show/, {
            timeout: 500,
        });
    }).toPass({ timeout: 15_000 });
}

test.describe('client element', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // Both FilePonds are built by the page's module, so their existence
        // means the page's handlers are bound too.
        await expect(page.locator('.filepond--root')).toHaveCount(2);
    });

    test('creates a client record through the modal', async ({ page }) => {
        await createClient(page, NAME);

        await expect(await findRow(page, NAME)).toBeVisible();
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        // Everything is valid in the browser, so only the server can reject it.
        await page.fill('#client_name', 'X'.repeat(260));
        await page.fill('#client_email', 'acme@example.test');

        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#client_name')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'client name field must not be greater than 255 characters'
        );
        await expect(page.locator('#client_email')).toHaveValue('acme@example.test');
    });

    test('replaces a rejected logo with the valid file that follows it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Wrong type: rejected by the browser, nothing is posted.
        await page.setInputFiles(LOGO_INPUT, FIXTURE_PDF);
        await expect(page.locator('.filepond--file-status-main')).toContainText(TYPE_ERROR);

        // The rejected item has to go, or the field looks like it holds two files.
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
        await expect(page.locator('.filepond--item')).toHaveCount(1);
        await expect(page.locator('.filepond--item').getByText(TYPE_ERROR)).toHaveCount(0);
    });

    test('refuses an oversized picture as soon as it is picked', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        await page.setInputFiles(PICTURE_INPUT, {
            name: 'huge.png',
            mimeType: 'image/png',
            buffer: Buffer.alloc(11 * 1024 * 1024),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText('too large');
        await expect(page.locator('.filepond--file-status-sub')).toContainText('10 MB');
    });

    test('shows the stored images when editing', async ({ page }) => {
        await createClient(page, IMAGE_NAME, { picture: true, logo: true });
        await openEdit(page, IMAGE_NAME);

        await expect(page.locator('#current_client_picture')).toBeVisible();
        await expect(page.locator('#current_client_picture_image')).toHaveAttribute(
            'src',
            /uploads\/client\/image\/.+\.webp$/
        );
        await expect(page.locator('#current_organization_logo')).toBeVisible();
        await expect(page.locator('#current_organization_logo_image')).toHaveAttribute(
            'src',
            /uploads\/client\/organization\/.+\.webp$/
        );
    });

    test('keeps the logo when an edit does not touch it', async ({ page }) => {
        await createClient(page, KEPT_NAME, { logo: true });
        await openEdit(page, KEPT_NAME);

        // Nothing is picked or removed; the stored file must survive the save.
        await save(page);

        await openEdit(page, KEPT_NAME);
        await expect(page.locator('#current_organization_logo')).toBeVisible();
    });

    test('removes the stored logo when asked', async ({ page }) => {
        await createClient(page, REMOVED_NAME, { logo: true });
        await openEdit(page, REMOVED_NAME);

        await page.click('#current_organization_logo_remove');
        await expect(page.locator('#current_organization_logo')).toBeHidden();
        await expect(page.locator('#current_organization_logo_removed')).toBeVisible();

        await save(page);

        // With the logo gone the card no longer appears when the record is reopened.
        await openEdit(page, REMOVED_NAME);
        await expect(page.locator('#current_organization_logo')).toBeHidden();
    });

    test('shows a blank create form after closing an edit', async ({ page }) => {
        await createClient(page, `Reset ${UNIQUE}`);
        await openEdit(page, `Reset ${UNIQUE}`);

        await closeModal(page);

        await page.click('a[data-bs-target="#create_update_modal"]');

        await expect(page.locator('#create_update_modal_title')).toHaveText('Create client info');
        await expect(page.locator('#client_name')).toHaveValue('');
        await expect(page.locator('#client_email')).toHaveValue('');
        await expect(page.locator('#client_status')).toHaveValue('1');
        await expect(page.locator('.filepond--item')).toHaveCount(0);
        await expect(page.locator('#current_organization_logo')).toBeHidden();
    });
});
