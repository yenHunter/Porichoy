const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/education';
const UNIQUE = Math.random().toString(36).substring(2, 15);
const DEGREE = `BSc in Testing ${UNIQUE}`;

test.describe('education module', () => {
    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);
    });

    test('creates a degree through the modal', async ({ page }) => {
        // create
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#education_degree', DEGREE);
        await page.fill('#education_institute', 'E2E University');
        await page.fill('#start_date', '2020-01-01');
        await page.click('#create_update_form button[type="submit"]');

        const created = page.locator('#sortable-education tr', { hasText: DEGREE });
        await expect(created).toBeVisible();
    });
});