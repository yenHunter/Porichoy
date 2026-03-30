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

// Register plugin
registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);

// Initialize
const inputElement = document.querySelectorAll('.filepond');

inputElement.forEach(input => {
    create(input, {
        allowImagePreview: true,
        imagePreviewHeight: 150,
        allowMultiple: false,
        acceptedFileTypes: ['image/*'],
        instantUpload: false,
        storeAsFile: true,
    });
});

document.getElementById('current_position').addEventListener('change', function () {
    let endDate = document.getElementById('end_date');
    if (this.checked) {
        endDate.disabled = true;
    } else {
        endDate.disabled = false;
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
            console.log('New order:', order);

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
            $('#start_date').val(data.start_date ? data.start_date.substring(0, 10) : '');
            $('#end_date').val(data.end_date ? data.end_date.substring(0, 10) : '');
            $('#location_type').val(data.location_type);
            $('#employment_status').val(data.employment_status == 1 ? 1 : 0);

            const htmlContent = data.employment_details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#employment_details_hidden').val(htmlContent);

            if (data.end_date == null) {
                document.getElementById('current_position').checked = true;
                document.getElementById('end_date').disabled = true;
            }

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