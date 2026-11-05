const { test, expect } = require('@playwright/test');
const { adminUrl } = require('../support/servers');
const { signIn } = require('../support/admin');

const PDF_VIEWER = '/admin/misc/pdf-viewer';
const FIXTURE_PDF = require('node:path').resolve(__dirname, '..', 'fixtures', 'sample.pdf');

/** Count the pixels the viewer actually painted on its canvas. */
async function canvasPixels(page) {
    return page.evaluate(() => {
        const canvas = document.getElementById('the-canvas');

        if (! canvas || ! canvas.width || ! canvas.height) {
            return { width: canvas ? canvas.width : 0, height: canvas ? canvas.height : 0, painted: 0 };
        }

        const data = canvas.getContext('2d').getImageData(0, 0, canvas.width, canvas.height).data;
        let painted = 0;

        for (let index = 3; index < data.length; index += 4) {
            if (data[index] !== 0) {
                painted++;
            }
        }

        return { width: canvas.width, height: canvas.height, painted };
    });
}

test.describe('pdf viewer', () => {
    test('renders a PDF in the viewer', async ({ page }) => {
        await signIn(page);

        const consoleErrors = [];
        page.on('console', (message) => {
            if (message.type() === 'error') {
                consoleErrors.push(message.text());
            }
        });
        page.on('pageerror', (error) => consoleErrors.push(error.message));

        const dialogs = [];
        page.on('dialog', (dialog) => {
            dialogs.push(dialog.message());
            dialog.dismiss();
        });

        // The page fetches a document from the internet; serve a local one so the
        // test is hermetic and the page count is known.
        const requested = [];
        await page.route('**/*.pdf', (route) => {
            requested.push(route.request().url());

            return route.fulfill({ path: FIXTURE_PDF, contentType: 'application/pdf' });
        });

        // PDF.js only works when the worker matches the library version, and the
        // worker is now taken from the package instead of a vendored copy.
        const workerResponse = page.waitForResponse(
            (response) => /pdf\.worker.*\.mjs/.test(response.url()),
            { timeout: 20_000 },
        );

        await page.goto(`${adminUrl()}${PDF_VIEWER}`);

        // The viewer's own readout: parsing the fixture gave a one page document.
        await expect(page.locator('#page_count')).toHaveText('/ 1');
        expect(requested).toHaveLength(1);

        expect((await workerResponse).status()).toBe(200);

        // Rendering is asynchronous, so wait for pixels rather than for markup.
        await expect
            .poll(async () => (await canvasPixels(page)).painted, { message: 'the canvas should have drawn the page' })
            .toBeGreaterThan(0);

        const canvas = await canvasPixels(page);
        expect(canvas.width).toBeGreaterThan(0);
        expect(canvas.height).toBeGreaterThan(0);

        expect(dialogs).toEqual([]);
        expect(consoleErrors.filter((message) => /worker|version|PDF/i.test(message))).toEqual([]);
    });
});
