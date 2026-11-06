const { adminUrl, ADMIN } = require('./servers');
const { stubCaptchaWidget, VALID_TOKEN } = require('./captcha');

/**
 * Sign in through the real form: the widget stub supplies the captcha token.
 */
async function signIn(page) {
    await stubCaptchaWidget(page, VALID_TOKEN);

    await page.goto(`${adminUrl()}/login`);
    await page.fill('[name="email"]', ADMIN.email);
    await page.fill('[name="password"]', ADMIN.password);
    await page.click('button.g-recaptcha');

    await page.waitForURL(`${adminUrl()}/home`);
}

module.exports = { signIn };
