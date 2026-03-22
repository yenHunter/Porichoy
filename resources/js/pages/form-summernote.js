/**
 * Template Name: UBold - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Form Summernote
 */
import 'summernote/dist/summernote-bs5'

if (typeof jQuery.fn.summernote !== "undefined") {
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['misc', ['undo', 'redo']]
            ],
            icons: {
                'magic': 'ti ti-wand fs-xl',
                'bold': 'ti ti-bold fs-xl',
                'underline': 'ti ti-underline fs-xl',
                'eraser': 'ti ti-eraser fs-xl',
                'italic': 'ti ti-italic fs-xl',
                'strikethrough': 'ti ti-strikethrough fs-xl',
                'fontname': 'ti ti-font fs-xl',
                'fontsize': 'ti ti-text-size fs-xl',
                'color': 'ti ti-color-swatch fs-xl',
                'font': 'ti ti-typography fs-xl',
                'menuCheck': 'ti ti-check fs-xl',
                'unorderedlist': 'ti ti-list fs-xl',
                'orderedlist': 'ti ti-list-numbers fs-xl',
                'align': 'ti ti-align-left fs-xl',
                'alignLeft': 'ti ti-align-left fs-xl',
                'alignCenter': 'ti ti-align-center fs-xl',
                'alignRight': 'ti ti-align-right fs-xl',
                'alignJustify': 'ti ti-align-justified fs-xl',
                'alignIndent': 'ti ti-indent-increase fs-xl',
                'alignOutdent': 'ti ti-indent-decrease fs-xl',
                'table': 'ti ti-table fs-xl',
                'link': 'ti ti-link fs-xl',
                'picture': 'ti ti-photo fs-xl',
                'video': 'ti ti-video fs-xl',
                'arrowsAlt': 'ti ti-arrows-maximize fs-xl',
                'code': 'ti ti-code fs-xl',
                'question': 'ti ti-help-circle fs-xl',
                'outdent': 'ti ti-indent-decrease fs-xl',
                'indent': 'ti ti-indent-increase fs-xl',
                'undo': 'ti ti-arrow-back-up fs-xl',
                'redo': 'ti ti-arrow-forward-up fs-xl',
                'subscript': 'ti ti-subscript fs-xl',
                'superscript': 'ti ti-superscript fs-xl',
            },
            callbacks: {
                onInit: function () {
                    // Change Summernote buttons to Bootstrap outline style
                    $('.note-editor .note-btn').each(function () {
                        // Remove solid style like `btn-light`, `btn-primary`, etc.
                        this.classList.add('btn-light');

                        // Add your outline style
                        this.classList.remove('btn-outline-secondary');
                    });
                }
            }

        });
    });
}

