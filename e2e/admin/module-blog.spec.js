const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/blog';
const FIXTURE_IMAGE = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.png');
const PUBLISHED_AT = '2026-04-08T10:30';
// Unique per run so a failed attempt cannot leave a row this run collides with.
const TITLE = `E2E Post ${Date.now()}`;
const RENAMED = `${TITLE} Revised`;

test.describe('blog module', () => {
    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);
    });

    test('creates, edits and deletes a post through the modal', async ({ page }) => {
        // create
        await page.click('a[data-bs-target="#create_update_modal"]');
        await page.fill('#blog_title', TITLE);
        await page.fill('#blog_excerpt', 'Written by the browser test.');
        await page.fill('#keywords', 'e2e, browser');
        await page.fill('#blog_published', PUBLISHED_AT);

        // Quill mirrors its HTML into the hidden field the form posts.
        await page.locator('#blog-content-editor .ql-editor').fill('Body written with Quill.');
        await expect(page.locator('#blog_content_hidden')).toHaveValue(/Body written with Quill\./);

        // FilePond stores the picked file in the real input.
        await page.setInputFiles('#create_update_form input[name="blog_image"]', FIXTURE_IMAGE);

        await page.click('#create_update_form button[type="submit"]');

        const created = page.locator('#sortable-blog tr', { hasText: TITLE });
        await expect(created).toBeVisible();
        await expect(created.locator('img')).toHaveCount(1);

        // edit: the modal reads back the stored post
        await created.locator('.btn-edit').click();
        await expect(page.locator('#blog_title')).toHaveValue(TITLE);
        await expect(page.locator('#keywords')).toHaveValue('e2e, browser');
        await expect(page.locator('#blog_published')).toHaveValue(PUBLISHED_AT);
        await expect(page.locator('#blog-content-editor .ql-editor')).toContainText('Body written with Quill.');

        await page.fill('#blog_title', RENAMED);
        await page.click('#create_update_form button[type="submit"]');

        const updated = page.locator('#sortable-blog tr', { hasText: RENAMED });
        await expect(updated).toBeVisible();

        // delete goes through the confirmation dialog
        await updated.locator('.btn-delete').click();
        await page.click('.swal2-confirm');

        await expect(page.locator('#sortable-blog tr', { hasText: RENAMED })).toHaveCount(0);
    });
});
