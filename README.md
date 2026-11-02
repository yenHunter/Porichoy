# Porichoy
> Let Them Know

[![CI](https://github.com/yenHunter/Porichoy/actions/workflows/ci.yml/badge.svg)](https://github.com/yenHunter/Porichoy/actions/workflows/ci.yml)

## Description

**Porichoy** (Bengali for 'Identity') is a dynamic, modular, and highly customizable personal portfolio application built with the Laravel framework. It provides a robust platform for professionals of any field—developers, designers, writers, and more—to showcase their skills, experience, and projects to the world.

With a powerful admin panel and a flexible, profession-aware module system, Porichoy allows you to build and manage a personal website that truly represents your unique identity.

## Features

Porichoy comes packed with features designed for flexibility and ease of use:

* **Powerful Admin Dashboard:** A secure and comprehensive backend to manage all content, settings, and modules.
* **Dynamic Theming:** Instantly change the look and feel of your entire portfolio. The system is built to support multiple themes, allowing you to switch designs in a single click.
* **Complete Module System:** Your portfolio is built from modules. You can easily enable, disable, and reorder sections like:
    * Education
    * Work Experience
    * Projects
    * Skills
    * Testimonials
    * Blog / Articles
    * ...and more.
* **Profession-Based Configuration:** Tailor your portfolio's structure based on your career. A developer might want to highlight a GitHub repository, while a photographer might prioritize a gallery module.
* **Built-in Contact Form:** A ready-to-use contact form that sends messages directly to you, with validation and spam protection (if configured).
* **SEO Optimized:** Clean markup and management for meta titles and descriptions to help you get discovered on search engines.
* **Fully Responsive:** All default themes are designed to look great on desktops, tablets, and mobile devices.
* **Social Media Integration:** Easily link and display your profiles from platforms like LinkedIn, GitHub, Twitter, etc.

## Installation Guide

You can get your own instance of Porichoy up and running by following these steps.

### Prerequisites

* PHP >= 8.2
* Composer
* Node.js & NPM
* MySQL

### Steps

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/yenHunter/Porichoy.git
    cd porichoy
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Create your environment file:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate your application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure your `.env` file:**
    Open the `.env` file and set up your database connection (DB_DATABASE, DB_USERNAME, DB_PASSWORD) and other settings.

    **Important:** For the contact form and spam protection, add your Google ReCAPTCHA v3 keys. You can get these from the [Google ReCAPTCHA](https://developers.google.com/recaptcha).

    ```dotenv
    # .env

    APP_URL=http://your-domain.com

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE='your-db-name'
    DB_USERNAME='your-db-user'
    DB_PASSWORD='your-db-password'

    # Add your Google ReCAPTCHA keys here
    RECAPTCHA_SITE_KEY=YOUR_RECAPTCHA_SITE_KEY_HERE
    RECAPTCHA_SECRET_KEY=YOUR_RECAPTCHA_SECRET_KEY_HERE
    ```

6.  **Run database migrations:**
    This will create all the necessary tables in your database.
    ```bash
    php artisan migrate --seed
    ```

7.  **Serve the application:**
    ```bash
    php artisan serve
    ```

Your application should now be running at `http://127.0.0.1:8000`.

## Testing

The suite runs against an in-memory SQLite database (`phpunit.xml`), so it needs no database
server, no seeded data and no network access:

```bash
php artisan test
```

The blade templates are wired up with `@vite`, so the front-end assets have to be built before a
page can be rendered in a test:

```bash
npm ci && npm run build
php artisan test
```

Two conventions keep the suite honest:

* every outbound HTTP call must be faked with `Http::fake()` — a stray request throws instead of
  quietly succeeding on a machine that happens to have internet access;
* the reCAPTCHA keys are pinned to test values in `phpunit.xml`, so the captcha rule behaves the
  same locally and in CI.

### Browser tests

The storefront and the admin panel are covered by a real browser run with Playwright. One app
server is started per `APP_THEME`, one for the admin panel, plus a local stand-in for reCAPTCHA, so
a test can load every theme, follow a project card through to its detail page and submit the contact
form — both with a token the stub accepts and with one it rejects — and a test can sign in and use
the panel.

```bash
npx playwright install chromium   # once per machine
npm run test:e2e
```

The run builds its own throwaway database (`database/e2e.sqlite`, migrated and seeded with the
account from `E2eUserSeeder`), never the one in your `.env`. Google is not contacted: the widget
script is replaced by a local emulation, the server-side verification points at the stub through
`RECAPTCHA_VERIFY_URL`, and the token itself is set per test. Configuration lives in
[playwright.config.js](playwright.config.js) and [e2e/](e2e).

The admin pages are rendered through `@vite`, so this suite needs built assets (`npm run build`)
before it runs — in CI the `Browser tests` job downloads the artifact the `Assets` job produced.

## Continuous Integration

[`.github/workflows/ci.yml`](.github/workflows/ci.yml) runs on every pull request and on pushes to
`main`:

| Job | What it does |
| --- | --- |
| **Assets** | `npm ci` then `npm run build`, and hands `public/build` to the test jobs |
| **Tests** | the full suite on PHP 8.2 and PHP 8.3, against those built assets |
| **Browser tests** | the Playwright run over all four themes and the admin panel, with the reCAPTCHA stub |
| **Static checks** | `php -l` over every tracked PHP file plus `composer validate --strict` |

[`.github/workflows/security.yml`](.github/workflows/security.yml) scans both dependency trees for known
advisories. It runs on every pull request, weekly on a schedule (so new advisories against unchanged
code are still caught) and on demand:

| Check | Policy |
| --- | --- |
| `composer audit` | fails on any advisory |
| `npm audit` | fails on high and critical; lower findings are reported in the job summary |

Both read the lock files, so the scan covers exactly what ships and needs no install step. Run the
same checks locally with:

```bash
composer audit
npm audit --audit-level=high
```

Known non-blocking finding: `quill` 2.0.3 (low, XSS in its HTML export helper) has no fixed release
published upstream, so it is reported rather than silenced — see the audit report in CI.

The two static checks can be run locally as well:

```bash
composer validate --strict --no-check-publish
git ls-files '*.php' | xargs -n1 php -l
```

## About Me

I’m a passionate web developer with experience in building scalable and secure applications. I specialize in Laravel, Django, JavaScript and server management with Nginx. I enjoy automating workflows, optimizing performance, and deploying modern web solutions on VPS environments. I believe in clean code, continuous learning, and sharing knowledge through open-source contributions.

## Connect & Support

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-blue?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/firoz-ebna-jobaier)
[![Buy Me a Coffee](https://img.shields.io/badge/Buy_Me_a_Coffee-Support-yellow?style=for-the-badge&logo=buymeacoffee)](buymeacoffee.com/yenHunter)
[![Fork me on GitHub](https://img.shields.io/badge/Fork_on_GitHub-000?style=for-the-badge&logo=github)](https://github.com/yenHunter)

## Contributing

Contributions are welcome! If you'd like to help improve Porichoy, please feel free to fork the repository, make your changes, and submit a pull request.

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).