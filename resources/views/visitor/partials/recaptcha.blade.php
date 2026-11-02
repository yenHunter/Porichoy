{{--
    Shared visitor captcha field.

    reCAPTCHA v3 is invisible and score based, so the token is minted at submit
    time and posted as `g-recaptcha-response`. Include this partial inside a
    <form> — it binds to the form it is rendered in.

    Both endpoints come from config so a local end-to-end run can substitute a
    stub for Google; they default to Google's real URLs.
--}}
@php
    $recaptcha_site_key = config('services.recaptcha.site_key');
@endphp

@if (filled($recaptcha_site_key))
    <input type="hidden" name="g-recaptcha-response" value="">

    <script src="{{ config('services.recaptcha.script_url') }}?render={{ $recaptcha_site_key }}" async defer></script>

    <script>
        (function () {
            var form = document.currentScript && document.currentScript.closest('form');
            if (! form) {
                return;
            }

            var field = form.querySelector('input[name="g-recaptcha-response"]');
            if (! field) {
                return;
            }

            form.addEventListener('submit', function (event) {
                // Without the widget script there is no token to mint: let the
                // form through and let the server fail closed with a message.
                if (typeof window.grecaptcha === 'undefined' || typeof window.grecaptcha.execute !== 'function') {
                    return;
                }

                event.preventDefault();

                if (form.dataset.recaptchaRequested) {
                    return; // a token request is already in flight
                }

                form.dataset.recaptchaRequested = '1';

                var send = function (token) {
                    field.value = token || '';

                    // HTMLFormElement.submit() is used instead of requestSubmit():
                    // Chromium ignores requestSubmit() while a submit event is
                    // still being handled, so the form would never leave the page.
                    HTMLFormElement.prototype.submit.call(form);
                };

                var ready = window.grecaptcha.ready || function (callback) { callback(); };

                ready(function () {
                    window.grecaptcha
                        .execute('{{ $recaptcha_site_key }}', { action: '{{ $action ?? 'submit' }}' })
                        .then(send)
                        .catch(function () { send(''); });
                });
            });
        })();
    </script>
@endif
