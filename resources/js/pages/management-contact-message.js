import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

import axios from 'axios';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';

new DataTable('[data-tables="basic"]', {
    order: [],
    language: {
        paginate: {
            first: '<i class="ti ti-chevrons-left"></i>',
            previous: '<i class="ti ti-chevron-left"></i>',
            next: '<i class="ti ti-chevron-right"></i>',
            last: '<i class="ti ti-chevrons-right"></i>',
        },
    },
});

// Delete a message after an explicit confirmation.
$(document).on('click', '.btn-delete', function () {
    const contact_message_id = $(this).data('contact_message_id');

    Swal.fire({
        title: 'Delete this message?',
        text: 'The message will be removed permanently.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#d9534f',
    }).then((result) => {
        if (!result.isConfirmed) {
            return;
        }

        axios.get(route('management.contact_message.delete', contact_message_id))
            .then(() => window.location.reload());
    });
});
