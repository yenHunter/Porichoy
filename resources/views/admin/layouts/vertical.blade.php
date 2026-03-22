<!DOCTYPE html>
<html lang="en" @yield('html_attribute')>

<head>
    @include('admin.layouts.partials.title-meta')

    @include('admin.layouts.partials.head-css')
</head>

<body>
    <div class="wrapper">

        @include('admin.layouts.partials.sidenav')

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
