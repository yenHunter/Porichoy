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
const REMOVED_DEGREE = `BSc in Removals ${UNIQUE}`;
const CURRENT_DEGREE = `BSc in Progress ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-education tr', { hasText: text });
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

async function createDegree(page, degree, { logo = false, endDate = '2024-06-30' } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.fill('#education_degree', degree);
    await page.fill('#education_institute', 'E2E University');
    await page.fill('#start_date', '2020-01-01');

    if (endDate) {
        await page.fill('#end_date', endDate);
    }

    if (logo) {
        await page.setInputFiles(LOGO_INPUT, FIXTURE_IMAGE);
    }

    await save(page);
}

async function openEdit(page, degree) {
    const row = await findRow(page, degree);
    await expect(row).toBeVisible();

    // After a save the page has just reloaded; the module binds the edit button.
    await expect(page.locator('.filepond--root')).toHaveCount(1);

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

test.describe('education module', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // FilePond is built by the page's module, so its existence (it lives in
        // the closed modal) means the page's handlers are bound too.
        await expect(page.locator('.filepond--root')).toHaveCount(1);
    });

    test('creates a degree through the modal', async ({ page }) => {
        await createDegree(page, DEGREE);

        await expect(await findRow(page, DEGREE)).toBeVisible();
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_institute', 'E2E University');
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#end_date', '2024-06-30');
        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#education_degree')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'education degree field is required'
        );
        await expect(page.locator('#education_institute')).toHaveValue('E2E University');
    });

    test('rejects an end date before the start date without posting it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_degree', DEGREE);
        await page.fill('#education_institute', 'E2E University');
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
        await createDegree(page, LOGO_DEGREE, { logo: true });
        await openEdit(page, LOGO_DEGREE);

        await expect(page.locator('#current_institute_logo')).toBeVisible();
        await expect(page.locator('#current_institute_logo_image')).toHaveAttribute(
            'src',
            /uploads\/education\/.+\.webp$/
        );
    });

    test('removes the stored logo when asked', async ({ page }) => {
        await createDegree(page, REMOVED_DEGREE, { logo: true });
        await openEdit(page, REMOVED_DEGREE);

        await page.click('#current_institute_logo_remove');
        await expect(page.locator('#current_institute_logo')).toBeHidden();
        await expect(page.locator('#current_institute_logo_removed')).toBeVisible();

        await save(page);

        // The row falls back to the placeholder image once the logo is gone.
        const row = await findRow(page, REMOVED_DEGREE);
        await expect(row.locator('img')).toHaveAttribute('src', /static\/module\/education\.png$/);
    });

    test('restores the current-degree state on edit', async ({ page }) => {
        await createDegree(page, CURRENT_DEGREE, { endDate: '2024-06-30' });
        await openEdit(page, CURRENT_DEGREE);

        await expect(page.locator('#end_date')).toHaveValue('2024-06-30');
        await expect(page.locator('#current_degree')).not.toBeChecked();

        await page.check('#current_degree');
        await expect(page.locator('#end_date')).toHaveValue('');
        await expect(page.locator('#end_date')).toBeDisabled();
    });
});
