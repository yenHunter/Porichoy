import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import 'jquery-ui-dist/jquery-ui';
import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

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

    if (document.getElementById('research-details-editor')) {
        myQuill = new Quill('#research-details-editor', {
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
            document.getElementById('research_details_hidden').value = myQuill.root.innerHTML;
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

const form = document.getElementById('create_update_form');
const submitButton = form.querySelector('button[type="submit"]');
const statusInput = document.getElementById('research_status');

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
            console.error('Research save failed:', error);
            Swal.fire('Error!', 'The research info could not be saved.', 'error');
        }
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = submitLabel;
    }
});

$(function () {
    $("#sortable-research").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-research tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            // Get CSRF token from meta tag (set in blade layout)
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send via Axios
            axios.post(route('module.research.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Research order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const research_id = $(this).data('research_id');

    axios.get(route('module.research.edit', research_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#research_id').val(data.id);
            $('#research_source').val(data.research_source);
            $('#research_category').val(data.research_category);
            $('#research_title').val(data.research_title);
            // The edit response already carries a 'Y-m-d' string. Parsing the raw
            // date attribute would shift the day for a client west of the app
            // timezone (the UTC serialisation is the previous day there).
            $('#published_date').val(data.published_date_input || '');
            $('#research_role').val(data.research_role);
            $('#research_authors').val(data.research_authors);
            $('#research_link').val(data.research_link);
            $('#research_status').val(data.research_status == 1 ? 1 : 0);

            clearFormErrors();

            const htmlContent = data.research_details || '';
            if (myQuill) {
                myQuill.root.innerHTML = htmlContent;
            }
            $('#research_details_hidden').val(htmlContent);

            // Update form
            form.action = route('module.research.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update research info';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load research data:", error);
            Swal.fire('Error!', 'Could not fetch research data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    form.reset();
    $(form).attr('action', route('module.research.store'));
    $('#create_update_form_method').val('POST');
    $('#research_id').val('');
    if (myQuill) {
        myQuill.root.innerHTML = '';
    }
    $('#research_details_hidden').val('');
    clearFormErrors();
    statusInput.value = '1';
    document.getElementById('create_update_modal_title').innerHTML = 'Create research info';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const research_id = this.getAttribute('data-research_id');

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
                        route('module.research.delete', research_id);

                }
            });
        });
    });
});
