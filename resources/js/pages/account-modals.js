import axios from 'axios';
import Swal from 'sweetalert2';

import { PasswordAuth, initPasswordStrengthBars } from './auth-password';

const csrfToken = document.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.getAttribute('content');
}

const meter = new PasswordAuth();

// Mirrors the server rule so an oversized file never leaves the browser.
const MAX_PICTURE_BYTES = 10 * 1024 * 1024;

const toast = (message) => Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: message,
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
});

const clearErrors = (form) => {
    const box = form.querySelector('.account-errors');

    if (!box) {
        return;
    }

    box.replaceChildren();
    box.classList.add('d-none');
};

const showErrors = (form, errors = {}) => {
    const box = form.querySelector('.account-errors');

    if (!box) {
        return;
    }

    const messages = Object.values(errors).flat();

    box.replaceChildren(...messages.map((message) => {
        const line = document.createElement('div');
        line.textContent = message;
        return line;
    }));
    box.classList.toggle('d-none', messages.length === 0);
};

/**
 * PUT the form and always re-enable its button, so a rejected attempt can be
 * corrected without reloading the page.
 */
const submit = async (form, payload) => {
    const button = form.querySelector('[type="submit"]');
    button.disabled = true;

    try {
        // A file upload is sent as multipart, using the form's `_method` spoof.
        const { data } = payload instanceof FormData
            ? await axios.post(form.getAttribute('action'), payload)
            : await axios.put(form.getAttribute('action'), payload);

        return { data };
    } catch (error) {
        return { error };
    } finally {
        button.disabled = false;
    }
};

const hideModal = (id) => {
    window.bootstrap.Modal.getOrCreateInstance(document.getElementById(id)).hide();
};

const fallbackError = (error, message) => error.response?.data?.errors ?? { error: [message] };

/**
 * PHP can reject the body before Laravel ever sees it: 413 when it exceeds
 * post_max_size, and 419 when the body is dropped so the CSRF token never
 * arrives. Neither carries a validation payload, so explain them ourselves.
 */
const bodyRejectedMessage = (error, uploaded) => {
    switch (error.response?.status) {
        case 413:
            return 'The picture is too large for this server to accept (HTTP 413). Choose a smaller image and try again.';
        case 419:
            return uploaded
                ? 'The server dropped the upload before it could be read, which usually means the picture is too large. Choose a smaller image, reload the page and try again.'
                : 'Your session expired before the request was sent. Reload the page and sign in again.';
        default:
            return null;
    }
};

