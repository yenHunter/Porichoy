@extends('layout.default', [
	'appTopNav' => true,
	'appClass' => 'app-with-top-nav'
])

@section('title', 'Mixed Nav')

@push('js')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
@endpush

@section('content')
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">LAYOUT</a></li>
		<li class="breadcrumb-item active">MIXED NAV</li>
	</ul>

	<h1 class="page-header">
		Mixed Nav <small>page header description goes here...</small>
	</h1>

	<hr class="mb-4">

	<p>
		Add the following page variable for mixed nav page setting.
	</p>

	<div class="card">
		<div class="hljs-container rounded">
			<pre><code data-url="/assets/data/layout-mixed-nav/code-1.json"></code></pre>
		</div>
	</div>
@endsection
