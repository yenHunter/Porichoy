@extends('layout.default')

@section('title', 'Map')

@push('css')
  <link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet">
@endpush

@push('js')
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-content/world-mill.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script src="/assets/js/demo/map.demo.js""></script>
	<script src="/assets/js/demo/sidebar-scrollspy.demo.js""></script>
@endpush

@section('content')
  <!-- BEGIN container -->
	<div class="container">
		<!-- BEGIN row -->
		<div class="row justify-content-center">
			<!-- BEGIN col-10 -->
			<div class="col-xl-10">
				<!-- BEGIN row -->
				<div class="row">
					<!-- BEGIN col-9 -->
					<div class="col-xl-9">
						<h1 class="page-header">
							Map <small>page header description goes here...</small>
						</h1>
						
						<hr class="mb-4">
						
						<!-- BEGIN #jVectorMap -->
						<div id="jVectorMap" class="mb-5">
							<h4>jVectorMap</h4>
							<p>jVectorMap uses only native browser technologies like JavaScript, CSS, HTML, SVG or VML. No Flash or any other proprietary browser plug-in is required. This allows jVectorMap to work in all modern mobile browsers. Please read the <a href="https://jvectormap.com/" target="_blank">official documentation</a> for the full list of options.</p>
							<div class="card overflow-hidden">
								<div id="jvectorMap" style="height: 300px;"></div>
								<div class="hljs-container rounded-bottom">
									<pre><code class="xml" data-url="assets/data/map/code-1.json"></code></pre>
								</div>
							</div>
						</div>
						<!-- END #jVectorMap -->
						
						<!-- BEGIN #googleMap -->
						<div id="googleMap" class="mb-5">
							<h4>Google map</h4>
							<p>Google Maps is a web mapping service developed by Google. It offers satellite imagery, aerial photography, street maps, 360° interactive panoramic views of streets, real-time traffic conditions, and route planning for traveling by foot, car, bicycle and air, or public transportation. Please read the <a href="https://developers.google.com/maps/documentation/javascript/tutorial" target="_blank">official documentation</a> for the full list of options.</p>
							<div class="card overflow-hidden">
								<div id="googleMapDefault" style="height: 300px;"></div>
								<div class="hljs-container rounded-bottom">
									<pre><code class="xml" data-url="assets/data/map/code-2.json"></code></pre>
								</div>
							</div>
						</div>
						<!-- END #googleMap -->
					</div>
					<!-- END col-9-->
					<!-- BEGIN col-3 -->
					<div class="col-xl-3">
						<!-- BEGIN #sidebar-bootstrap -->
						<nav id="sidebar-bootstrap" class="navbar navbar-sticky d-none d-xl-block">
							<nav class="nav">
								<a class="nav-link" href="#jVectorMap" data-toggle="scroll-to">jVectorMap</a>
								<a class="nav-link" href="#googleMap" data-toggle="scroll-to">Google map</a>
							</nav>
						</nav>
						<!-- END #sidebar-bootstrap -->
					</div>
					<!-- END col-3 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END col-10 -->
		</div>
		<!-- END row -->
	</div>
	<!-- END container -->
@endsection
