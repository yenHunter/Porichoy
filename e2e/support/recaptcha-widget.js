/**
 * Local emulation of Google's reCAPTCHA widget script.
 *
 * Served in place of the real script by e2e/support/captcha.js. It supports the
 * two contracts this application uses:
 *
 *  - `grecaptcha.ready()` / `grecaptcha.execute()` — the storefront forms mint a
 *    token at submit time (see resources/views/visitor/partials/recaptcha.blade.php).
 *  - the invisible-widget button — an element with class `g-recaptcha` carrying
 *    `data-sitekey` and `data-callback` (the admin sign-in form). Google injects
 *    a hidden `g-recaptcha-response` field, then calls the callback, which is
 *    what submits the form.
 *
 * The token the widget hands out comes from `window.__recaptchaToken`, which a
 * test sets before the page loads, so both the accepted and the rejected case
 * can be driven.
 */
(function () {
    var token = window.__recaptchaToken || 'e2e-valid-token';

    function mint() {
        return Promise.resolve(token);
    }

    window.grecaptcha = {
        ready: function (callback) { callback(); },
        execute: function () { return mint(); },
        getResponse: function () { return token; },
        reset: function () {},
    };

    function field(form) {
        var existing = form.querySelector('input[name="g-recaptcha-response"]');

        if (existing) {
            return existing;
        }

        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'g-recaptcha-response';
        form.appendChild(input);

        return input;
    }

    function wire(root) {
        root.querySelectorAll('form').forEach(function (form) {
            var button = form.querySelector('button.g-recaptcha, .g-recaptcha[data-callback]');

            if (! button || form.dataset.recaptchaWired) {
                return;
            }

            form.dataset.recaptchaWired = '1';

            button.addEventListener('click', function (event) {
                var input = field(form);

                if (input.value) {
                    return; // a token is already there, let the form submit
                }

                event.preventDefault();

                mint().then(function (value) {
                    input.value = value;

                    var callback = button.dataset.callback;

                    if (callback && typeof window[callback] === 'function') {
                        window[callback](value);
                    } else {
                        HTMLFormElement.prototype.submit.call(form);
                    }
                });
            }, true);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () { wire(document); });
    } else {
        wire(document);
    }
})();
