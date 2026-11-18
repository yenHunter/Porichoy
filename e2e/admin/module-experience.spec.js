const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/experience';
const LOGO_INPUT = '#create_update_form input[name="organization_logo"]';
const TYPE_ERROR = 'must be a JPEG, PNG, GIF or WebP image';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const FIXTURE_PDF = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.pdf');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const POSITION = `Engineer ${UNIQUE}`;
const LOGO_POSITION = `Designer ${UNIQUE}`;
const REMOVED_POSITION = `Analyst ${UNIQUE}`;
const CURRENT_POSITION = `Lead ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-experience tr', { hasText: text });
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

async function createRole(page, position, { logo = false, endDate = '2024-06-30' } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.fill('#employment_position', position);
    await page.selectOption('#employment_type', { index: 1 });
    await page.fill('#employment_organization', 'E2E Company');
    await page.fill('#start_date', '2020-01-01');

    if (endDate) {
        await page.fill('#end_date', endDate);
    }

    if (logo) {
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
    }

    await save(page);
}

async function openEdit(page, position) {
    const row = await findRow(page, position);
    await expect(row).toBeVisible();

    // After a save the page has just reloaded; the module binds the edit button.
    await expect(page.locator('.filepond--root')).toHaveCount(1);

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

test.describe('experience module', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // FilePond is built by the page's module, so its existence (it lives in
        // the closed modal) means the page's handlers are bound too.
        await expect(page.locator('.filepond--root')).toHaveCount(1);
    });

    test('creates a role through the modal', async ({ page }) => {
        await createRole(page, POSITION);

        await expect(await findRow(page, POSITION)).toBeVisible();
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        // Only the position is left empty, so the modal holds a single error.
        await page.selectOption('#employment_type', { index: 1 });
        await page.fill('#employment_organization', 'E2E Company');
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#end_date', '2024-06-30');
        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#employment_position')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'employment position field is required'
        );
        await expect(page.locator('#employment_organization')).toHaveValue('E2E Company');
    });

    test('rejects an end date before the start date without posting it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#employment_position', POSITION);
        await page.selectOption('#employment_type', { index: 1 });
        await page.fill('#employment_organization', 'E2E Company');
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#end_date', '2019-01-01');

        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'on or after the start date'
        );

        await page.click('#create_update_form button[type="submit"]');
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('.alert-success')).toHaveCount(0);
    });

    test('replaces a rejected logo with the valid file that follows it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Wrong type: rejected by the browser, nothing is posted.
        await page.setInputFiles(LOGO_INPUT, FIXTURE_PDF);
        await expect(page.locator('.filepond--file-status-main')).toContainText(TYPE_ERROR);

        // The rejected item has to go, or the field looks like it holds two files.
        // (FilePond's hidden screen-reader alert keeps the last message, so
        // only the item list is meaningful here.)
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
        await expect(page.locator('.filepond--item')).toHaveCount(1);
        await expect(page.locator('.filepond--item').getByText(TYPE_ERROR)).toHaveCount(0);
    });

    test('refuses an oversized logo as soon as it is picked', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Oversized image: the 10 MB ceiling is the one the server enforces.
        await page.setInputFiles(LOGO_INPUT, {
            name: 'huge.png',
            mimeType: 'image/png',
            buffer: Buffer.alloc(11 * 1024 * 1024),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText('too large');
        await expect(page.locator('.filepond--file-status-sub')).toContainText('10 MB');
    });

    test('shows the stored logo when editing', async ({ page }) => {
        await createRole(page, LOGO_POSITION, { logo: true });
        await openEdit(page, LOGO_POSITION);

        await expect(page.locator('#current_organization_logo')).toBeVisible();
        await expect(page.locator('#current_organization_logo_image')).toHaveAttribute(
            'src',
            /uploads\/experience\/.+\.webp$/
        );
    });

    test('removes the stored logo when asked', async ({ page }) => {
        await createRole(page, REMOVED_POSITION, { logo: true });
        await openEdit(page, REMOVED_POSITION);

        await page.click('#current_organization_logo_remove');
        await expect(page.locator('#current_organization_logo')).toBeHidden();
        await expect(page.locator('#current_organization_logo_removed')).toBeVisible();

        await save(page);

        // The row falls back to the placeholder image once the logo is gone.
        const row = await findRow(page, REMOVED_POSITION);
        await expect(row.locator('img')).toHaveAttribute('src', /static\/module\/experience\.png$/);
    });

    test('restores the current-position state on edit', async ({ page }) => {
        await createRole(page, CURRENT_POSITION, { endDate: '2024-06-30' });
        await openEdit(page, CURRENT_POSITION);

        await expect(page.locator('#end_date')).toHaveValue('2024-06-30');
        await expect(page.locator('#current_position')).not.toBeChecked();

        await page.check('#current_position');
        await expect(page.locator('#end_date')).toHaveValue('');
        await expect(page.locator('#end_date')).toBeDisabled();
    });
});
