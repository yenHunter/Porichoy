const { test, expect } = require('@playwright/test');
const { THEMES, baseUrl } = require('./support/servers');
const { stubCaptchaWidget, VALID_TOKEN, INVALID_TOKEN } = require('./support/captcha');

const MESSAGE = 'Hello from the storefront smoke test.';

/** The visible contact form on screen: dorbesh keeps it on the home page. */
function contactForm(page) {
    return page
        .locator('form')
        .filter({ has: page.locator('[name="comments"]') })
        .filter({ visible: true })
        .first();
}

async function fillAndSubmit(page) {
    const form = contactForm(page);

    await form.locator('[name="name"]').fill('Ada Lovelace');
    await form.locator('[name="email"]').fill('ada@example.com');

    const phone = form.locator('[name="phone"]');
    if (await phone.count()) {
        await phone.first().fill('+8801000000000');
    }

    await form.locator('[name="comments"]').fill(MESSAGE);
    await form.locator('button[type="submit"]').first().click();

    return form;
}

for (const theme of THEMES) {
    test.describe(`${theme.name} theme`, () => {
        test('home page renders with its own assets', async ({ page }) => {
            const response = await page.goto(baseUrl(theme));

            expect(response.status()).toBe(200);
            expect(await page.locator(`link[href*="visitor/${theme.name}/"]`).count()).toBeGreaterThan(0);
        });

        if (theme.pages) {
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
        }

        test('submits the contact form with a valid captcha token', async ({ page }) => {
            await stubCaptchaWidget(page, VALID_TOKEN);

            await page.goto(`${baseUrl(theme)}${theme.contactPath}`);

            const form = await fillAndSubmit(page);

            // The form must post to the application, not to a template leftover.
            await expect(form).toHaveAttribute('action', /\/contact$/);

            // Scoped to the form that was submitted: reeni renders the same
            // flash in its layout chat form as well.
            const alert = form.locator('.visitor-form-alert--success');

            await expect(alert).toBeVisible();
            await expect(alert).toContainText('Thank you for reaching out');
        });

        test('shows the validation errors when the captcha is rejected', async ({ page }) => {
            await stubCaptchaWidget(page, INVALID_TOKEN);

            await page.goto(`${baseUrl(theme)}${theme.contactPath}`);

            const form = await fillAndSubmit(page);
            const alert = form.locator('.visitor-form-alert--error');

            await expect(alert).toBeVisible();
            await expect(alert).toContainText('reCaptcha');
        });
    });
}
