<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE JS ================== -->
@yield('page_script')
<!-- ================== END PAGE JS ================== -->
@stack('js')
