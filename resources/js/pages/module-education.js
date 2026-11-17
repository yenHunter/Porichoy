import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import 'jquery-ui-dist/jquery-ui';
import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

import { registerPlugin, create } from 'filepond';
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

    if (document.getElementById('education-details-editor')) {
        myQuill = new Quill('#education-details-editor', {
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
            document.getElementById('education_details_hidden').value = myQuill.root.innerHTML;
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
    ponds.push(create(input, {
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
        labelFileTypeNotAllowed: 'The institute logo must be a JPEG, PNG, GIF or WebP image.',
        labelMaxFileSizeExceeded: 'This logo is too large.',
        labelMaxFileSize: 'The maximum size is {filesize}.',
    }));
});

const currentLogoCard = document.getElementById('current_institute_logo');
const currentLogoImage = document.getElementById('current_institute_logo_image');

/**
 * Show the logo already saved for the record being edited (or hide the card
 * when creating, or when the record has no logo yet).
 */
function setCurrentLogo(url) {
    if (url) {
        currentLogoImage.src = url;
        currentLogoCard.classList.remove('d-none');

        return;
    }

    currentLogoImage.removeAttribute('src');
    currentLogoCard.classList.add('d-none');
}

document.getElementById('current_degree').addEventListener('change', function () {
    let endDate = document.getElementById('end_date');
    if (this.checked) {
        endDate.disabled = true;
    } else {
        endDate.disabled = false;
    }
});

$(function () {
    $("#sortable-education").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-education tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('module.education.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Education order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const education_id = $(this).data('education_id');

    axios.get(route('module.education.edit', education_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#education_id').val(data.id);
            $('#education_degree').val(data.education_degree);
            $('#education_subject').val(data.education_subject);
            $('#education_institute').val(data.education_institute);
            $('#institute_address').val(data.institute_address);
            const startDate = data.start_date ? new Date(data.start_date) : null;
            const formattedStart = startDate ? startDate.toLocaleDateString('en-CA') : '';
            const endDate = data.end_date ? new Date(data.end_date) : null;
            const formattedEnd = endDate ? endDate.toLocaleDateString('en-CA') : '';
            $('#start_date').val(formattedStart);
            $('#end_date').val(formattedEnd);
            $('#education_result').val(data.education_result);
            $('#education_status').val(data.education_status == 1 ? 1 : 0);

            // A picked file from an earlier open must not ride along; the stored
            // logo is shown separately and is only replaced by a new pick.
            ponds.forEach(pond => pond.removeFiles());
            setCurrentLogo(data.institute_logo ? data.institute_logo_url : '');

            const htmlContent = data.education_details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#education_details_hidden').val(htmlContent);

            // Update form
            const form = document.getElementById('create_update_form');
            form.action = route('module.education.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update education info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load education data:", error);
            Swal.fire('Error!', 'Could not fetch education data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    $('#create_update_form')[0].reset();
    $('#create_update_form').attr('action', route('module.education.store'));
    $('#create_update_form_method').val('POST');
    $('#education_id').val('');
    myQuill.root.innerHTML = '';
    $('#education_details_hidden').val('');
    // FilePond keeps files in sync with the input, so a closed modal must drop
    // them or the next create would resubmit the previous pick.
    ponds.forEach(pond => pond.removeFiles());
    setCurrentLogo('');
    document.getElementById('create_update_modal_title').innerHTML = 'Create education info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const education_id = this.getAttribute('data-education_id');

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
                        route('module.education.delete', education_id);

                }
            });
        });
    });
});