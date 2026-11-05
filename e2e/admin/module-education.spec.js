const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/education';
// Unique per run so a failed attempt cannot leave a row this run collides with.
const DEGREE = `BSc in Testing ${Date.now()}`;
const RENAMED = `MSc in Testing ${Date.now()}`;

test.describe('education module', () => {
    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);
    });

    test('creates, edits and deletes a degree through the modal', async ({ page }) => {
        // create
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_degree', DEGREE);
        await page.fill('#education_institute', 'E2E University');
        await page.fill('#start_date', '2020-01-01');
        await page.click('#create_update_form button[type="submit"]');

        const created = page.locator('#sortable-education tr', { hasText: DEGREE });
        await expect(created).toBeVisible();

        // edit: the modal is filled from the row payload
        await created.locator('.btn-edit').click();
        await expect(page.locator('#education_degree')).toHaveValue(DEGREE);
        await expect(page.locator('#education_institute')).toHaveValue('E2E University');
        await expect(page.locator('#start_date')).toHaveValue('2020-01-01');

        await page.fill('#education_degree', RENAMED);
        await page.click('#create_update_form button[type="submit"]');

        const updated = page.locator('#sortable-education tr', { hasText: RENAMED });
        await expect(updated).toBeVisible();
        await expect(page.locator('#sortable-education tr', { hasText: DEGREE })).toHaveCount(0);

        // delete goes through the confirmation dialog
        await updated.locator('.btn-delete').click();
        await page.click('.swal2-confirm');

        await expect(page.locator('#sortable-education tr', { hasText: RENAMED })).toHaveCount(0);
    });
});
