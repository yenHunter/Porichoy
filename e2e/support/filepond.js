const { expect } = require('@playwright/test');

/**
 * Wait until FilePond has handed a picked file to the form.
 *
 * FilePond reads a picked file asynchronously and, with `storeAsFile`, only
 * writes it into an input of its own once that read finishes. Saving in
 * between posts no file at all, silently: the record is created without its
 * image and the tests then look for a preview that is not there.
 *
 * `name` is the form field the picker belongs to, e.g. `institute_logo`.
 */
async function waitForStoredPick(page, name) {
    await expect.poll(() => page.evaluate((field) => {
        // FilePond drops the name from its browser input while it holds an
        // item, so the input that keeps the name is the one that is submitted.
        // `files` is null on the text or URL field some forms put next to the
        // picker under the same name.
        return [...document.querySelectorAll(`#create_update_form input[name="${field}"]`)]
            .some(input => !input.id.startsWith('filepond--browser-') && input.files?.length === 1);
    }, name)).toBe(true);
}

module.exports = { waitForStoredPick };
