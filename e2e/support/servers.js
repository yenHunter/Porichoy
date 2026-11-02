/**
 * The servers the browser suites run against.
 *
 * Each visitor theme needs its own app server, because the active theme is read
 * from APP_THEME when the app boots. The admin panel is theme independent and
 * gets a server of its own so the two suites never share a session. Ports are
 * fixed so the Playwright webServer list and the specs agree.
 */
const THEMES = [
    { name: 'antux', port: 8101, pages: true, contactPath: '/contact' },
    { name: 'dorbesh', port: 8102, pages: false, contactPath: '/' },
    { name: 'reeni', port: 8103, pages: true, contactPath: '/contact' },
    { name: 'flixta', port: 8104, pages: true, contactPath: '/contact' },
];

const ADMIN_PORT = 8110;

const STUB_PORT = Number(process.env.RECAPTCHA_STUB_PORT || 8199);

/** Absolute path of the throwaway SQLite database the run uses. */
const DATABASE = require('node:path').resolve(__dirname, '..', '..', 'database', 'e2e.sqlite');

/** Credentials created by database/seeders/E2eUserSeeder.php. */
const ADMIN = {
    email: 'e2e@example.com',
    password: 'e2e-password',
};

/** Origin of one themed app server. */
function baseUrl(theme) {
    return `http://127.0.0.1:${theme.port}`;
}

/** Origin of the admin app server. */
function adminUrl() {
    return `http://127.0.0.1:${ADMIN_PORT}`;
}

/**
 * Environment every app server and the stub are started with.
 *
 * Passing a theme name activates it; the admin server leaves it out.
 */
function appEnvironment(theme) {
    const environment = {
        DB_CONNECTION: 'sqlite',
        DB_DATABASE: DATABASE,
        RECAPTCHA_SITE_KEY: 'e2e-site-key',
        RECAPTCHA_SECRET_KEY: 'e2e-secret-key',
        RECAPTCHA_SCRIPT_URL: `http://127.0.0.1:${STUB_PORT}/recaptcha.js`,
        RECAPTCHA_VERIFY_URL: `http://127.0.0.1:${STUB_PORT}/siteverify`,
        // php -S is single threaded; a browser opens several connections per page.
        PHP_CLI_SERVER_WORKERS: '4',
    };

    if (theme) {
        environment.APP_THEME = theme;
    }

    return environment;
}

module.exports = { THEMES, STUB_PORT, ADMIN_PORT, DATABASE, ADMIN, baseUrl, adminUrl, appEnvironment };
