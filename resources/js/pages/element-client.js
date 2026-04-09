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

$(document).ready(function () {
    // Initialize FilePond
    registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType
    );

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

// Sortable functionality
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

// Edit button click handler
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

            // Update form
            const form = document.getElementById('create_update_form');
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

// Reset form on modal close
$('#create_update_modal').on('hidden.bs.modal', function () {
    $('#create_update_form')[0].reset();
    $('#create_update_form').attr('action', route('element.client.store'));
    $('#create_update_form_method').val('POST');
    $('#client_id').val('');
    document.getElementById('create_update_modal_title').innerHTML = 'Create client info';
});

// Delete button click handler
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
