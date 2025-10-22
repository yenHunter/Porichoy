@extends('admin.layout.default', [
])

@section('title', 'AI Image Generator')

@push('js')
	<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
	<script src="/assets/plugins/masonry-layout/dist/masonry.pkgd.min.js"></script>
	<script src="/assets/js/demo/ai-image-generator.demo.js"></script>
@endpush

@section('content')
	<!-- BEGIN ai-generator -->
	<div class="card border-0 rounded-4 overflow-hidden position-relative bg-component mb-4 mt-2" data-bs-theme="dark">
		<!-- BEGIN ai-cover-bg -->
		<img class="object-fit-cover position-absolute top-0 end-0 h-100 w-100 opacity-50" src="/assets/img/ai/cover.jpg" alt="" />
		<!-- END ai-cover-bg -->
		
		<!-- BEGIN ai-content -->
		<div class="position-relative p-3 p-md-4 bg-gradient-135 bg-gradient-from-black bg-gradient-to-transparent">
			<!-- BEGIN ai-badge -->
			<span class="border border-2 border-white border-opacity-25 position-absolute top-0 start-0 m-3 rounded-5 px-3 py-1 fw-semibold small d-flex align-items-center">
				<div class="d-inline-flex align-items-center">
					<i class="fa fa-circle fa-fw fs-4px text-body text-opacity-75 me-3px ms-n1"></i> 
					<i class="fa fa-circle fa-fw fs-4px text-body text-opacity-50 me-3px"></i>
					<i class="fa fa-circle fa-fw fs-4px text-body text-opacity-25 me-2"></i>
				</div>
				AI-Generator
			</span>
			<!-- END ai-badge -->
			
			<!-- BEGIN ai-title -->
			<div class="text-center text-body fs-1 fw-semibold mt-5 pt-3">
				Describe your ideas and generate
			</div>
			<!-- END ai-title -->
			
			<!-- BEGIN ai-desc -->
			<div class="text-center text-body text-opacity-75 mb-4 fs-5">Transform your words into visual masterpieces: Leverage AI technology to craft breathtaking images.</div>
			<!-- END ai-desc -->
			
			<!-- BEGIN ai-form -->
			<div class="position-relative mx-auto h-100 w-100 mb-2" style="max-width: 520px;">
				<form action="" method="POST" data-form-submit="generate-image">
					<input type="text" class="form-control form-control-lg bg-black bg-opacity-15 bg-blur-3 border-2 border-white border-opacity-25 shadow-none rounded-4 h-60px" id="userInput" placeholder="Write a prompt to generate" />
					<div class="position-absolute end-0 top-0 bottom-0 d-flex p-10px">
						<button id="sendButton" class="d-flex align-items-center btn btn-lg btn-theme h-auto fs-6">
							Generate <i class="fa fa-arrow-right ms-2 text-inverse mt-1px"></i>
						</button>
					</div>
				</form>
			</div>
			<!-- END ai-form -->
			
			<!-- BEGIN ai-option -->
			<div class="position-relative h-100 w-100 mb-5 pb-3 mx-auto d-flex" style="max-width: 520px;">
				<div class="dropdown me-2">
					<label class="btn bg-white bg-opacity-25 bg-blur-2 rounded-3 border-0 d-flex align-items-center">
						<input type="file" class="d-none" accept="image/*" onchange="previewImage(event)" />
						<i id="previewIcon" class="fa fa-fw fa-plus me-4px"></i> Upload Image
						<img id="previewImage" src="" alt="" class="w-20px h-20px rounded-3 me-n1 ms-2 d-none my-n1" />
					</label>
				</div>
				<div class="dropdown me-2 ms-auto">
					<button type="button" data-bs-toggle="dropdown" class="btn bg-white bg-opacity-25 bg-blur-2 rounded-3 border-0"><i class="fa fa-fw fa-globe me-2px"></i> <span id="aiRatioText">Ratio</span> <i class="fa fa-chevron-down fa-fw opacity-50 ms-1"></i></button>
					<div class="dropdown-menu dropdown-menu-end rounded-3">
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="Ratio">None</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="1:1 (Square)">1:1 (Square)</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="16:9 (Widescreen)">16:9 (Widescreen)</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="4:3 (Standard)">4:3 (Standard)</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="3:2 (Classic)">3:2 (Classic)</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="21:9 (Ultra Wide)">21:9 (Ultra Wide)</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiRatioText" data-value="9:16 (Portrait)">9:16 (Portrait)</a>
					</div>
				</div>
				<div class="dropdown">
					<button type="button" data-bs-toggle="dropdown" class="btn bg-white bg-opacity-25 bg-blur-2 rounded-3 border-0"><i class="fa fa-fw fa-palette me-2px"></i> <span id="aiStyleText">Style</span> <i class="fa fa-chevron-down fa-fw opacity-50 ms-1"></i></button>
					<div class="dropdown-menu dropdown-menu-end rounded-3">
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Style">None</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Realistic">Realistic</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Anime">Anime</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Cyberpunk">Cyberpunk</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Pixel Art">Pixel Art</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Cartoon">Cartoon</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Sketch">Sketch</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Fantasy">Fantasy</a>
						<a class="dropdown-item" href="#" data-select="ai-dropdown-selection" data-target="#aiStyleText" data-value="Neon">Neon</a>
					</div>
				</div>
			</div>
			<!-- END ai-option -->
			
			<!-- BEGIN ai-gen-tools -->
			<h5 class="mb-3">Image generation tools</h5>
			<div class="row g-3 g-lg-4">
				<div class="col-sm-6 col-xl-3">
					<div class="card border-0 rounded-4 overflow-hidden" data-bs-theme="dark">
						<img class="card-img object-fit-cover" height="180" src="/assets/img/ai/tools-1.jpg" alt="" />
						<div class="card-img-overlay h-100 d-flex align-items-end bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div>
								<iconify-icon icon="solar:volleyball-2-bold-duotone" class="fs-30px"></iconify-icon>
								<div class="fw-bold">Text to Image</div>
								<div class="text-body text-opacity-75 small">Turn your words into stunning visuals with AI-generated artwork.</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card border-0 rounded-4 overflow-hidden" data-bs-theme="dark">
						<img class="card-img object-fit-cover" height="180" src="/assets/img/ai/tools-2.jpg" alt="" />
						<div class="card-img-overlay h-100 d-flex align-items-end bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div>
								<iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-30px"></iconify-icon>
								<div class="fw-bold">Text to PNG</div>
								<div class="text-body text-opacity-75 small">Create high-quality PNG images from text with transparency support.</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card border-0 rounded-4 overflow-hidden" data-bs-theme="dark">
						<img class="card-img object-fit-cover" height="180" src="/assets/img/ai/tools-3.jpg" alt="" />
						<div class="card-img-overlay h-100 d-flex align-items-end bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div>
								<iconify-icon icon="solar:gallery-edit-bold-duotone" class="fs-30px"></iconify-icon>
								<div class="fw-bold">Image Editor</div>
								<div class="text-body text-opacity-75 small">Enhance, modify, and perfect your images with powerful editing tools.</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card border-0 rounded-4 overflow-hidden" data-bs-theme="dark">
						<img class="card-img object-fit-cover" height="180" src="/assets/img/ai/tools-4.jpg" alt="" />
						<div class="card-img-overlay h-100 d-flex align-items-end bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div>
								<iconify-icon icon="solar:refresh-bold-duotone" class="fs-30px"></iconify-icon>
								<div class="fw-bold">Reimagine</div>
								<div class="text-body text-opacity-75 small">Transform and regenerate images with fresh, AI-powered creativity.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END ai-gen-tools -->
		</div>
		<!-- END ai-content -->
	</div>
	<!-- END ai-generator -->
	
	<!-- BEGIN ai-generated-result -->
	<div id="aiGeneratedContainer" class="mb-4 pt-2 d-none">
		<div id="aiGeneratingResult" class="fade d-none">
			<h4 class="mb-2">Generating</h4>
			<div class="mb-3 d-flex align-items-center">
				<iconify-icon icon="solar:info-circle-bold-duotone" class="fs-4"></iconify-icon>
				<div class="ps-1">
					This is a simulated AI-generated response. Please note that the image was not created by an actual AI model.
				</div>
			</div>
			<div class="row g-3 g-lg-4">
				<div class="col-sm-6 col-lg-3">
					<div class="ratio" style="--bs-aspect-ratio: 68.46%;">
						<div><div class="shimmer-loader rounded-4 h-100"></div></div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="ratio" style="--bs-aspect-ratio: 68.46%;">
						<div><div class="shimmer-loader rounded-4 h-100"></div></div>
					</div>
				</div>	
				<div class="col-sm-6 col-lg-3">
					<div class="ratio" style="--bs-aspect-ratio: 68.46%;">
						<div><div class="shimmer-loader rounded-4 h-100"></div></div>
					</div>
				</div>	
				<div class="col-sm-6 col-lg-3">
					<div class="ratio" style="--bs-aspect-ratio: 68.46%;">
						<div><div class="shimmer-loader rounded-4 h-100"></div></div>
					</div>
				</div>	
			</div>
		</div>
		<div id="aiGeneratedResult" class="d-none">
			<h4 class="mb-2">AI-Generated Result</h4>
			<div class="mb-3 d-flex align-items-center">
				<iconify-icon icon="solar:info-circle-bold-duotone" class="fs-4 text-muted"></iconify-icon>
				<div class="ps-1">
					This is a simulated AI-generated response. Please note that the image was not created by an actual AI model.
				</div>
			</div>
			<div class="row g-3 g-lg-4">
				<div class="col-sm-6 col-lg-3">
					<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show" data-bs-theme="dark">
						<img src="/assets/img/ai/generated-1.jpg" class="card-img" alt="Generated Image" />
						<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div class="h-100 d-flex align-items-end">
								<div class="w-100">
									<h5 class="fs-6 text-truncate">Variant 1</h5>
									<div class="d-flex small">
										<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
										<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show" data-bs-theme="dark">
						<img src="/assets/img/ai/generated-2.jpg" class="card-img" alt="Generated Image" />
						<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div class="h-100 d-flex align-items-end">
								<div class="w-100">
									<h5 class="fs-6 text-truncate">Variant 2</h5>
									<div class="d-flex small">
										<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
										<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show" data-bs-theme="dark">
						<img src="/assets/img/ai/generated-3.jpg" class="card-img" alt="Generated Image" />
						<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div class="h-100 d-flex align-items-end">
								<div class="w-100">
									<h5 class="fs-6 text-truncate">Variant 3</h5>
									<div class="d-flex small">
										<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
										<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show" data-bs-theme="dark">
						<img src="/assets/img/ai/generated-4.jpg" class="card-img" alt="Generated Image" />
						<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
							<div class="h-100 d-flex align-items-end">
								<div class="w-100">
									<h5 class="fs-6 text-truncate">Variant 4</h5>
									<div class="d-flex small">
										<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
										<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END ai-generated-result -->
	
	<!-- BEGIN ai-imagine -->
	<div class="mb-4 pt-2">
		<h4 class="mb-3">Explore Imagine</h4>
		<ul class="nav nav-pills mb-3 d-flex gap-1">
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px bg-theme text-theme-color" aria-current="page" href="#">All</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Fantasy</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Art</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Nature</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Popculture</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Futuristic</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Architecture</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Animals</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">People</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Food</a></li>
			<li class="nav-item"><a class="nav-link rounded-5 px-4 py-7px hover-bg-component text-body" href="#">Horror</a></li>
		</ul>
		<div class="row g-4" data-masonry='{"percentPosition": true }' data-bs-theme="dark">
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-1.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Psychedelic girl illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-2.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Fantasy water character</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-3.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Anime character using virtual reality glasses in the metaverse</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-4.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Fantasy water character</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-5.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Space adventure artwork</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-6.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Futuristic half-robot tiger in nature</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-7.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Psychedelic girl illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-8.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">View of airplane flying through a fantasy world</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-9.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Fantasy style clouds with animal</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-10.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Psychedelic girl illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-11.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Fantasy bird illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-12.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Vibrant colored autumn trees on fiery backdrop generated by AI</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-13.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">View of rhinoceros animal with futuristic robotic parts</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-14.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Robot and human silhouettes</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-15.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Neon hologram of tiger</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-16.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Fantasy house on the moon illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-17.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">People hanging out with robot</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-18.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Off-road car in fantasy scenario</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-19.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Cyberpunk city street at night with neon lights and futuristic aesthetic</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-20.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Cartoon ai robot scene</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-21.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Blockchain technology cartoon illustration</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-22.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Cartoon ai robot scene</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card rounded-4 bg-none border-0 overflow-hidden hover-show">
					<img src="/assets/img/ai/imagine-23.jpg" class="card-img" alt="Generated Image" />
					<div class="card-img-overlay d-none hover-show-elm h-100 bg-gradient-to-t bg-gradient-from-black bg-gradient-to-transparent">
						<div class="h-100 d-flex align-items-end">
							<div class="w-100">
								<h5 class="fs-6 text-truncate">Cartoon ai robot scene</h5>
								<div class="d-flex small">
									<a href="#" class="text-decoration-none text-body me-3"><i class="fa fa-fw fa-pen opacity-50"></i> Edit</a>
									<a href="#" class="text-decoration-none text-body"><i class="fa fa-fw fa-repeat opacity-50"></i> Variation</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END ai-imagine -->
@endsection
