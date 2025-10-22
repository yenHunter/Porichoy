@extends('layout.default', [
	'appTopNav' => true,
	'appSidebarHide' => true,
	'appClass' => 'app-with-top-nav app-without-sidebar'
])

@section('title', 'Top Nav')

@push('js')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
@endpush

@section('content')
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">LAYOUT</a></li>
		<li class="breadcrumb-item active">TOP NAV</li>
	</ul>

	<h1 class="page-header">
		Top Nav <small>page header description goes here...</small>
	</h1>

	<hr class="mb-4">

	<p>
		Add the following page variable for top nav page setting.
	</p>

	<div class="card mb-3">
		<div class="hljs-container rounded">
			<pre><code data-url="/assets/data/layout-top-nav/code-1.json"></code></pre>
		</div>
	</div>
@endsection
