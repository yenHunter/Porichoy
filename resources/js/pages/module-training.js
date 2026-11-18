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

    if (document.getElementById('training-details-editor')) {
        myQuill = new Quill('#training-details-editor', {
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
            document.getElementById('training_details_hidden').value = myQuill.root.innerHTML;
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

// The same limits the server enforces. Certificates are documents as well as
// images, so PDFs are accepted here and stored as uploaded.
const CERTIFICATE_MIME_TYPES = ['application/pdf', 'image/jpeg', 'image/png'];
const CERTIFICATE_MAX_BYTES = 10 * 1024 * 1024;

// Register plugin
registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

const form = document.getElementById('create_update_form');
const submitButton = form.querySelector('button[type="submit"]');
const startDateInput = document.getElementById('start_date');
const endDateInput = document.getElementById('end_date');
const certificateFileInput = form.elements.training_certificate_file ?? form.querySelector('input[name="training_certificate"][type="file"]');
const certificateLinkInput = document.getElementById('training_certificate_link');
const certificateFileDiv = document.getElementById('certificate-file-div');
const certificateLinkDiv = document.getElementById('certificate-link-div');
const certificateSourceFile = document.getElementById('certificate_source_file');
const certificateSourceLink = document.getElementById('certificate_source_link');
const currentCertificateCard = document.getElementById('current_training_certificate');
const currentCertificateLink = document.getElementById('current_training_certificate_link');
const removeCertificateInput = document.getElementById('remove_training_certificate');
const removeCertificateButton = document.getElementById('current_training_certificate_remove');
const certificateRemovedNotice = document.getElementById('current_training_certificate_removed');
const undoRemoveButton = document.getElementById('current_training_certificate_undo');
const statusInput = document.getElementById('training_status');

let currentCertificateUrl = '';

// Initialize the picker after the elements it talks to exist.
const ponds = [];

document.querySelectorAll('.filepond').forEach(input => {
    const pond = create(input, {
        allowImagePreview: true,
        imagePreviewHeight: 150,
        allowMultiple: false,
        acceptedFileTypes: CERTIFICATE_MIME_TYPES,
        maxFileSize: CERTIFICATE_MAX_BYTES,
        // Report the limit in the same units the help text uses.
        fileSizeBase: 1024,
        instantUpload: false,
        storeAsFile: true,
        labelIdle: 'Drag & drop a certificate or <span class="filepond--label-action">Browse</span>',
        labelFileTypeNotAllowed: 'The certificate must be a PDF, JPG or PNG file.',
        labelMaxFileSizeExceeded: 'This certificate is too large.',
        labelMaxFileSize: 'The maximum size is {filesize}.',
        // A rejected file stays in the list on its own, so an accepted pick
        // would sit next to it and the field would look like it holds two.
        onaddfile: (error) => {
            if (!error) {
                dropRejectedFiles(pond);
                // The new pick replaces the stored certificate, so the card and
                // any queued removal are no longer relevant.
                resetCertificateRemoval();
                currentCertificateCard.classList.add('d-none');
            }
        },
        onremovefile: () => {
            if (currentCertificateUrl && removeCertificateInput.value !== '1') {
                currentCertificateCard.classList.remove('d-none');
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

/**
 * Switch between the two certificate sources.
 *
 * Only the active input is submitted: the other one is disabled, so a link
 * typed during an earlier edit can never override an uploaded file (both
 * inputs share the `training_certificate` name).
 */
function setCertificateMode(mode) {
    const isFile = mode !== 'link';

    certificateSourceFile.checked = isFile;
    certificateSourceLink.checked = !isFile;

    certificateFileDiv.classList.toggle('d-none', !isFile);
    certificateLinkDiv.classList.toggle('d-none', isFile);

    certificateFileInput.disabled = !isFile;
    certificateLinkInput.disabled = isFile;

    if (!isFile) {
        ponds.forEach(pond => pond.removeFiles());
    }

    if (currentCertificateUrl && removeCertificateInput.value !== '1') {
        currentCertificateCard.classList.remove('d-none');
    } else {
        currentCertificateCard.classList.add('d-none');
    }
}

/** Show the certificate already saved for the record being edited. */
function setCurrentCertificate(url) {
    currentCertificateUrl = url || '';

    if (!currentCertificateUrl) {
        currentCertificateLink.setAttribute('href', '');
        currentCertificateCard.classList.add('d-none');

        return;
    }

    currentCertificateLink.href = currentCertificateUrl;
    currentCertificateCard.classList.remove('d-none');
}

/** Clear a queued certificate removal (a new pick or a reset supersedes it). */
function resetCertificateRemoval() {
    removeCertificateInput.value = '0';
    certificateRemovedNotice.classList.add('d-none');
}

certificateSourceFile.addEventListener('change', () => setCertificateMode('file'));
certificateSourceLink.addEventListener('change', () => setCertificateMode('link'));

// Start in file mode with the link input disabled: an empty link submitted
// next to an untouched file input would otherwise clear the stored value.
setCertificateMode('file');

removeCertificateButton.addEventListener('click', () => {
    removeCertificateInput.value = '1';
    currentCertificateCard.classList.add('d-none');
    certificateRemovedNotice.classList.remove('d-none');
});

undoRemoveButton.addEventListener('click', () => {
    resetCertificateRemoval();

    if (currentCertificateUrl) {
        currentCertificateCard.classList.remove('d-none');
    }
});

/** The end date must not precede the start date. */
function endDateError() {
    if (!startDateInput.value || !endDateInput.value) {
        return '';
    }

    if (endDateInput.value < startDateInput.value) {
        return 'The end date must be on or after the start date.';
    }

    return '';
}

function checkEndDate() {
    setFieldError(endDateInput, endDateError());
}

startDateInput.addEventListener('change', checkEndDate);
endDateInput.addEventListener('change', checkEndDate);

/** Link mode needs a URL unless the certificate is being removed. */
function certificateError() {
    if (certificateSourceLink.checked
        && removeCertificateInput.value !== '1'
        && !certificateLinkInput.value.trim()) {
        return 'Enter a certificate link or choose Upload a file.';
    }

    return '';
}

function checkCertificate() {
    setFieldError(certificateLinkInput, certificateError());
}

certificateLinkInput.addEventListener('change', checkCertificate);

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
        const element = form.elements[field];
        // The two certificate inputs share a name, so the lookup can return a
        // RadioNodeList instead of a single control.
        const input = element instanceof RadioNodeList ? element[0] : element;

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
    const linkError = certificateError();

    if (dateError || linkError) {
        if (dateError) {
            setFieldError(endDateInput, dateError);
        }

        if (linkError) {
            setFieldError(certificateLinkInput, linkError);
        }

        const first = dateError ? endDateInput : certificateLinkInput;
        first.scrollIntoView({ block: 'center' });
        first.focus({ preventScroll: true });

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
            console.error('Training save failed:', error);
            Swal.fire('Error!', 'The training info could not be saved.', 'error');
        }
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = submitLabel;
    }
});

$(function () {
    $("#sortable-training").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-training tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('module.training.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Training order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const training_id = $(this).data('training_id');

    axios.get(route('module.training.edit', training_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#training_id').val(data.id);
            $('#training_category').val(data.training_category);
            $('#training_title').val(data.training_title);
            $('#training_institute').val(data.training_institute);
            // The edit response already carries 'Y-m-d' strings. Parsing the raw
            // date attributes would shift the day for a client west of the app
            // timezone (the UTC serialisation is the previous day there).
            $('#start_date').val(data.start_date_input || '');
            $('#end_date').val(data.end_date_input || '');
            $('#training_location').val(data.training_location);
            $('#training_status').val(data.training_status == 1 ? 1 : 0);

            // A picked file from an earlier open must not ride along.
            ponds.forEach(pond => pond.removeFiles());
            clearFormErrors();
            resetCertificateRemoval();

            // A certificate stored as a link prefills the link field; a stored
            // file shows the current-certificate card instead.
            certificateLinkInput.value = data.certificate_is_url ? (data.training_certificate || '') : '';
            setCurrentCertificate(data.certificate_url || '');
            setCertificateMode(data.certificate_is_url ? 'link' : 'file');

            const htmlContent = data.training_details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#training_details_hidden').val(htmlContent);

            // Update form
            form.action = route('module.training.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update training info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load training data:", error);
            Swal.fire('Error!', 'Could not fetch training data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    form.reset();
    form.setAttribute('action', route('module.training.store'));
    document.getElementById('create_update_form_method').value = 'POST';
    document.getElementById('training_id').value = '';
    myQuill.root.innerHTML = '';
    $('#training_details_hidden').val('');
    // FilePond keeps files in sync with the input, so a closed modal must drop
    // them or the next create would resubmit the previous pick.
    ponds.forEach(pond => pond.removeFiles());
    certificateLinkInput.value = '';
    setCurrentCertificate('');
    resetCertificateRemoval();
    setCertificateMode('file');
    clearFormErrors();
    statusInput.value = '1';
    document.getElementById('create_update_modal_title').innerHTML = 'Create training info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const training_id = this.getAttribute('data-training_id');

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
                        route('module.training.delete', training_id);

                }
            });
        });
    });
});
