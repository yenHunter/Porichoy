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

import Choices from 'choices.js'

document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('[data-choices]');
    if (elements && elements.length > 0) {
        elements.forEach(item => {
            const config = {
                placeholderValue: item.hasAttribute("data-choices-groups") ? "This is a placeholder set in the config" : undefined,
                searchEnabled: item.hasAttribute("data-choices-search-true"),
                removeItemButton: item.hasAttribute("data-choices-removeItem") || item.hasAttribute("data-choices-multiple-remove"),
                shouldSort: !item.hasAttribute("data-choices-sorting-false"),
                maxItemCount: item.getAttribute("data-choices-limit") || undefined,
                duplicateItemsAllowed: !item.hasAttribute("data-choices-text-unique-true"),
                addItems: !item.hasAttribute("data-choices-text-disabled-true")
            };
            const instance = new Choices(item, config);
            if (item.hasAttribute("data-choices-text-disabled-true")) instance.disable();
        });
    }
});

let myQuill;
let choicesClientInstance;
let choicesServiceInstance;

/**
 * Choices has no getOrCreateInstance in this build, and the admin select is a
 * plain <select> with no data-choices attribute, so one is built per select.
 */
function createChoices(selector) {
    const element = document.querySelector(selector);

    return element ? new Choices(element, { searchEnabled: true, shouldSort: false }) : null;
}

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

    if (document.getElementById('project-details-editor')) {
        myQuill = new Quill('#project-details-editor', {
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
            document.getElementById('project_details_hidden').value = myQuill.root.innerHTML;
        });
    }

    // Store Choices instances for later use
    choicesClientInstance = createChoices('#client_id');
    choicesServiceInstance = createChoices('#service_id');
});

new DataTable('[data-tables="basic"]', {
    language: {
        paginate: {
            first: '<i class="ti ti-chevrons-left"></i>',
            previous: '<i class="ti ti-chevron-left"></i>',
            next: '<i class="ti ti-chevron-right"></i>',
            last: '<i class="ti ti-chevrons-right"></i>',
        },
    },
});

// Register plugin
registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);

// The same limits the server enforces.
const IMAGE_MIME_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
const IMAGE_MAX_BYTES = 10 * 1024 * 1024;

const form = document.getElementById('create_update_form');
const submitButton = form.querySelector('button[type="submit"]');
const startDateInput = document.getElementById('start_date');
const endDateInput = document.getElementById('end_date');
const statusInput = document.getElementById('project_status');

/**
 * One stored image: its picker, its "current image" card and its removal
 * request. The server keeps the stored image when none of them changes.
 */
const imageGroups = ['profile_image', 'cover_image'].map(field => ({
    field,
    card: document.getElementById(`current_${field}`),
    preview: document.getElementById(`current_${field}_preview`),
    removeInput: document.getElementById(`remove_${field}`),
    removeButton: document.getElementById(`current_${field}_remove`),
    notice: document.getElementById(`current_${field}_removed`),
    undoButton: document.getElementById(`current_${field}_undo`),
    url: '',
}));

function imageGroup(field) {
    return imageGroups.find(group => group.field === field);
}

// Initialize the pickers after the elements they talk to exist.
const ponds = {};

