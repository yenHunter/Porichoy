import axios from 'axios';
import Swal from 'sweetalert2';

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.btn-activate').forEach(button => {
        button.addEventListener('click', function() {
            const theme     = this.getAttribute('data-theme');
            const themeName = this.getAttribute('data-theme-name');
            const colors    = JSON.parse(this.getAttribute('data-colors'));
            const updateUrl = this.getAttribute('data-url');

            let colorHtml = '';
            if (colors.length > 1) {
                colorHtml = `
                    <div class="mb-3 text-center">
                        <label class="form-label fs-xxs text-muted d-block mb-2">Choose Color</label>
                        <div class="d-flex justify-content-center gap-2">
                            ${colors.map(color => `
                                <label class="form-check d-flex align-items-center">
                                    <input class="form-check-input me-2" type="radio" name="color" value="${color}" ${color === 'light' ? 'checked' : ''}>
                                    <i class="ti ti-${color === 'light' ? 'sun' : 'moon'} fs-xs me-1"></i>${color.charAt(0).toUpperCase() + color.slice(1)}
                                </label>
                            `).join('')}
                        </div>
                    </div>`;
            }

            Swal.fire({
                title: 'Activate ' + themeName + '?',
                html: 'This will change the visitor-facing theme for the entire site.' + colorHtml,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, activate it!',
                reverseButtons: true,
                preConfirm: () => {
                    const selectedColor = colors.length > 1
                        ? Swal.getPopup().querySelector('input[name="color"]:checked')?.value
                        : colors[0];
                    return { theme: theme, color: selectedColor };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    axios.post(updateUrl.replace(':theme', result.value.theme), {}, {
                        params: { color: result.value.color },
                        headers: {
                            'X-CSRF-TOKEN': token,
                        },
                    })
                    .then(() => {
                        window.location.reload();
                    })
                    .catch(() => {
                        Swal.fire('Error', 'Failed to activate theme. Please try again.', 'error');
                    });
                }
            });
        });
    });
});
