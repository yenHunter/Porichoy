const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/blog';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const UNIQUE = Math.random().toString(36).substring(2, 15);
const TITLE = `E2E Post ${UNIQUE}`;

test.describe('blog module', () => {
    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);
    });

    test('creates a blog post with Quill and FilePond', async ({ page }) => {
        // create
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#blog_title', TITLE);
        await page.fill('#blog_excerpt', 'Written by the browser test.');
        await page.fill('#keywords', 'e2e, browser');
        await page.fill('#blog_published', '2026-04-08T10:30');

        // Quill mirrors its HTML into the hidden field the form posts.
        await page.locator('#blog-content-editor .ql-editor').fill('Body written with Quill.');
        await expect(page.locator('#blog_content_hidden')).toHaveValue(/<p>Body written with Quill.<\/p>/);

        // FilePond stores the picked file in the real input.
        await page.setInputFiles('#create_update_form input[name="blog_image"]', FIXTURE_IMAGE);

        await page.click('#create_update_form button[type="submit"]');

        const created = page.locator('#sortable-blog tr', { hasText: TITLE });
        await expect(created).toBeVisible();
        await expect(created.locator('img')).toHaveCount(1);
    });
});