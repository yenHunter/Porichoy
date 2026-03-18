/**
 * Template Name: UBold - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Form Quilljs
 */
import Quill from 'quill'

if (typeof Quill != 'undefined') {

    // Import Quill's built-in icons
    const icons = Quill.import('ui/icons');

    // Replace Quill's built-in toolbar icons with Tabler icons
    icons['bold'] = '<i class="ti ti-bold fs-lg"></i>'
    icons['italic'] = '<i class="ti ti-italic fs-lg"></i>'
    icons['underline'] = '<i class="ti ti-underline fs-lg"></i>'
    icons['strike'] = '<i class="ti ti-strikethrough fs-lg"></i>'
    icons['list'] = '<i class="ti ti-list fs-lg"></i>'
    icons['bullet'] = '<i class="ti ti-list-ul fs-lg"></i>'
    icons['indent'] = '<i class="ti ti-indent-increase fs-lg"></i>'
    icons['outdent'] = '<i class="ti ti-indent-decrease fs-lg"></i>'
    icons['link'] = '<i class="ti ti-link fs-lg"></i>'
    icons['image'] = '<i class="ti ti-photo fs-lg"></i>'
    icons['video'] = '<i class="ti ti-video fs-lg"></i>'
    icons['code-block'] = '<i class="ti ti-code fs-lg"></i>'
    icons['clean'] = '<i class="ti ti-trash fs-lg"></i>'
    icons['color'] = '<i class="ti ti-paint fs-lg"></i>'
    icons['background'] = '<i class="ti ti-background fs-lg"></i>'
    icons['script']['super'] = '<i class="ti ti-superscript fs-lg"></i>'
    icons['script']['sub'] = '<i class="ti ti-subscript fs-lg"></i>'
    icons['blockquote'] = '<i class="ti ti-blockquote fs-lg"></i>'
    icons['align'][''] = '<i class="ti ti-align-left fs-lg"></i>'
    icons['align']['center'] = '<i class="ti ti-align-center fs-lg"></i>'
    icons['align']['right'] = '<i class="ti ti-align-right fs-lg"></i>'
    icons['align']['justify'] = '<i class="ti ti-align-justified fs-lg"></i>'
    icons['header']['1'] = '<i class="ti ti-h-1 fs-lg"></i>'
    icons['header']['2'] = '<i class="ti ti-h-2 fs-lg"></i>'
    icons['header']['3'] = '<i class="ti ti-h-3 fs-lg"></i>'
    icons['header'][''] = '<i class="ti ti-letter-t fs-lg"></i>'


    // Quill editor
    const snowEditor = document.getElementById('snow-editor')
    if (snowEditor) {
        new Quill(snowEditor, {
            theme: 'snow',
            modules: {
                'toolbar': [
                    [{'font': []}],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'color': []}, {'background': []}],
                    [{'script': 'super'}, {'script': 'sub'}],
                    [{'header': [false, 1, 2, 3, 4, 5, 6]}],
                    ['blockquote', 'code-block'],
                    [{'list': 'ordered'}, {'list': 'bullet'}, {'indent': '-1'}, {'indent': '+1'}],
                    [{'align': []}],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
    }

    // Bubble theme
    const bubbleEditor = document.getElementById('bubble-editor')
    if (bubbleEditor) {
        new Quill('#bubble-editor', {
            theme: 'bubble'
        });
    }
}
