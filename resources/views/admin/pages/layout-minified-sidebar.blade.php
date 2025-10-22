@extends('layout.default', ['appClass' => 'app-sidebar-minified'])

@section('title', 'Minified Sidebar')

@push('js')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
@endpush

@section('content')
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">LAYOUT</a></li>
		<li class="breadcrumb-item active">MINIFIED SIDEBAR</li>
	</ul>
	
	<h1 class="page-header">
		Minified Sidebar <small>page header description goes here...</small>
	</h1>
	
	<hr class="mb-4">
	
	<p>
		Add the following page variable sidebar page setting.
	</p>
	
	<div class="card mb-3">
		<div class="hljs-container rounded">
			<pre><code data-url="/assets/data/layout-minified-sidebar/code-1.json"></code></pre>
		</div>
	</div>
@endsection
