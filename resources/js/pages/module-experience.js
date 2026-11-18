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

import Quill from 'quill';
import 'quill/dist/quill.snow.css';

let myQuill;

$(document).ready(function () {
    try {
        const icons = Quill.import('ui/icons');
        icons['bold'] = '<i class="ti ti-bold fs-lg"></i>';
        icons['italic'] = '<i class="ti ti-italic fs-lg"></i>';
        icons['underline'] = '<i class="ti ti-underline fs-lg"></i>';
        icons['strike'] = '<i class="ti ti-strikethrough fs-lg"></i>';
        icons['list'] = '<i class="ti ti-list fs-lg"></i>';
        icons['bullet'] = '<i class="ti ti-list-ul fs-lg"></i>';
        icons['indent'] = '<i class="ti ti-indent-increase fs-lg"></i>';
        icons['outdent'] = '<i class="ti ti-indent-decrease fs-lg"></i>';
        icons['link'] = '<i class="ti ti-link fs-lg"></i>';
        icons['image'] = '<i class="ti ti-photo fs-lg"></i>';
        icons['video'] = '<i class="ti ti-video fs-lg"></i>';
        icons['code-block'] = '<i class="ti ti-code fs-lg"></i>';
        icons['clean'] = '<i class="ti ti-trash fs-lg"></i>';
        icons['color'] = '<i class="ti ti-paint fs-lg"></i>';
        icons['background'] = '<i class="ti ti-background fs-lg"></i>';
        icons['script']['super'] = '<i class="ti ti-superscript fs-lg"></i>';
        icons['script']['sub'] = '<i class="ti ti-subscript fs-lg"></i>';
        icons['blockquote'] = '<i class="ti ti-blockquote fs-lg"></i>';
        icons['align'][''] = '<i class="ti ti-align-left fs-lg"></i>';
        icons['align']['center'] = '<i class="ti ti-align-center fs-lg"></i>';
        icons['align']['right'] = '<i class="ti ti-align-right fs-lg"></i>';
        icons['align']['justify'] = '<i class="ti ti-align-justified fs-lg"></i>';
        icons['header']['1'] = '<i class="ti ti-h-1 fs-lg"></i>';
        icons['header']['2'] = '<i class="ti ti-h-2 fs-lg"></i>';
        icons['header']['3'] = '<i class="ti ti-h-3 fs-lg"></i>';
        icons['header'][''] = '<i class="ti ti-letter-t fs-lg"></i>'; // Normal text
    } catch (e) {
        console.warn('Quill Icon customization failed:', e);
    }

    if (document.getElementById('employment-details-editor')) {
        myQuill = new Quill('#employment-details-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'super' }, { 'script': 'sub' }],
                    [{ 'header': [false, 1, 2, 3, 4, 5, 6] }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        myQuill.on('text-change', function () {
            document.getElementById('employment_details_hidden').value = myQuill.root.innerHTML;
        });
    }
});

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
const LOGO_MIME_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
const LOGO_MAX_BYTES = 10 * 1024 * 1024;

// Register plugin
registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

// Initialize
const inputElement = document.querySelectorAll('.filepond');
const ponds = [];

inputElement.forEach(input => {
    const pond = create(input, {
        allowImagePreview: true,
        imagePreviewHeight: 150,
        allowMultiple: false,
        acceptedFileTypes: LOGO_MIME_TYPES,
        maxFileSize: LOGO_MAX_BYTES,
        // Report the limit in the same units the help text uses.
        fileSizeBase: 1024,
        instantUpload: false,
        storeAsFile: true,
        labelIdle: 'Drag & drop a logo or <span class="filepond--label-action">Browse</span>',
        labelFileTypeNotAllowed: 'The organization logo must be a JPEG, PNG, GIF or WebP image.',
        labelMaxFileSizeExceeded: 'This logo is too large.',
        labelMaxFileSize: 'The maximum size is {filesize}.',
        // A rejected file stays in the list on its own, so an accepted pick
        // would sit next to it and the field would look like it holds two.
        onaddfile: (error) => {
            if (!error) {
                dropRejectedFiles(pond);
                // The new pick replaces the stored logo, so the card and any
                // queued removal are no longer relevant.
                resetLogoRemoval();
                currentLogoCard.classList.add('d-none');
            }
        },
        onremovefile: () => {
            if (currentLogoUrl && removeLogoInput.value !== '1') {
                currentLogoCard.classList.remove('d-none');
            }
        },
    });

    ponds.push(pond);
});

/**
 * Remove files FilePond rejected (wrong type, too large) from the list.
 */
function dropRejectedFiles(pond) {
    pond.getFiles()
        .filter(file => file.status === FileStatus.LOAD_ERROR)
        .forEach(file => pond.removeFile(file));
}

const form = document.getElementById('create_update_form');
const submitButton = form.querySelector('button[type="submit"]');
const startDateInput = document.getElementById('start_date');
const endDateInput = document.getElementById('end_date');
const currentPositionInput = document.getElementById('current_position');
const endDateRequiredBadge = document.getElementById('end_date_required');
const statusInput = document.getElementById('employment_status');
const currentLogoCard = document.getElementById('current_organization_logo');
const currentLogoImage = document.getElementById('current_organization_logo_image');
const removeLogoInput = document.getElementById('remove_organization_logo');
const removeLogoButton = document.getElementById('current_organization_logo_remove');
const logoRemovedNotice = document.getElementById('current_organization_logo_removed');
const undoRemoveButton = document.getElementById('current_organization_logo_undo');

let currentLogoUrl = '';

/**
 * Show the logo already saved for the record being edited (or hide the card
 * when creating, or when the record has no logo yet).
 */
function setCurrentLogo(url) {
    currentLogoUrl = url || '';

    if (currentLogoUrl) {
        currentLogoImage.src = currentLogoUrl;
        currentLogoCard.classList.remove('d-none');

        return;
    }

    currentLogoImage.removeAttribute('src');
    currentLogoCard.classList.add('d-none');
}

/** Clear a queued logo removal (a new pick or a reset supersedes it). */
function resetLogoRemoval() {
    removeLogoInput.value = '0';
    logoRemovedNotice.classList.add('d-none');
}

removeLogoButton.addEventListener('click', () => {
    removeLogoInput.value = '1';
    currentLogoCard.classList.add('d-none');
    logoRemovedNotice.classList.remove('d-none');
});

undoRemoveButton.addEventListener('click', () => {
    resetLogoRemoval();

    if (currentLogoUrl) {
        currentLogoCard.classList.remove('d-none');
    }
});

/**
 * A role still being worked has no end date: the input is disabled so it is
 * not submitted, and the update clears the stored value. Otherwise the end
 * date is required in the form (the request still accepts it as optional).
 */
function syncEndDateState() {
    const isCurrent = currentPositionInput.checked;

    endDateInput.disabled = isCurrent;
    endDateRequiredBadge.classList.toggle('d-none', isCurrent);
}

currentPositionInput.addEventListener('change', () => {
    if (currentPositionInput.checked) {
        endDateInput.value = '';
        syncEndDateState();
        clearFieldError(endDateInput);

        return;
    }

    syncEndDateState();
    checkEndDate();
});

/** The end date is required unless the role is still being worked. */
function endDateError() {
    if (endDateInput.disabled) {
        return '';
    }

    if (!endDateInput.value) {
        return 'The end date is required unless you are currently working in this role.';
    }

    if (startDateInput.value && endDateInput.value < startDateInput.value) {
        return 'The end date must be on or after the start date.';
    }

    return '';
}

function checkEndDate() {
    setFieldError(endDateInput, endDateError());
}

startDateInput.addEventListener('change', checkEndDate);
endDateInput.addEventListener('change', checkEndDate);

/**
 * Show one validation message under the field it belongs to.
 */
function setFieldError(input, message) {
    clearFieldError(input);

    if (!message) {
        return;
    }

    input.classList.add('is-invalid');

    const holder = input.closest('.col-lg-12') || input.parentElement;
    const feedback = document.createElement('div');
    feedback.className = 'invalid-feedback d-block';
    feedback.dataset.fieldError = 'true';
    feedback.textContent = message;
    holder.appendChild(feedback);
}

function clearFieldError(input) {
    input.classList.remove('is-invalid');

    const holder = input.closest('.col-lg-12') || input.parentElement;
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

    const dateError = endDateError();

    if (dateError) {
        setFieldError(endDateInput, dateError);
        endDateInput.scrollIntoView({ block: 'center' });
        endDateInput.focus({ preventScroll: true });

        return;
    }

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
            console.error('Experience save failed:', error);
            Swal.fire('Error!', 'The experience info could not be saved.', 'error');
        }
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = submitLabel;
    }
});