document.addEventListener('DOMContentLoaded', () => {
    initPasswordStrengthBars();

    const profileForm = document.getElementById('account_profile_form');
    const passwordForm = document.getElementById('account_password_form');

    if (!profileForm || !passwordForm) {
        return;
    }

    const hint = document.getElementById('account_password_hint');
    const avatar = document.getElementById('account_profile_avatar');
    const removeButton = document.getElementById('account_profile_remove_picture');
    const removeField = profileForm.elements.remove_profile_picture;
    const defaultAvatar = avatar?.dataset.defaultSrc ?? '';

    let savedAvatar = avatar?.getAttribute('src') ?? '';
    let hasPicture = savedAvatar !== defaultAvatar;
    let previewUrl = null;

    const setRemoveRequested = (requested) => {
        removeField.value = requested ? '1' : '0';
        removeButton.textContent = requested ? 'Keep picture' : 'Remove picture';
        removeButton.classList.toggle('btn-outline-secondary', requested);
        removeButton.classList.toggle('btn-outline-danger', !requested);
    };

    // Show the picked file before it is uploaded; a pick cancels a removal.
    profileForm.elements.profile_picture?.addEventListener('change', (event) => {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        setRemoveRequested(false);
        removeButton.classList.remove('d-none');

        const file = event.target.files?.[0];

        if (!file) {
            if (avatar) {
                avatar.src = savedAvatar;
            }

            return;
        }

        previewUrl = URL.createObjectURL(file);

        if (avatar) {
            avatar.src = previewUrl;
        }
    });

    // Removing is a toggle: the flag rides along with the next save, and the
    // preview falls back to the default avatar straight away.
    removeButton?.addEventListener('click', () => {
        const requested = removeField.value !== '1';

        if (requested) {
            // A pending removal wins over a picked file.
            profileForm.elements.profile_picture.value = '';
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        setRemoveRequested(requested);

        if (avatar) {
            avatar.src = requested ? defaultAvatar : savedAvatar;
        }
    });

    // Drop the picked file and show what is actually stored instead.
    const clearPickedFile = () => {
        profileForm.elements.profile_picture.value = '';

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (avatar) {
            avatar.src = removeField.value === '1' ? defaultAvatar : savedAvatar;
        }
    };

    profileForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        clearErrors(profileForm);

        const picked = profileForm.elements.profile_picture?.files?.[0];

        if (picked && picked.size > MAX_PICTURE_BYTES) {
            clearPickedFile();
            showErrors(profileForm, {
                profile_picture: ['The profile picture must not be larger than 10 MB.'],
            });
            return;
        }

        const payload = new FormData(profileForm);

        payload.set('first_name', profileForm.elements.first_name.value.trim());
        payload.set('last_name', profileForm.elements.last_name.value.trim());

        // An untouched file input would otherwise be sent as an empty file.
        if (!profileForm.elements.profile_picture?.files.length) {
            payload.delete('profile_picture');
        }

        const { data, error } = await submit(profileForm, payload);

        if (error) {
            // A rejected upload must not leave the pick or its preview behind.
            clearPickedFile();

            const rejected = bodyRejectedMessage(error, Boolean(picked));

            showErrors(
                profileForm,
                rejected ? { error: [rejected] } : fallbackError(error, 'Your profile could not be saved.')
            );

            return;
        }

        // Keep the form (and its reset value) in step with what was saved.
        ['first_name', 'last_name'].forEach((field) => {
            const input = profileForm.elements[field];
            input.value = data.user[field];
            input.setAttribute('value', data.user[field]);
        });

        const topbarName = document.querySelector('.nav-user h5');
        const topbarAvatar = document.querySelector('.nav-user .topbar-link img');

        if (topbarName) {
            topbarName.textContent = data.user.first_name;
        }

        if (topbarAvatar) {
            topbarAvatar.src = data.user.profile_picture_url;
        }

        if (avatar) {
            avatar.src = data.user.profile_picture_url;
        }

        savedAvatar = data.user.profile_picture_url;
        hasPicture = data.user.has_picture;

        setRemoveRequested(false);
        removeButton?.classList.toggle('d-none', !hasPicture);

        hideModal('account_profile_modal');
        toast(data.message);
    });

    passwordForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        clearErrors(passwordForm);

        const current = passwordForm.elements.current_password.value;
        const next = passwordForm.elements.password.value;
        const confirmation = passwordForm.elements.password_confirmation.value;

        hint.textContent = '';
        hint.classList.remove('text-danger');

        const warn = (message) => {
            hint.textContent = message;
            hint.classList.add('text-danger');
        };

        // The same scoring the strength bars use: 4/4 is a strong password.
        if (meter.getPasswordScore(next) < meter.barCount) {
            return warn('Use 8+ characters with upper and lower case letters, a number and a symbol.');
        }

        if (next === current) {
            return warn('Your new password must be different from your current password.');
        }

        if (next !== confirmation) {
            return warn('The new password and its confirmation do not match.');
        }

        const { data, error } = await submit(passwordForm, {
            current_password: current,
            password: next,
            password_confirmation: confirmation,
        });

        if (error) {
            showErrors(passwordForm, fallbackError(error, 'Your password could not be changed.'));
            return;
        }

        passwordForm.reset();
        hideModal('account_password_modal');
        toast(data.message);
    });

    // A reopened modal starts clean instead of showing the previous attempt.
    [['account_profile_modal', profileForm], ['account_password_modal', passwordForm]].forEach(([id, form]) => {
        document.getElementById(id)?.addEventListener('hidden.bs.modal', () => {
            form.reset();

            if (form === profileForm) {
                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = null;
                }

                if (avatar) {
                    avatar.src = savedAvatar;
                }

                setRemoveRequested(false);
                removeButton?.classList.toggle('d-none', !hasPicture);
            }

            clearErrors(form);
            hint.textContent = '';
            hint.classList.remove('text-danger');
        });
    });
});
