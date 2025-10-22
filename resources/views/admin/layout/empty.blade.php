<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"{{ (!empty($htmlAttribute)) ? $htmlAttribute : '' }}>
<head>
	@include('admin.partial.head')
	<link rel="shortcut icon" href="{{ asset('storage/logo/favicon.png') }}" type="image/x-icon">
</head>
<body class="{{ (!empty($bodyClass)) ? $bodyClass : '' }}">
	@yield('content')

	@include('admin.partial.scroll-top-btn')
	{{-- @include('admin.partial.theme-panel') --}}
	@include('admin.partial.scripts')
</body>
</html>
