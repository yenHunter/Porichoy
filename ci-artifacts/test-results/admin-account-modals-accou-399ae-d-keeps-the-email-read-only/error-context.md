# Instructions

- Following Playwright test failed.
- Explain why, be concise, respect Playwright best practices.
- Provide a snippet of code with the fix, if possible.

# Test info

- Name: admin/account-modals.spec.js >> account modals >> the profile modal edits the names and keeps the email read-only
- Location: e2e/admin/account-modals.spec.js:84:5

# Error details

```
Error: expect(locator).toBeHidden() failed

Locator:  locator('#account_profile_modal')
Expected: hidden
Received: visible
Timeout:  10000ms

Call log:
  - Expect "toBeHidden" locator('#account_profile_modal') with timeout 10000ms
  - waiting for locator('#account_profile_modal')
    24 × locator resolved to <div tabindex="-1" role="dialog" aria-modal="true" class="modal fade show" id="account_profile_modal" aria-labelledby="account_profile_modal_title">…</div>
       - unexpected value "visible"

```

```yaml
- dialog "My Profile":
  - heading "My Profile" [level=5]
  - button "Close"
  - text: First name
  - textbox "First name": Browser
  - text: Last name
  - textbox "Last name": Tester
  - text: Profile picture
  - img "Profile picture"
  - button "Remove your profile picture": 
  - button "Profile picture"
  - text: JPEG, PNG, GIF or WebP up to 10 MB. Stored as a 300px wide WebP. Email address
  - textbox "Email address" [disabled]: e2e@example.com
  - text: Your email address cannot be changed.
  - button "Cancel"
  - button "Save changes"
```

# Test source