form.querySelectorAll('input.filepond').forEach(input => {
    const group = imageGroup(input.name);

    ponds[input.name] = create(input, {
        allowImagePreview: true,
        imagePreviewHeight: 150,
        allowMultiple: false,
        acceptedFileTypes: IMAGE_MIME_TYPES,
        maxFileSize: IMAGE_MAX_BYTES,
        // Report the limit in the same units the help text uses.
        fileSizeBase: 1024,
        instantUpload: false,
        storeAsFile: true,
        // Without the plugin an oversized file is only rejected by the server,
        // after the whole modal has been submitted.
        labelIdle: 'Drag & drop an image or <span class="filepond--label-action">Browse</span>',
        labelFileTypeNotAllowed: 'The image must be a JPEG, PNG, GIF or WebP file.',
        labelMaxFileSizeExceeded: 'This image is too large.',
        labelMaxFileSize: 'The maximum size is {filesize}.',
        // A rejected file stays in the list on its own, so an accepted pick
        // would sit next to it and the field would look like it holds two.
        onaddfile: (error) => {
            if (!error) {
                dropRejectedFiles(ponds[input.name]);
                // The new pick replaces the stored image and any queued removal.
                resetImageRemoval(group);
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

/** Show the image already saved for the record being edited. */
function setCurrentImage(group, url) {
    group.url = url || '';

    if (!group.url) {
        group.preview.setAttribute('src', '');
        group.card.classList.add('d-none');

        return;
    }

    group.preview.src = group.url;
    group.card.classList.remove('d-none');
}

/** Clear a queued image removal (a new pick or a reset supersedes it). */
function resetImageRemoval(group) {
    group.removeInput.value = '0';
    group.notice.classList.add('d-none');
}

imageGroups.forEach(group => {
    group.removeButton.addEventListener('click', () => {
        group.removeInput.value = '1';
        group.card.classList.add('d-none');
        group.notice.classList.remove('d-none');
    });

    group.undoButton.addEventListener('click', () => {
        resetImageRemoval(group);

        if (group.url) {
            group.card.classList.remove('d-none');
        }
    });
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
            console.error('Project save failed:', error);
            Swal.fire('Error!', 'The project could not be saved.', 'error');
        }
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = submitLabel;
    }
});

$(function () {
    $("#sortable-project").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-project tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('element.project.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Project order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const project_id = $(this).data('project_id');

    axios.get(route('element.project.edit', project_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#project_id').val(data.id);
            $('#project_title').val(data.project_title);
            // The edit response already carries 'Y-m-d' strings. Parsing the raw
            // date attributes would shift the day for a client west of the app
            // timezone (the UTC serialisation is the previous day there).
            $('#start_date').val(data.start_date_input || '');
            $('#end_date').val(data.end_date_input || '');
            $('#project_location').val(data.project_location);
            $('#project_background').val(data.project_background);
            $('#project_challenges').val(data.project_challenges);
            $('#project_solution').val(data.project_solution);
            $('#project_status').val(data.project_status == 1 ? 1 : 0);

            // Set Choices select values
            if (data.client_id) {
                choicesClientInstance?.setChoiceByValue(data.client_id.toString());
            } else {
                choicesClientInstance?.clearStore();
            }

            if (data.service_id) {
                choicesServiceInstance?.setChoiceByValue(data.service_id.toString());
            } else {
                choicesServiceInstance?.clearStore();
            }

            // A picked file from an earlier open must not ride along.
            Object.values(ponds).forEach(pond => pond.removeFiles());
            clearFormErrors();

            imageGroups.forEach(group => {
                resetImageRemoval(group);
                setCurrentImage(
                    group,
                    data[group.field] ? (data[`${group.field}_url`] || '') : ''
                );
            });

            // Set Quill editor content
            const htmlContent = data.project_details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#project_details_hidden').val(htmlContent);

            // Update form
            form.action = route('element.project.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update project info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load project data:", error);
            Swal.fire('Error!', 'Could not fetch project data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    form.reset();
    form.setAttribute('action', route('element.project.store'));
    document.getElementById('create_update_form_method').value = 'POST';
    document.getElementById('project_id').value = '';
    myQuill.root.innerHTML = '';
    $('#project_details_hidden').val('');
    // FilePond keeps files in sync with the input, so a closed modal must drop
    // them or the next create would resubmit the previous picks.
    Object.values(ponds).forEach(pond => pond.removeFiles());
    imageGroups.forEach(group => {
        resetImageRemoval(group);
        setCurrentImage(group, '');
    });
    choicesClientInstance?.clearStore();
    choicesServiceInstance?.clearStore();
    clearFormErrors();
    statusInput.value = '1';
    document.getElementById('create_update_modal_title').innerHTML = 'Create project info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const project_id = this.getAttribute('data-project_id');

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
                        route('element.project.delete', project_id);

                }
            });
        });
    });
});
