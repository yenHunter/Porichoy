const { defineConfig } = require('@playwright/test');
const { THEMES, STUB_PORT, ADMIN_PORT, appEnvironment } = require('./e2e/support/servers');

/**
 * Browser tests for the application.
 *
 * One app server per visitor theme (the theme comes from APP_THEME at boot),
 * one for the admin panel, plus a stub for reCAPTCHA so captcha protected forms
 * can be submitted for real without reaching Google. Each server polls its own
 * /up health route before the run starts.
 */
module.exports = defineConfig({
    testDir: './e2e',
    // The app servers are single threaded; one worker keeps the run stable.
    workers: 1,
    fullyParallel: false,
    timeout: 60_000,
    expect: { timeout: 10_000 },
    reporter: process.env.CI ? [['list'], ['html', { open: 'never' }]] : [['list']],

    use: {
        screenshot: 'only-on-failure',
        trace: 'retain-on-failure',
    },

    webServer: [
        {
            command: `node e2e/support/recaptcha-stub.js`,
            url: `http://127.0.0.1:${STUB_PORT}/healthz`,
            reuseExistingServer: ! process.env.CI,
            timeout: 30_000,
            env: { RECAPTCHA_STUB_PORT: String(STUB_PORT) },
        },
        ...THEMES.map((theme) => ({
            // --no-reload keeps the servers on the environment prepared above:
            // without it ServeCommand drops every non-passthrough variable when
            // a .env file is present, so the servers would boot on the dev database.
            command: `php artisan serve --no-reload --host=127.0.0.1 --port=${theme.port}`,
            url: `http://127.0.0.1:${theme.port}/up`,
            reuseExistingServer: ! process.env.CI,
            timeout: 120_000,
            env: appEnvironment(theme.name),
        })),
        {
            command: `php artisan serve --no-reload --host=127.0.0.1 --port=${ADMIN_PORT}`,
            url: `http://127.0.0.1:${ADMIN_PORT}/up`,
            reuseExistingServer: ! process.env.CI,
            timeout: 120_000,
            env: appEnvironment(),
        },
    ],
});
