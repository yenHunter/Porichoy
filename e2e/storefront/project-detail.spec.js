const { test, expect } = require('@playwright/test');
const { THEMES, baseUrl } = require('../support/servers');

for (const theme of THEMES.filter((theme) => theme.pages)) {
    test.describe(`${theme.name} theme`, () => {
        test('opens a detail page from the project listing', async ({ page }) => {
            const listing = await page.goto(`${baseUrl(theme)}/projects`);
            expect(listing.status()).toBe(200);

            const card = page.locator('a[href*="/project/"]').first();
            await expect(card).toBeVisible();

            const [detail] = await Promise.all([
                page.waitForResponse(
                    (response) => response.request().isNavigationRequest() && response.url().includes('/project/'),
                ),
                card.click(),
            ]);

            expect(detail.status()).toBe(200);
            expect(page.url()).toContain('/project/');
            expect(await page.locator(`link[href*="visitor/${theme.name}/"]`).count()).toBeGreaterThan(0);
        });
    });
}
