{{-- Profile modal: names only, the address is shown but cannot be edited. --}}
<div aria-hidden="true" aria-labelledby="account_profile_modal_title" class="modal fade" id="account_profile_modal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('account.profile.update') }}" id="account_profile_form" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="account_profile_modal_title">My Profile</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger d-none account-errors" role="alert"></div>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="account_profile_first_name">First name</label>
                            <input autocomplete="given-name" class="form-control" id="account_profile_first_name"
                                maxlength="255" name="first_name" required type="text"
                                value="{{ Auth::user()->first_name }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account_profile_last_name">Last name</label>
                            <input autocomplete="family-name" class="form-control" id="account_profile_last_name"
                                maxlength="255" name="last_name" required type="text"
                                value="{{ Auth::user()->last_name }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="account_profile_picture">Profile picture</label>
                            <div class="d-flex align-items-center gap-3">
                                <img alt="Profile picture" class="img-thumbnail rounded-circle"
                                    id="account_profile_avatar" src="{{ Auth::user()->profile_picture_url }}"
                                    style="height: 64px; width: 64px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <input accept="image/jpeg,image/png,image/gif,image/webp" class="form-control"
                                        id="account_profile_picture" name="profile_picture" type="file">
                                    <div class="form-text">JPEG, PNG, GIF or WebP up to 10 MB. Stored as a 300px wide
                                        WebP.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="account_profile_email">Email address</label>
                            <input class="form-control" disabled id="account_profile_email" readonly type="email"
                                value="{{ Auth::user()->email }}">
                            <div class="form-text">Your email address cannot be changed.</div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Password modal: the strength meter is initialised from auth-password.js. --}}
<div aria-hidden="true" aria-labelledby="account_password_modal_title" class="modal fade" id="account_password_modal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('account.password.update') }}" id="account_password_form" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="account_password_modal_title">Change Password</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger d-none account-errors" role="alert"></div>

                    <div class="mb-3">
                        <label class="form-label" for="account_password_current">Current password</label>
                        <input autocomplete="current-password" class="form-control" id="account_password_current"
                            name="current_password" required type="password">
                    </div>

                    <div class="mb-3" data-password="bar">
                        <label class="form-label" for="account_password_new">New password</label>
                        <input autocomplete="new-password" class="form-control" id="account_password_new"
                            name="password" required type="password">
                        <div class="password-bar my-2"></div>
                        <p class="text-muted fs-xs mb-0">
                            Use 8+ characters with upper and lower case letters, a number and a symbol.
                        </p>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="account_password_confirmation">Confirm new password</label>
                        <input autocomplete="new-password" class="form-control" id="account_password_confirmation"
                            name="password_confirmation" required type="password">
                    </div>

                    <p aria-live="polite" class="fs-xs mb-0 mt-2" id="account_password_hint"></p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Change password</button>
                </div>
            </form>
        </div>
    </div>
</div>
