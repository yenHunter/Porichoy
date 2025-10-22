@extends('layout.default', ['appSidebarHide' => true, 'appClass' => 'app-content-full-width'])

@section('title', 'Full Width')

@push('js')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
@endpush

@section('content')
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">LAYOUT</a></li>
		<li class="breadcrumb-item active">FULL WIDTH</li>
	</ul>
	
	<h1 class="page-header">
		Full Width <small>page header description goes here...</small>
	</h1>
	
	<hr class="mb-4">
	
	<p>
		Add the following page variable for full height page setting.
	</p>
	
	<div class="card mb-3">
		<div class="hljs-container rounded">
			<pre><code data-url="/assets/data/layout-full-width/code-1.json"></code></pre>
		</div>
	</div>
	
	<p>
		<a href="javascript:history.back(-1);" class="btn btn-default"><i class="fa fa-chevron-left fa-fw ms-n1"></i> Back to previous Page</a>
	</p>
@endsection
