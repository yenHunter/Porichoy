import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import 'jquery-ui-dist/jquery-ui';
import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

import { registerPlugin, create, FileStatus } from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

new DataTable('[data-tables="basic"]', {
    language: {
        paginate: {
            first: '<i class="ti ti-chevrons-left"></i>', // Tabler First
            previous: '<i class="ti ti-chevron-left"></i>', // Tabler Prev
            next: '<i class="ti ti-chevron-right"></i>', // Tabler Next
            last: '<i class="ti ti-chevrons-right"></i>', // Tabler Last
        },
    },
});

// The same limits the server enforces, applied to the picked file so a wrong
// type or an oversized image is refused before anything is sent.
const IMAGE_MIME_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
const IMAGE_MAX_BYTES = 10 * 1024 * 1024;
const TYPE_ERROR = 'must be a JPEG, PNG, GIF or WebP image';

registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

/** The two images the element manages, with the copy each card shows. */
const IMAGE_GROUPS = [
    {
        field: 'client_picture',
        label: 'Client picture',
        idle: 'Drag & drop the client picture or <span class="filepond--label-action">Browse</span>',
        current: 'Current picture',
        removed: 'The picture will be removed when you save.',
    },
    {
        field: 'organization_logo',
        label: 'Organization logo',
        idle: 'Drag & drop the organization logo or <span class="filepond--label-action">Browse</span>',
        current: 'Current logo',
        removed: 'The logo will be removed when you save.',
    },
];

const form = document.getElementById('create_update_form');
const submitButton = form.querySelector('button[type="submit"]');
const statusInput = document.getElementById('client_status');

const groups = IMAGE_GROUPS.map(config => ({
    ...config,
    pond: null,
    url: '',
    card: document.getElementById(`current_${config.field}`),
    image: document.getElementById(`current_${config.field}_image`),
    removeInput: document.getElementById(`remove_${config.field}`),
    removeButton: document.getElementById(`current_${config.field}_remove`),
    removedNotice: document.getElementById(`current_${config.field}_removed`),
    undoButton: document.getElementById(`current_${config.field}_undo`),
}));

groups.forEach(group => {
    const input = form.querySelector(`input[name="${group.field}"]`);

    if (!input) {
        return;
    }

    group.pond = create(input, {
        allowImagePreview: true,
        imagePreviewHeight: 150,
        allowMultiple: false,
        acceptedFileTypes: IMAGE_MIME_TYPES,
        maxFileSize: IMAGE_MAX_BYTES,
        // Report the limit in the same units the help text uses.
        fileSizeBase: 1024,
        instantUpload: false,
        storeAsFile: true,
        labelIdle: group.idle,
        labelFileTypeNotAllowed: `The ${group.label.toLowerCase()} ${TYPE_ERROR}.`,
        labelMaxFileSizeExceeded: `This ${group.label.toLowerCase()} is too large.`,
        labelMaxFileSize: 'The maximum size is {filesize}.',
        // A rejected file stays in the list on its own, so an accepted pick
        // would sit next to it and the field would look like it holds two.
        onaddfile: (error) => {
            if (!error) {
                dropRejectedFiles(group.pond);
                // The new pick replaces the stored image, so the card and any
                // queued removal are no longer relevant.
                resetRemoval(group);
                group.card.classList.add('d-none');
            }
        },
        onremovefile: () => {
            if (group.url && group.removeInput.value !== '1') {
                group.card.classList.remove('d-none');
            }
        },
    });
});

/**
 * Remove files FilePond rejected (wrong type, too large) from the list.
 */
function dropRejectedFiles(pond) {
    pond.getFiles()
        .filter(file => file.status === FileStatus.LOAD_ERROR)
        .forEach(file => pond.removeFile(file));
}

/**
 * Show the image already saved for the record being edited (or hide the card
 * when creating, or when the record has no image yet).
 */
function setCurrentImage(group, url) {
    group.url = url || '';

    if (group.url) {
        group.image.src = group.url;
        group.card.classList.remove('d-none');

        return;
    }

    group.image.removeAttribute('src');
    group.card.classList.add('d-none');
}

/** Clear a queued removal (a new pick or a reset supersedes it). */
function resetRemoval(group) {
    group.removeInput.value = '0';
    group.removedNotice.classList.add('d-none');
}

