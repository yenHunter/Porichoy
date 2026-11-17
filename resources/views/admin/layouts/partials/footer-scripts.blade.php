<!-- App js -->
@vite(['resources/js/app.js'])
{{-- Topbar account modals are part of the layout, so they load on every admin page. --}}
@vite(['resources/js/pages/account-modals.js'])

@yield('scripts')