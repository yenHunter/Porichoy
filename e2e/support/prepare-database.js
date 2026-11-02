/**
 * Prepares the throwaway SQLite database the browser tests run on.
 *
 * Runs before Playwright (see the test:e2e script) so the database exists, is
 * migrated and carries the accounts the tests sign in with, whatever order
 * Playwright starts its web servers in. It never touches the developer's own
 * database: everything is passed through the environment.
 */
const path = require('node:path');
const fs = require('node:fs');
const { execFileSync } = require('node:child_process');

const ROOT = path.resolve(__dirname, '..', '..');
const { DATABASE } = require('./servers');

if (! fs.existsSync(DATABASE)) {
    fs.writeFileSync(DATABASE, '');
}

const environment = {
    ...process.env,
    DB_CONNECTION: 'sqlite',
    DB_DATABASE: DATABASE,
    CACHE_STORE: 'array',
    SESSION_DRIVER: 'database',
    QUEUE_CONNECTION: 'sync',
    MAIL_MAILER: 'log',
};

const artisan = (...args) => {
    console.log(`$ php artisan ${args.join(' ')}`);

    execFileSync('php', ['artisan', ...args], { cwd: ROOT, env: environment, stdio: 'inherit' });
};

// A cached config file would win over the environment the servers are started with.
artisan('config:clear');
artisan('migrate:fresh', '--seed', '--force');
// The seeder above generates a random password; the tests need a known one.
artisan('db:seed', '--class=E2eUserSeeder', '--force');