$(function () {
    $("#sortable-experience").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-experience tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('module.experience.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Experience order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const experience_id = $(this).data('experience_id');

    axios.get(route('module.experience.edit', experience_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#experience_id').val(data.id);
            $('#employment_position').val(data.employment_position);
            $('#employment_type').val(data.employment_type);
            $('#employment_department').val(data.employment_department);
            $('#employment_organization').val(data.employment_organization);
            $('#organization_address').val(data.organization_address);
            // The edit response already carries 'Y-m-d' strings. Parsing the raw
            // date attributes would shift the day for a client west of the app
            // timezone (the UTC serialisation is the previous day there).
            const formattedStart = data.start_date_input || '';
            const formattedEnd = data.end_date_input || '';
            $('#start_date').val(formattedStart);
            $('#end_date').val(formattedEnd);
            $('#location_type').val(data.location_type);
            $('#employment_status').val(data.employment_status == 1 ? 1 : 0);

            // A record without an end date is a role still being worked.
            currentPositionInput.checked = formattedEnd === '';
            syncEndDateState();
            clearFormErrors();
            resetLogoRemoval();

            // A picked file from an earlier open must not ride along; the stored
            // logo is shown separately and is only replaced by a new pick.
            ponds.forEach(pond => pond.removeFiles());
            setCurrentLogo(data.organization_logo ? data.organization_logo_url : '');

            const htmlContent = data.employment_details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#employment_details_hidden').val(htmlContent);

            // Update form
            const form = document.getElementById('create_update_form');
            form.action = route('module.experience.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update experience info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load experience data:", error);
            Swal.fire('Error!', 'Could not fetch experience data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    $('#create_update_form')[0].reset();
    $('#create_update_form').attr('action', route('module.experience.store'));
    $('#create_update_form_method').val('POST');
    $('#experience_id').val('');
    myQuill.root.innerHTML = '';
    $('#employment_details_hidden').val('');
    // FilePond keeps files in sync with the input, so a closed modal must drop
    // them or the next create would resubmit the previous pick.
    ponds.forEach(pond => pond.removeFiles());
    setCurrentLogo('');
    resetLogoRemoval();
    currentPositionInput.checked = false;
    syncEndDateState();
    clearFormErrors();
    statusInput.value = '1';
    document.getElementById('create_update_modal_title').innerHTML = 'Create experience info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const experience_id = this.getAttribute('data-experience_id');

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
                        route('module.experience.delete', experience_id);

                }
            });
        });
    });
});
