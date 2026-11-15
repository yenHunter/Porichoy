import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import 'jquery-ui-dist/jquery-ui';
import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

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

$(function () {
    $("#sortable-blog-category").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-blog-category tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            axios.post(route('settings.blog_category.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Blog category order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const blog_category_id = $(this).data('blog_category_id');

    axios.get(route('settings.blog_category.edit', blog_category_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#blog_category_id').val(data.id);
            $('#category_name').val(data.category_name);
            $('#category_description').val(data.category_description);
            $('#category_status').val(data.category_status == 1 ? 1 : 0);

            // Update form
            const form = document.getElementById('create_update_form');
            form.action = route('settings.blog_category.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update blog category';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load blog category data:", error);
            Swal.fire('Error!', 'Could not fetch blog category data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    $('#create_update_form')[0].reset();
    $('#create_update_form').attr('action', route('settings.blog_category.store'));
    $('#create_update_form_method').val('POST');
    $('#blog_category_id').val('');
    document.getElementById('create_update_modal_title').innerHTML = 'Create blog category';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const blog_category_id = this.getAttribute('data-blog_category_id');
            const post_count = parseInt(this.getAttribute('data-post_count'), 10) || 0;

            Swal.fire({
                title: 'Are you sure?',
                text: post_count > 0 ?
                    `This category is used by ${post_count} post(s). Reassign them before deleting it.` :
                    "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route('settings.blog_category.delete', blog_category_id);
                }
            });
        });
    });
});