```ts
  7   |  * The topbar account modals: profile (names and picture) and password.
  8   |  *
  9   |  * The picture round trip happens here because the client half of it cannot be
  10  |  * unit tested: the preview, the hover overlay, the recovery after a rejected
  11  |  * upload and the messages for bodies PHP rejects before Laravel sees them.
  12  |  */
  13  | 
  14  | const PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.png');
  15  | const NOT_A_PICTURE = path.resolve(__dirname, '..', 'fixtures', 'sample.pdf');
  16  | 
  17  | const DEFAULT_AVATAR = /static\/icons\/user\.png$/;
  18  | const STORED_PICTURE = /uploads\/users\/.+\.webp$/;
  19  | 
  20  | const PROFILE_MODAL = '#account_profile_modal';
  21  | const PASSWORD_MODAL = '#account_password_modal';
  22  | 
  23  | /**
  24  |  * Assert the toast and wait for it to go away: it sits over the topbar, where
  25  |  * the next click has to land.
  26  |  */
  27  | const waitForToast = async (page, message) => {
  28  |     await expect(page.locator('.swal2-toast')).toContainText(message);
  29  |     await expect(page.locator('.swal2-container')).toHaveCount(0);
  30  | };
  31  | 
  32  | const openAccountMenu = async (page) => {
  33  |     // A closing modal and its backdrop also sit over the topbar.
  34  |     await expect(page.locator('.modal-backdrop')).toHaveCount(0);
  35  |     await expect(page.locator('.swal2-container')).toHaveCount(0);
  36  | 
  37  |     const menu = page.locator('.nav-user .dropdown-menu');
  38  | 
  39  |     if (! (await menu.isVisible())) {
  40  |         await page.click('.nav-user .dropdown-toggle');
  41  |     }
  42  | 
  43  |     await expect(menu).toBeVisible();
  44  | };
  45  | 
  46  | const openProfile = async (page) => {
  47  |     await openAccountMenu(page);
  48  |     await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_profile_modal"]');
  49  |     await expect(page.locator(PROFILE_MODAL)).toBeVisible();
  50  | };
  51  | 
  52  | const openPassword = async (page) => {
  53  |     await openAccountMenu(page);
  54  |     await page.click('.nav-user .dropdown-menu a[data-bs-target="#account_password_modal"]');
  55  |     await expect(page.locator(PASSWORD_MODAL)).toBeVisible();
  56  | };
  57  | 
  58  | const saveProfile = async (page) => {
  59  |     await page.click('#account_profile_form button[type="submit"]');
  60  | };
  61  | 
  62  | const fillPasswordForm = async (page, { current, next, confirm = next }) => {
  63  |     await page.fill('#account_password_current', current);
  64  |     await page.fill('#account_password_new', next);
  65  |     await page.fill('#account_password_confirmation', confirm);
  66  | };
  67  | 
  68  | const submitPassword = async (page) => {
  69  |     await page.click('#account_password_form button[type="submit"]');
  70  | };
  71  | 
  72  | /** Make PHP reject the body before Laravel ever validates it. */
  73  | const rejectBody = async (page, status) => {
  74  |     await page.route('**/account/profile', (route) =>
  75  |         route.fulfill({
  76  |             status,
  77  |             contentType: 'application/json',
  78  |             body: JSON.stringify({ message: 'rejected by the server' }),
  79  |         })
  80  |     );
  81  | };
  82  | 
  83  | test.describe('account modals', () => {
  84  |     test('the profile modal edits the names and keeps the email read-only', async ({ page }) => {
  85  |         await signIn(page);
  86  | 
  87  |         await openAccountMenu(page);
  88  |         const menu = page.locator('.nav-user .dropdown-menu');
  89  | 
  90  |         await expect(menu.locator('.dropdown-item', { hasText: 'Profile' })).toBeVisible();
  91  |         await expect(menu.locator('.dropdown-item', { hasText: 'Change Password' })).toBeVisible();
  92  |         await expect(menu.locator('.dropdown-item', { hasText: 'Account Settings' })).toHaveCount(0);
  93  |         await expect(menu.locator('.dropdown-item', { hasText: 'Notifications' })).toHaveCount(0);
  94  | 
  95  |         await openProfile(page);
  96  | 
  97  |         // Displayed, never editable.
  98  |         const email = page.locator('#account_profile_email');
  99  |         await expect(email).toBeDisabled();
  100 |         await expect(email).toHaveValue(ADMIN.email);
  101 | 
  102 |         await page.fill('#account_profile_first_name', 'Browser');
  103 |         await page.fill('#account_profile_last_name', 'Tester');
  104 |         await saveProfile(page);
  105 | 
  106 |         await waitForToast(page, 'Your profile has been updated.');
> 107 |         await expect(page.locator(PROFILE_MODAL)).toBeHidden();
      |                                                   ^ Error: expect(locator).toBeHidden() failed
  108 |         await expect(page.locator('.nav-user h5')).toHaveText('Browser');
  109 | 
  110 |         // Reopening shows what was saved, and the address is still untouched.
  111 |         await openProfile(page);
  112 |         await expect(page.locator('#account_profile_first_name')).toHaveValue('Browser');
  113 |         await expect(page.locator('#account_profile_email')).toHaveValue(ADMIN.email);
  114 | 
  115 |         // Leave the seeded account as the rest of the run expects it.
  116 |         await page.fill('#account_profile_first_name', 'E2E');
  117 |         await page.fill('#account_profile_last_name', 'Admin');
  118 |         await saveProfile(page);
  119 |         await waitForToast(page, 'Your profile has been updated.');
  120 |         await expect(page.locator('.nav-user h5')).toHaveText('E2E');
  121 |     });
  122 | 
  123 |     test('the picture is uploaded, removed from the avatar overlay and survives a rejection', async ({ page }) => {
  124 |         await signIn(page);
  125 |         await openProfile(page);
  126 | 
  127 |         const avatar = page.locator('#account_profile_avatar');
  128 |         const overlay = page.locator('#account_profile_remove_picture');
  129 | 
  130 |         // Upload: the stored file is a WebP and the topbar follows it.
  131 |         await page.setInputFiles('#account_profile_picture', PICTURE);
  132 |         await saveProfile(page);
  133 | 
  134 |         await waitForToast(page, 'Your profile has been updated.');
  135 |         await expect(page.locator('.nav-user .topbar-link img')).toHaveAttribute('src', STORED_PICTURE);
  136 | 
  137 |         await openProfile(page);
  138 |         await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
  139 |         await expect(overlay).not.toHaveClass(/d-none/);
  140 | 
  141 |         // The removal control is the picture itself, explained by a tooltip.
  142 |         const wrapper = page.locator('#account_profile_avatar_wrapper');
  143 |         const opacity = () => overlay.evaluate((el) => getComputedStyle(el).opacity);
  144 | 
  145 |         expect(await opacity()).toBe('0');
  146 |         await wrapper.hover();
  147 |         await expect.poll(opacity).toBe('1');
  148 | 
  149 |         await page.hover('#account_profile_remove_picture');
  150 |         await expect(page.locator('.tooltip-inner')).toHaveText('Remove your profile picture');
  151 | 
  152 |         // Arming swaps the preview, the icon and the tooltip; undo restores them.
  153 |         await overlay.click();
  154 |         await expect(wrapper).toHaveClass(/is-armed/);
  155 |         await expect(overlay).toHaveAttribute('aria-label', 'Keep your current picture');
  156 |         await expect(avatar).toHaveAttribute('src', DEFAULT_AVATAR);
  157 | 
  158 |         await page.hover('#account_profile_remove_picture');
  159 |         await expect(page.locator('.tooltip-inner')).toHaveText('Keep your current picture');
  160 | 
  161 |         await overlay.click();
  162 |         await expect(wrapper).not.toHaveClass(/is-armed/);
  163 |         await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
  164 | 
  165 |         // A file the server refuses: the message is shown, the pick is dropped
  166 |         // and the stored picture comes back instead of a broken preview.
  167 |         const errors = page.locator('#account_profile_form .account-errors');
  168 | 
  169 |         await page.setInputFiles('#account_profile_picture', NOT_A_PICTURE);
  170 |         await saveProfile(page);
  171 | 
  172 |         await expect(errors).toBeVisible();
  173 |         await expect(errors).toContainText('The profile picture must be a JPEG, PNG, GIF or WebP image.');
  174 |         // One reason, one line: the field is not reported twice.
  175 |         await expect(errors.locator('div')).toHaveCount(1);
  176 |         await expect(page.locator(PROFILE_MODAL)).toBeVisible();
  177 |         await expect(page.locator('#account_profile_picture')).toHaveValue('');
  178 |         await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
  179 | 
  180 |         // PHP rejects the whole body: 413 when it is too large...
  181 |         await rejectBody(page, 413);
  182 |         await page.setInputFiles('#account_profile_picture', PICTURE);
  183 |         await saveProfile(page);
  184 | 
  185 |         await expect(errors).toContainText('HTTP 413');
  186 |         await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
  187 |         await page.unroute('**/account/profile');
  188 | 
  189 |         // ...and 419 when the body never reaches Laravel at all.
  190 |         await rejectBody(page, 419);
  191 |         await page.setInputFiles('#account_profile_picture', PICTURE);
  192 |         await saveProfile(page);
  193 | 
  194 |         await expect(errors).toContainText(/dropped the upload/i);
  195 |         await expect(avatar).toHaveAttribute('src', STORED_PICTURE);
  196 |         await page.unroute('**/account/profile');
  197 | 
  198 |         // Without a file the same 419 means the session went away.
  199 |         await rejectBody(page, 419);
  200 |         await saveProfile(page);
  201 | 
  202 |         await expect(errors).toContainText(/session expired/i);
  203 |         await page.unroute('**/account/profile');
  204 | 
  205 |         // Removing still works after all of that, and leaves the disk clean.
  206 |         await wrapper.hover();
  207 |         await overlay.click();
```