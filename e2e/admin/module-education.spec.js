const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/education';
const LOGO_INPUT = '#create_update_form input[name="institute_logo"]';
const TYPE_ERROR = 'must be a JPEG, PNG, GIF or WebP image';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const FIXTURE_PDF = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.pdf');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const DEGREE = `BSc in Testing ${UNIQUE}`;
const LOGO_DEGREE = `BSc in Logos ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-education tr', { hasText: text });
}

test.describe('education module', () => {
    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // FilePond is built by the page's module, so its existence (it lives in
        // the closed modal) means the page's handlers are bound too.
        await expect(page.locator('.filepond--root')).toHaveCount(1);
    });

    test('creates a degree through the modal', async ({ page }) => {
        // create
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_degree', DEGREE);
        await page.fill('#education_institute', 'E2E University');
        await page.fill('#start_date', '2020-01-01');
        await page.click('#create_update_form button[type="submit"]');

        await expect(await findRow(page, DEGREE)).toBeVisible();
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
        // create a record that has a logo
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_degree', LOGO_DEGREE);
        await page.fill('#education_institute', 'E2E University');
        await page.fill('#start_date', '2020-01-01');
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
        await page.click('#create_update_form button[type="submit"]');

        const created = await findRow(page, LOGO_DEGREE);
        await expect(created).toBeVisible();

        // The save reloads the page, so wait for the module to bind again.
        await expect(page.locator('.filepond--root')).toHaveCount(1);

        // edit: the modal shows what is already saved
        await created.locator('.btn-edit').click();
        await expect(page.locator('#current_institute_logo')).toBeVisible();
        await expect(page.locator('#current_institute_logo_image')).toHaveAttribute(
            'src',
            /uploads\/education\/.+\.webp$/
        );
    });
});
