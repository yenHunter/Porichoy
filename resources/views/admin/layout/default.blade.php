<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"{{ (!empty($htmlAttribute)) ? $htmlAttribute : '' }}>
<head>
	@include('admin.partial.head')
	<link rel="shortcut icon" href="{{ asset('static/logo/favicon.png') }}" type="image/x-icon">
</head>
<body class="{{ (!empty($bodyClass)) ? $bodyClass : '' }}">
	<!-- BEGIN #app -->
	<div id="app" class="app {{ (!empty($appClass)) ? $appClass : '' }}">
	  @includeWhen(empty($appHeaderHide), 'admin.partial.header')
		@includeWhen(empty($appSidebarHide), 'admin.partial.sidebar')
		@includeWhen(!empty($appTopNav), 'admin.partial.top-nav')

		@if (empty($appContentHide))
			<!-- BEGIN #content -->
			<div id="content" class="app-content  {{ (!empty($appContentClass)) ? $appContentClass : '' }}">
				@yield('content')
			</div>
			<!-- END #content -->
		@else
    	@yield('content')
		@endif

		@includeWhen(!empty($appFooter), 'admin.partial.footer')
	</div>
	<!-- END #app -->

	@yield('outter_content')
	@include('admin.partial.scroll-top-btn')
	{{-- @include('admin.partial.theme-panel') --}}
	@include('admin.partial.scripts')
</body>
</html>
