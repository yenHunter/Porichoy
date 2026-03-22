<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="dark" data-menu-color="light">

<head>
    @include('admin.layouts.partials.title-meta')

    @include('admin.layouts.partials.head-css')
</head>

<body>
    <div class="wrapper">

        @include('admin.layouts.partials.topbar')
        
        @include('admin.layouts.partials.horizontal-nav')

        <div class="content-page">

            <div class="container-fluid">

                @yield('content')

            </div>

            @include('admin.layouts.partials.footer')

        </div>

    </div>

    @include('admin.layouts.partials.customizer')

    @include('admin.layouts.partials.footer-scripts')
</body>

</html>
