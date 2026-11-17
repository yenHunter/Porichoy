const { adminUrl, ADMIN } = require('./servers');
const { stubCaptchaWidget, VALID_TOKEN } = require('./captcha');

/**
 * Sign in through the real form: the widget stub supplies the captcha token.
 *
 * Pass other credentials to use an account other than the default admin.
 */
async function signIn(page, credentials = ADMIN) {
    await stubCaptchaWidget(page, VALID_TOKEN);

    await page.goto(`${adminUrl()}/login`);
    await page.fill('[name="email"]', credentials.email);
    await page.fill('[name="password"]', credentials.password);
    await page.click('button.g-recaptcha');

    await page.waitForURL(`${adminUrl()}/home`);
}

module.exports = { signIn };
