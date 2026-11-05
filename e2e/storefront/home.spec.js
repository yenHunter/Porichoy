const { test, expect } = require('@playwright/test');
const { THEMES, baseUrl } = require('../support/servers');

for (const theme of THEMES) {
    test.describe(`${theme.name} theme`, () => {
        test('home page renders with its own assets', async ({ page }) => {
            const response = await page.goto(baseUrl(theme));

            expect(response.status()).toBe(200);
            expect(await page.locator(`link[href*="visitor/${theme.name}/"]`).count()).toBeGreaterThan(0);
        });
    });
}
