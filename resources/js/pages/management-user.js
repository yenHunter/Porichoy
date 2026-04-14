import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

import { registerPlugin, create } from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Initialize DataTable
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

// Register FilePond plugins
registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);

// Initialize FilePond for profile picture upload
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

// Handle Edit button click
$(document).on('click', '.btn-edit', function () {
    const user_id = $(this).data('user_id');

    axios.get(route('management.user.edit', user_id))
        .then(response => {
            const data = response.data;

            // Fill form fields with user data
            $('#user_id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#email').val(data.email);
            $('#user_status').val(data.user_status == 1 ? 1 : 0);

            // Update form for update operation
            const form = document.getElementById('create_update_form');
            form.action = route('management.user.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update User';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load user data:", error);
            Swal.fire('Error!', 'Could not fetch user data.', 'error');
        });
});

// Reset form when modal is hidden
$('#create_update_modal').on('hidden.bs.modal', function () {
    // Reset form
    $('#create_update_form')[0].reset();

    // Reset form action and method
    $('#create_update_form').attr('action', route('management.user.store'));
    $('#create_update_form_method').val('POST');

    // Clear hidden fields
    $('#user_id').val('');

    // Reset modal title
    document.getElementById('create_update_modal_title').innerHTML = 'Create User';

    // Reset FilePond
    inputElement.forEach(input => {
        if (input.filepond) {
            input.filepond.removeFile();
        }
    });
});

// Handle Delete button click
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const user_id = this.getAttribute('data-user_id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone! The user will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route('management.user.delete', user_id);
                }
            });
        });
    });
});
