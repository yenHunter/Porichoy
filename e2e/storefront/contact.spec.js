const { test, expect } = require('@playwright/test');
const { THEMES, baseUrl } = require('../support/servers');
const { stubCaptchaWidget, VALID_TOKEN, INVALID_TOKEN } = require('../support/captcha');

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
