import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import 'jquery-ui-dist/jquery-ui';
import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

import Quill from 'quill';

let myQuill;

function createSlider(el, options, height) {
    if (el && typeof noUiSlider !== 'undefined') {
        if (height) el.style.height = height;
        return noUiSlider.create(el, options);
    }
    return null;
}

const mySlider = createSlider(document.getElementById('slider-review'), {
    start: 5,
    step: 1,
    behaviour: 'tap',
    tooltips: true,
    range: { min: 1, max: 5 }
});

if (mySlider) {
    mySlider.on('update', function (values, handle) {
        const rating = parseInt(values[handle]);
        document.getElementById('review').value = rating;
        updateReviewDisplay(rating);
    });
}

function updateReviewDisplay(rating) {
    const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating);
    document.getElementById('review-display').textContent = stars;
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
        icons['blockquote'] = '<i class="ti ti-blockquote fs-lg"></i>';
        icons['align'][''] = '<i class="ti ti-align-left fs-lg"></i>';
        icons['align']['center'] = '<i class="ti ti-align-center fs-lg"></i>';
        icons['align']['right'] = '<i class="ti ti-align-right fs-lg"></i>';
        icons['align']['justify'] = '<i class="ti ti-align-justified fs-lg"></i>';
    } catch (e) {
        console.warn('Quill Icon customization failed:', e);
    }

    if (document.getElementById('testimonial-details-editor')) {
        myQuill = new Quill('#testimonial-details-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        myQuill.on('text-change', function () {
            document.getElementById('details_hidden').value = myQuill.root.innerHTML;
        });
    }
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

$(function () {
    $("#sortable-testimonial").sortable({
        handle: '.ti-arrows-move',
        update: function (event, ui) {
            const order = [];
            $('#sortable-testimonial tr').each(function (index, element) {
                order.push({
                    id: $(element).data('id'),
                    sequence: index + 1
                });
            });

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            axios.post(route('element.testimonial.sequence'), {
                order: order
            }, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    Swal.fire('Updated!', 'Testimonial order updated successfully.', 'success');
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error!', 'Could not update order.', 'error');
                });
        }
    });
});

$(document).on('click', '.btn-edit', function () {
    const testimonial_id = $(this).data('testimonial_id');

    axios.get(route('element.testimonial.edit', testimonial_id))
        .then(response => {
            const data = response.data;

            // Fill form fields
            $('#testimonial_id').val(data.id);
            $('#client_id').val(data.client_id);
            $('#title').val(data.title);
            $('#details_hidden').val(data.details);
            $('#status').prop('checked', data.status == 1);

            // Update the Slider position
            if (mySlider && data.review !== undefined) {
                mySlider.set(data.review);
                updateReviewDisplay(data.review);
            }
            $('#review').val(data.review);

            const htmlContent = data.details || '';
            myQuill.root.innerHTML = htmlContent;
            $('#details_hidden').val(htmlContent);

            // Update form
            const form = document.getElementById('create_update_form');
            form.action = route('element.testimonial.update');
            document.getElementById('create_update_form_method').value = 'PUT';
            document.getElementById('create_update_modal_title').innerHTML = 'Update testimonial';

            // Show modal
            const modalElement = document.getElementById('create_update_modal');
            const modal = new window.bootstrap.Modal(modalElement);
            modal.show();
        })
        .catch(error => {
            console.error("Failed to load testimonial data:", error);
            Swal.fire('Error!', 'Could not fetch testimonial data.', 'error');
        });
});

$('#create_update_modal').on('hidden.bs.modal', function () {
    $('#create_update_form')[0].reset();
    $('#create_update_form').attr('action', route('element.testimonial.store'));
    $('#create_update_form_method').val('POST');
    $('#testimonial_id').val('');
    myQuill.root.innerHTML = '';
    $('#details_hidden').val('');
    $('#status').prop('checked', true);
    if (mySlider) {
        mySlider.set(5);
        updateReviewDisplay(5);
    }
    document.getElementById('create_update_modal_title').innerHTML = 'Create testimonial';
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const testimonial_id = this.getAttribute('data-testimonial_id');

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
                    window.location.href = route('element.testimonial.delete', testimonial_id);
                }
            });
        });
    });
});
