const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PAGE = '/module/research';
const UNIQUE = Math.random().toString(36).substring(2, 15);
const TITLE = `Biochar paper ${UNIQUE}`;
const EDITED_TITLE = `Revised paper ${UNIQUE}`;
const DATED_TITLE = `Dated paper ${UNIQUE}`;
const RESET_TITLE = `Reset paper ${UNIQUE}`;

/**
 * The table paginates, so a new row can land on a later page; search for it
 * instead of assuming it is on the first one.
 */
async function findRow(page, text) {
    await page.locator('.card-body input[type="search"]').first().fill(text);

    return page.locator('#sortable-research tr', { hasText: text });
}

/**
 * The modal is saved over JS and then reloads the listing, so wait for that
 * reload before reading anything off the page: an older success banner or the
 * previous table would otherwise answer too early.
 */
async function save(page) {
    const documentBefore = await page.evaluate(() => performance.timeOrigin);

    await page.click('#create_update_form button[type="submit"]');

    // A new timeOrigin means the reloaded document is up. The load event can
    // fire before this test listens for it, and an evaluate that lands
    // mid-navigation is itself proof the reload started.
    await expect.poll(async () => {
        try {
            return await page.evaluate(() => performance.timeOrigin);
        } catch (error) {
            if (String(error).includes('Execution context was destroyed')) {
                return 'navigating';
            }

            throw error;
        }
    }).not.toBe(documentBefore);
    await expect(page.locator('.alert-success')).toBeVisible();
}

async function fillCreateForm(page, title, { publishedDate = '2024-06-30' } = {}) {
    await page.click('a[data-bs-target="#create_update_modal"]');
    await page.selectOption('#research_source', { index: 1 });
    await page.fill('#research_title', title);
    await page.selectOption('#research_category', 'National');

    if (publishedDate) {
        await page.fill('#published_date', publishedDate);
    }
}

async function createResearch(page, title, options = {}) {
    await fillCreateForm(page, title, options);
    await save(page);
}

async function openEdit(page, title) {
    const row = await findRow(page, title);
    await expect(row).toBeVisible();

    await row.locator('.btn-edit').click();

    await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
}

test.describe('research module', () => {
    // These tests sign in and save through the modal, which reloads the listing.
    test.describe.configure({ timeout: 90_000 });

    test.beforeEach(async ({ page }) => {
        await signIn(page);
        await page.goto(`${adminUrl()}${PAGE}`);

        // The page script binds the submit and edit handlers; the status select
        // is part of the form it operates on.
        await expect(page.locator('#research_status')).toHaveValue('1');
    });

    test('creates a research record through the modal', async ({ page }) => {
        await createResearch(page, TITLE);

        const row = await findRow(page, TITLE);

        await expect(row).toBeVisible();
        await expect(row).toContainText('National');
        await expect(row).toContainText('30-Jun-2024');
    });

    test('keeps the modal and the typed values when the server rejects the save', async ({ page }) => {
        await page.click('a[data-bs-target="#create_update_modal"]');
        // Everything is valid in the browser, so only the server can reject it.
        await page.selectOption('#research_source', { index: 1 });
        await page.fill('#research_title', 'X'.repeat(260));
        await page.selectOption('#research_category', 'National');

        await page.click('#create_update_form button[type="submit"]');

        // No reload: the modal stays open with the error under the field.
        await expect(page.locator('#create_update_modal')).toHaveClass(/show/);
        await expect(page.locator('#research_title')).toHaveClass(/is-invalid/);
        await expect(page.locator('#create_update_modal .invalid-feedback')).toContainText(
            'research title field must not be greater than 255 characters'
        );
        await expect(page.locator('#research_category')).toHaveValue('National');
    });

    test('prefills the local published date when editing', async ({ page }) => {
        await createResearch(page, DATED_TITLE, { publishedDate: '2024-06-30' });
        await openEdit(page, DATED_TITLE);

        // A raw ISO value would arrive here as 2024-06-29 for an app timezone
        // ahead of UTC, or leave the input empty.
        await expect(page.locator('#published_date')).toHaveValue('2024-06-30');
        await expect(page.locator('#research_title')).toHaveValue(DATED_TITLE);
        await expect(page.locator('#research_status')).toHaveValue('1');
    });

    test('saves an edit through the modal', async ({ page }) => {
        await createResearch(page, EDITED_TITLE);
        await openEdit(page, EDITED_TITLE);

        await page.fill('#research_title', `${EDITED_TITLE} revised`);
        await save(page);

        await expect(await findRow(page, `${EDITED_TITLE} revised`)).toBeVisible();
    });

    test('shows a blank create form after closing an edit', async ({ page }) => {
        await createResearch(page, RESET_TITLE);
        await openEdit(page, RESET_TITLE);

        await page.click('#create_update_modal .btn-light');

        await expect(page.locator('#create_update_modal')).not.toHaveClass(/show/);

        await page.click('a[data-bs-target="#create_update_modal"]');

        await expect(page.locator('#create_update_modal_title')).toHaveText('Create research info');
        await expect(page.locator('#research_title')).toHaveValue('');
        await expect(page.locator('#published_date')).toHaveValue('');
        await expect(page.locator('#research_status')).toHaveValue('1');
        await expect(page.locator('#create_update_modal .invalid-feedback')).toHaveCount(0);
    });
});