groups.forEach(group => {
    group.removeButton?.addEventListener('click', () => {
        group.removeInput.value = '1';
        group.card.classList.add('d-none');
        group.removedNotice.classList.remove('d-none');
    });

    group.undoButton?.addEventListener('click', () => {
        resetRemoval(group);

        if (group.url) {
            group.card.classList.remove('d-none');
        }
    });
});

/**
 * Show one validation message under the field it belongs to.
 */
function setFieldError(input, message) {
    clearFieldError(input);

    if (!message) {
        return;
    }

    input.classList.add('is-invalid');

    const holder = input.closest('.col-lg-12') || input.closest('.col-lg-6') || input.parentElement;
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback d-block';
    feedback.dataset.fieldError = 'true';
    feedback.textContent = message;
    holder.appendChild(feedback);
}

function clearFieldError(input) {
    input.classList.remove('is-invalid');

    const holder = input.closest('.col-lg-12') || input.closest('.col-lg-6') || input.parentElement;
    holder?.querySelectorAll('[data-field-error]').forEach(node => node.remove());
}

function clearFormErrors() {
    form.querySelectorAll('.is-invalid').forEach(input => input.classList.remove('is-invalid'));
    form.querySelectorAll('[data-field-error]').forEach(node => node.remove());
}

/** Paint a 422 payload under its fields, then jump to the first one. */
function showFormErrors(errors) {
    Object.entries(errors).forEach(([field, messages]) => {
        const input = form.elements[field];

        if (!input || messages.length === 0) {
            return;
        }

        setFieldError(input, messages[0]);
    });

    const first = form.querySelector('.is-invalid');

    if (first) {
        first.scrollIntoView({ block: 'center' });
        first.focus({ preventScroll: true });
    }
}

function closeFormModal() {
    window.bootstrap.Modal.getInstance(document.getElementById('create_update_modal'))?.hide();
}

// Saved over JS so a rejected field keeps the modal (and what was typed in it)
// open, instead of reloading the page and losing both.
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    clearFormErrors();

    submitButton.disabled = true;
    const submitLabel = submitButton.innerHTML;
    submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';

    try {
        await axios.post(form.action, new FormData(form), {
            headers: { Accept: 'application/json' },
        });

        closeFormModal();
        window.location.reload();
    } catch (error) {
        if (error.response?.status === 422) {
            showFormErrors(error.response.data.errors ?? {});
        } else {
            console.error('Client save failed:', error);
            Swal.fire('Error!', 'The client info could not be saved.', 'error');
        }
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = submitLabel;
    }
});

$(function () {
    $("#sortable-client").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-client tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('element.client.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Client order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const client_id = $(this).data('client_id');

    axios.get(route('element.client.edit', client_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#client_id').val(data.id);
            $('#client_name').val(data.client_name);
            $('#client_email').val(data.client_email);
            $('#client_mobile').val(data.client_mobile);
            $('#client_designation').val(data.client_designation);
            $('#client_organization').val(data.client_organization);
            $('#client_address').val(data.client_address);
            $('#organization_website').val(data.organization_website);
            $('#client_status').val(data.client_status == 1 ? 1 : 0);

            clearFormErrors();

            // A picked file from an earlier open must not ride along; the stored
            // images are shown separately and are only replaced by a new pick.
            groups.forEach(group => {
                group.pond?.removeFiles();
                resetRemoval(group);
                setCurrentImage(group, group.field === 'client_picture'
                    ? (data.client_picture ? data.client_picture_url : '')
                    : (data.organization_logo ? data.organization_logo_url : ''));
            });

            // Update form
            form.action = route('element.client.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update client info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load client data:", error);
            Swal.fire('Error!', 'Could not fetch client data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    form.reset();
    $(form).attr('action', route('element.client.store'));
    $('#create_update_form_method').val('POST');
    $('#client_id').val('');
    // FilePond keeps files in sync with the input, so a closed modal must drop
    // them or the next create would resubmit the previous pick.
    groups.forEach(group => {
        group.pond?.removeFiles();
        setCurrentImage(group, '');
        resetRemoval(group);
    });
    clearFormErrors();
    statusInput.value = '1';
    document.getElementById('create_update_modal_title').innerHTML = 'Create client info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const client_id = this.getAttribute('data-client_id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href =
                        route('element.client.delete', client_id);

                }
            });
        });
    });
});
