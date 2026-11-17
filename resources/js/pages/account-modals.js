import axios from 'axios';
import Swal from 'sweetalert2';

import { PasswordAuth, initPasswordStrengthBars } from './auth-password';

const csrfToken = document.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.getAttribute('content');
}

const meter = new PasswordAuth();

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
        const { data } = await axios.put(form.getAttribute('action'), payload);
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

document.addEventListener('DOMContentLoaded', () => {
    initPasswordStrengthBars();

    const profileForm = document.getElementById('account_profile_form');
    const passwordForm = document.getElementById('account_password_form');

    if (!profileForm || !passwordForm) {
        return;
    }

    const hint = document.getElementById('account_password_hint');

    profileForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        clearErrors(profileForm);

        const { data, error } = await submit(profileForm, {
            first_name: profileForm.elements.first_name.value.trim(),
            last_name: profileForm.elements.last_name.value.trim(),
        });

        if (error) {
            showErrors(profileForm, fallbackError(error, 'Your profile could not be saved.'));
            return;
        }

        // Keep the form (and its reset value) in step with what was saved.
        ['first_name', 'last_name'].forEach((field) => {
            const input = profileForm.elements[field];
            input.value = data.user[field];
            input.setAttribute('value', data.user[field]);
        });

        const topbarName = document.querySelector('.nav-user h5');

        if (topbarName) {
            topbarName.textContent = data.user.first_name;
        }

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
            clearErrors(form);
            hint.textContent = '';
            hint.classList.remove('text-danger');
        });
    });
});
