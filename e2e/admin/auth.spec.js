const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

test.describe('admin authentication', () => {
    test('sends a guest to the login page', async ({ page }) => {
        await page.goto(`${adminUrl()}/module/blog`);

        await expect(page).toHaveURL(`${adminUrl()}/login`);
        await expect(page.locator('#login_form')).toBeVisible();
    });

    test('signs in and lands on the dashboard', async ({ page }) => {
        await signIn(page);

        const response = await page.goto(`${adminUrl()}/home`);

        expect(response.status()).toBe(200);
        await expect(page.locator('#login_form')).toHaveCount(0);
        await expect(page).toHaveTitle(/Porichoy|Dashboard|Home/i);
    });
});
