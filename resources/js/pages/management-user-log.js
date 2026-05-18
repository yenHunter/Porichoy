import DataTable from "datatables.net";
import 'datatables.net-bs5'
import 'datatables.net-responsive'
import 'datatables.net-responsive-bs5'

new DataTable('[data-tables="basic"]', {
    ordering: false,
    language: {
        paginate: {
            first: '<i class="ti ti-chevrons-left"></i>', 
            previous: '<i class="ti ti-chevron-left"></i>', 
            next: '<i class="ti ti-chevron-right"></i>', 
            last: '<i class="ti ti-chevrons-right"></i>', 
        },
    },
});