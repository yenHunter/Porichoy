const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// app.min.css
mix.sass('resources/scss/styles.scss', 'public/admin/assets/css/app.min.css');

// vendor.min.css
mix.combine([
	'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
	'node_modules/bootstrap-icons/font/bootstrap-icons.css',
	'node_modules/jquery-ui-dist/jquery-ui.min.css',
	'node_modules/animate.css/animate.min.css',
	'node_modules/pace-js/themes/black/pace-theme-flash.css',
	'node_modules/perfect-scrollbar/css/perfect-scrollbar.css'
], 'public/admin/assets/css/vendor.min.css');
mix.copy('resources/scss/images/', 'public/admin/assets/css/images/');


// app.min.js
mix.combine(['resources/js/app.js'], 'public/admin/assets/js/app.min.js');

// vendor.min.js
mix.combine([
	'node_modules/pace-js/pace.min.js',
	'node_modules/jquery/dist/jquery.min.js',
	'node_modules/jquery-ui-dist/jquery-ui.min.js',
	'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
	'node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js',
	'node_modules/js-cookie/dist/js.cookie.js'
], 'public/admin/assets/js/vendor.min.js');


// plugins
mix.copy('node_modules/bootstrap/', 'public/admin/assets/plugins/bootstrap/');
mix.copy('node_modules/perfect-scrollbar/', 'public/admin/assets/plugins/perfect-scrollbar/');
mix.copy('node_modules/js-cookie/', 'public/admin/assets/plugins/js-cookie/');
mix.copy('node_modules/@fortawesome/', 'public/admin/assets/plugins/@fortawesome/');
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts/', 'public/admin/assets/webfonts/');
mix.copy('node_modules/@highlightjs/cdn-assets/', 'public/admin/assets/plugins/@highlightjs/cdn-assets/');
mix.copy('node_modules/jquery/', 'public/admin/assets/plugins/jquery/');
mix.copy('node_modules/jquery-ui-dist/', 'public/admin/assets/plugins/jquery-ui-dist/');
mix.copy('node_modules/animate.css/', 'public/admin/assets/plugins/animate.css/');
mix.copy('node_modules/pace-js/', 'public/admin/assets/plugins/pace-js/');
mix.copy('node_modules/@fullcalendar/', 'public/admin/assets/plugins/@fullcalendar/');
mix.copy('node_modules/apexcharts/', 'public/admin/assets/plugins/apexcharts/');
mix.copy('node_modules/blueimp-file-upload/', 'public/admin/assets/plugins/blueimp-file-upload/');
mix.copy('node_modules/blueimp-tmpl/', 'public/admin/assets/plugins/blueimp-tmpl/');
mix.copy('node_modules/blueimp-gallery/', 'public/admin/assets/plugins/blueimp-gallery/');
mix.copy('node_modules/blueimp-canvas-to-blob/', 'public/admin/assets/plugins/blueimp-canvas-to-blob/');
mix.copy('node_modules/blueimp-load-image/', 'public/admin/assets/plugins/blueimp-load-image/');
mix.copy('node_modules/bootstrap-datepicker/', 'public/admin/assets/plugins/bootstrap-datepicker/');
mix.copy('node_modules/bootstrap-daterangepicker/', 'public/admin/assets/plugins/bootstrap-daterangepicker/');
mix.copy('node_modules/bootstrap-slider/', 'public/admin/assets/plugins/bootstrap-slider/');
mix.copy('node_modules/bootstrap-timepicker/', 'public/admin/assets/plugins/bootstrap-timepicker/');
mix.copy('node_modules/bootstrap-table/', 'public/admin/assets/plugins/bootstrap-table/');
mix.copy('node_modules/bootstrap-icons/', 'public/admin/assets/plugins/bootstrap-icons/');
mix.copy('node_modules/bootstrap-icons/font/fonts/', 'public/admin/assets/css/fonts/');
mix.copy('node_modules/chart.js/', 'public/admin/assets/plugins/chart.js/');
mix.copy('node_modules/datatables.net/', 'public/admin/assets/plugins/datatables.net/');
mix.copy('node_modules/datatables.net-bs5/', 'public/admin/assets/plugins/datatables.net-bs5/');
mix.copy('node_modules/datatables.net-autofill/', 'public/admin/assets/plugins/datatables.net-autofill/');
mix.copy('node_modules/datatables.net-autofill-bs5/', 'public/admin/assets/plugins/datatables.net-autofill-bs5/');
mix.copy('node_modules/datatables.net-buttons/', 'public/admin/assets/plugins/datatables.net-buttons/');
mix.copy('node_modules/datatables.net-buttons-bs5/', 'public/admin/assets/plugins/datatables.net-buttons-bs5/');
mix.copy('node_modules/datatables.net-colreorder/', 'public/admin/assets/plugins/datatables.net-colreorder/');
mix.copy('node_modules/datatables.net-colreorder-bs5/', 'public/admin/assets/plugins/datatables.net-colreorder-bs5/');
mix.copy('node_modules/datatables.net-fixedcolumns/', 'public/admin/assets/plugins/datatables.net-fixedcolumns/');
mix.copy('node_modules/datatables.net-fixedcolumns-bs5/', 'public/admin/assets/plugins/datatables.net-fixedcolumns-bs5/');
mix.copy('node_modules/datatables.net-fixedheader/', 'public/admin/assets/plugins/datatables.net-fixedheader/');
mix.copy('node_modules/datatables.net-fixedheader-bs5/', 'public/admin/assets/plugins/datatables.net-fixedheader-bs5/');
mix.copy('node_modules/datatables.net-keytable/', 'public/admin/assets/plugins/datatables.net-keytable/');
mix.copy('node_modules/datatables.net-keytable-bs5/', 'public/admin/assets/plugins/datatables.net-keytable-bs5/');
mix.copy('node_modules/datatables.net-responsive/', 'public/admin/assets/plugins/datatables.net-responsive/');
mix.copy('node_modules/datatables.net-responsive-bs5/', 'public/admin/assets/plugins/datatables.net-responsive-bs5/');
mix.copy('node_modules/datatables.net-rowgroup/', 'public/admin/assets/plugins/datatables.net-rowgroup/');
mix.copy('node_modules/datatables.net-rowgroup-bs5/', 'public/admin/assets/plugins/datatables.net-rowgroup-bs5/');
mix.copy('node_modules/datatables.net-rowreorder-bs5/', 'public/admin/assets/plugins/datatables.net-rowreorder-bs5/');
mix.copy('node_modules/datatables.net-scroller/', 'public/admin/assets/plugins/datatables.net-scroller/');
mix.copy('node_modules/datatables.net-scroller-bs5/', 'public/admin/assets/plugins/datatables.net-scroller-bs5/');
mix.copy('node_modules/datatables.net-select/', 'public/admin/assets/plugins/datatables.net-select/');
mix.copy('node_modules/datatables.net-select-bs5/', 'public/admin/assets/plugins/datatables.net-select-bs5/');
mix.copy('node_modules/jvectormap-next/', 'public/admin/assets/plugins/jvectormap-next/');
mix.copy('node_modules/jvectormap-content/', 'public/admin/assets/plugins/jvectormap-content/');
mix.copy('node_modules/jquery-migrate/', 'public/admin/assets/plugins/jquery-migrate/');
mix.copy('node_modules/jquery.maskedinput/', 'public/admin/assets/plugins/jquery.maskedinput/');
mix.copy('node_modules/jquery-typeahead/', 'public/admin/assets/plugins/jquery-typeahead/');
mix.copy('node_modules/kbw-countdown/', 'public/admin/assets/plugins/kbw-countdown/');
mix.copy('node_modules/lity/', 'public/admin/assets/plugins/lity/');
mix.copy('node_modules/masonry-layout/', 'public/admin/assets/plugins/masonry-layout/');
mix.copy('node_modules/moment/', 'public/admin/assets/plugins/moment/');
mix.copy('node_modules/photoswipe/', 'public/admin/assets/plugins/photoswipe/');
mix.copy('node_modules/select-picker/', 'public/admin/assets/plugins/select-picker/');
mix.copy('node_modules/spectrum-colorpicker2/', 'public/admin/assets/plugins/spectrum-colorpicker2/');
mix.copy('node_modules/summernote/', 'public/admin/assets/plugins/summernote/');
mix.copy('node_modules/tag-it/', 'public/admin/assets/plugins/tag-it/');
mix.copy('node_modules/svgmap/', 'public/admin/assets/plugins/svgmap/');
mix.copy('node_modules/svg-pan-zoom/', 'public/admin/assets/plugins/svg-pan-zoom/');
mix.copy('node_modules/pdfmake/', 'public/admin/assets/plugins/pdfmake/');
mix.copy('node_modules/jszip/', 'public/admin/assets/plugins/jszip/');
