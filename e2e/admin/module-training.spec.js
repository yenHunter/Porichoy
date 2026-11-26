const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');
const { waitForStoredPick } = require('../support/filepond');

const PAGE = '/module/training';
const CERTIFICATE_INPUT = '#create_update_form input[name="training_certificate"][type="file"]';
const TYPE_ERROR = 'must be a PDF, JPG or PNG file';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const TITLE = `Laravel ${UNIQUE}`;
const CERT_TITLE = `Certified ${UNIQUE}`;
const KEPT_TITLE = `Kept ${UNIQUE}`;
const REMOVED_TITLE = `Removed ${UNIQUE}`;
const DATED_TITLE = `Dated ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-training tr', { hasText: text });
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

async function createTraining(page, title, { certificate = false } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.fill('#training_title', title);
    await page.selectOption('#training_category', { index: 1 });
    await page.fill('#training_institute', 'E2E Academy');
    await page.fill('#start_date', '2020-01-01');
    await page.fill('#end_date', '2020-06-30');

    if (certificate) {
        await page.setInputFiles(CERTIFICATE_INPUT, FIXTURE_IMAGE);
        await waitForStoredPick(page, 'training_certificate');
    }

    await save(page);
}

async function openEdit(page, title) {
    const row = await findRow(page, title);
    await expect(row).toBeVisible();

    // After a save the page has just reloaded; the module binds the edit button.
    await expect(page.locator('.filepond--root')).toHaveCount(1);

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

test.describe('training module', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // FilePond is built by the page's module, so its existence (it lives in
        // the closed modal) means the page's handlers are bound too.
        await expect(page.locator('.filepond--root')).toHaveCount(1);
    });

    test('creates a training record through the modal', async ({ page }) => {
        await createTraining(page, TITLE);

        await expect(await findRow(page, TITLE)).toBeVisible();
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        // Everything is valid in the browser, so only the server can reject it.
        await page.fill('#training_title', 'X'.repeat(260));
        await page.selectOption('#training_category', { index: 1 });
        await page.fill('#training_institute', 'E2E Academy');

        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#training_title')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'training title field must not be greater than 255 characters'
        );
        await expect(page.locator('#training_institute')).toHaveValue('E2E Academy');
    });

    test('rejects an end date before the start date without posting it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#training_title', TITLE);
        await page.selectOption('#training_category', { index: 1 });
        await page.fill('#training_institute', 'E2E Academy');
        await page.fill('#start_date', '2020-01-01');
        await page.fill('#end_date', '2019-01-01');

        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'on or after the start date'
        );

        await page.click('#create_update_form button[type="submit"]');
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('.alert-success')).toHaveCount(0);
    });

    test('replaces a rejected certificate with the valid file that follows it', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Wrong type: rejected by the browser, nothing is posted.
        await page.setInputFiles(CERTIFICATE_INPUT, {
            name: 'notes.txt',
            mimeType: 'text/plain',
            buffer: Buffer.from('not a certificate'),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText(TYPE_ERROR);

        // The rejected item has to go, or the field looks like it holds two files.
        // (FilePond's hidden screen-reader alert keeps the last message, so
        // only the item list is meaningful here.)
        await page.setInputFiles(CERTIFICATE_INPUT, FIXTURE_IMAGE);
        await expect(page.locator('.filepond--item')).toHaveCount(1);
        await expect(page.locator('.filepond--item').getByText(TYPE_ERROR)).toHaveCount(0);
    });

    test('refuses an oversized certificate as soon as it is picked', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');

        // Oversized image: the 10 MB ceiling is the one the server enforces.
        await page.setInputFiles(CERTIFICATE_INPUT, {
            name: 'huge.png',
            mimeType: 'image/png',
            buffer: Buffer.alloc(11 * 1024 * 1024),
        });
        await expect(page.locator('.filepond--file-status-main')).toContainText('too large');
        await expect(page.locator('.filepond--file-status-sub')).toContainText('10 MB');
    });

    test('shows the stored certificate when editing', async ({ page }) => {
        await createTraining(page, CERT_TITLE, { certificate: true });
        await openEdit(page, CERT_TITLE);

        await expect(page.locator('#current_training_certificate')).toBeVisible();
        await expect(page.locator('#current_training_certificate_link')).toHaveAttribute(
            'href',
            /uploads\/training\/.+\.png$/
        );
    });

    test('keeps the certificate when an edit does not touch it', async ({ page }) => {
        await createTraining(page, KEPT_TITLE, { certificate: true });
        await openEdit(page, KEPT_TITLE);

        // Nothing is picked, typed or removed; the stored file must survive.
        await save(page);

        const row = await findRow(page, KEPT_TITLE);
        await expect(row.locator('td').nth(1).locator('a')).toHaveAttribute(
            'href',
            /uploads\/training\/.+\.png$/
        );
    });

    test('removes the stored certificate when asked', async ({ page }) => {
        await createTraining(page, REMOVED_TITLE, { certificate: true });
        await openEdit(page, REMOVED_TITLE);

        await page.click('#current_training_certificate_remove');
        await expect(page.locator('#current_training_certificate')).toBeHidden();
        await expect(page.locator('#current_training_certificate_removed')).toBeVisible();

        await save(page);

        // The certificate column no longer links anywhere once the file is gone.
        const row = await findRow(page, REMOVED_TITLE);
        await expect(row.locator('td').nth(1).locator('a')).toHaveCount(0);
    });

    test('prefills the local dates when editing', async ({ page }) => {
        await createTraining(page, DATED_TITLE);
        await openEdit(page, DATED_TITLE);

        await expect(page.locator('#start_date')).toHaveValue('2020-01-01');
        await expect(page.locator('#end_date')).toHaveValue('2020-06-30');
    });
});
