const path = require('node:path');

const WIDGET = path.resolve(__dirname, 'recaptcha-widget.js');

/** The token the stub verifier approves (e2e/support/recaptcha-stub.js). */
const VALID_TOKEN = 'e2e-valid-token';

/** A token the stub verifier rejects, for the failure paths. */
const INVALID_TOKEN = 'e2e-invalid-token';

/**
 * Serves the local widget emulation wherever the application expects Google's
 * script, and tells it which token to hand out.
 *
 * The token is the only thing the harness controls: the server-side captcha
 * rule, the verification request against the stub and the resulting redirect
 * are all the application's real code paths. Call this before navigating.
 */
async function stubCaptchaWidget(page, token = VALID_TOKEN) {
    await page.addInitScript((value) => {
        window.__recaptchaToken = value;
    }, token);

    // Every view now loads reCAPTCHA from config('services.recaptcha.script_url'),
    // which the E2E servers point at the stub, so one pattern suffices.
    await page.route('**/recaptcha.js*', (route) => route.fulfill({
        path: WIDGET,
        contentType: 'application/javascript',
    }));
}

module.exports = { stubCaptchaWidget, VALID_TOKEN, INVALID_TOKEN };
