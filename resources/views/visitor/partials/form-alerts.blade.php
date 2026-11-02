{{--
    Shared alert block for the storefront forms.

    The visitor routes redirect back with a flash message or with validation
    errors, and the themes had no way to show either. Include this at the top of
    a form.
--}}
@if (session('success') || $errors->any())
    @once
        <style>
            .visitor-form-alert {
                padding: 12px 16px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 6px;
                font-size: 15px;
                line-height: 1.5;
            }

            .visitor-form-alert ul {
                margin: 0;
                padding-left: 18px;
            }

            .visitor-form-alert--success {
                background: #e7f6ec;
                border-color: #bfe3cb;
                color: #17603a;
            }

            .visitor-form-alert--error {
                background: #fdecea;
                border-color: #f5c2c0;
                color: #8a1f11;
            }
        </style>
    @endonce

    @if (session('success'))
        <div class="visitor-form-alert visitor-form-alert--success" role="status">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="visitor-form-alert visitor-form-alert--error" role="alert">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
