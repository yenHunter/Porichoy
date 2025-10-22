@extends('admin.layout.default', [
	'appClass' => 'app-content-full-height vh-100',
	'appContentClass' => 'p-0 d-flex bg-component h-100'
])

@section('title', 'AI Chat')

@push('js')
	<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/highlightjs.demo.js"></script>
	<script src="/assets/js/demo/ai-chat.demo.js"></script>
@endpush

@section('content')
	<a class="d-lg-none btn btn-icon btn-lg bg-component text-body rounded-0 z-3 rounded-end-3 mt-5 shadow position-absolute top-0 start-0 " data-bs-toggle="offcanvas" href="#aiChatSidebar" role="button" aria-controls="offcanvasExample">
		<i class="fa fa-gear"></i>
	</a>
	<!-- BEGIN ai-chat-sidebar -->
	<div class="w-300px bg-component offcanvas offcanvas-start position-lg-relative transform-lg-none visibility-lg-initial z-lg-3 border-end" id="aiChatSidebar">
		<!-- BEGIN ai-chat-sidebar-mobile-bg -->
		<div class="bg-component d-lg-none d-block position-absolute top-0 end-0 w-100 h-100"></div>
		<!-- END ai-chat-sidebar-mobile-bg -->
		
		<!-- BEGIN ai-chat-sidebar-content -->
		<div class="position-relative h-100 d-flex flex-column">
			<!-- BEGIN ai-chat-new-btn -->
			<div class="p-3">
				<button type="button" class="btn btn-lg fs-14px py-2 rounded-3 btn-theme w-100 fw-semibold border-0" data-toggle-ai-tab="aiChatIntro"><i class="fa fa-plus me-2 ms-n2 my-4px"></i> New Chat</button>
			</div>
			<!-- END ai-chat-new-btn -->
			
			<hr class="m-0 opacity-100 border-top" />
			
			<!-- BEGIN ai-chat-history -->
			<div class="flex-1 overflow-hidden text-body">
				<!-- BEGIN scrollbar -->
				<div data-scrollbar="true" class="p-3" data-height="100%">
					<div class="fw-bold mb-2 d-flex align-items-center">
						<iconify-icon icon="solar:calendar-bold-duotone" class="fs-20px w-20px me-7px text-gray-600 pb-2px"></iconify-icon> 
						Today
					</div>
					<div class="px-2">
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Plan My Dream Vacation</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Craft a Winning Pitch</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Organize My Day</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Write Custom Code</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Draft a Polished Email</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Brainstorm Ideas</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
					</div>
						
					<div class="fw-bold mb-2 d-flex align-items-center mt-4">
						<iconify-icon icon="solar:calendar-bold-duotone" class="fs-20px w-20px me-7px text-gray-600 pb-2px"></iconify-icon>
						1 Week Ago
					</div>
					<div class="fs-6 px-2">
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Summarize an Article</div><a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Prepare for a Speech</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Create a Business Proposal</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="fw-bold mb-2 d-flex align-items-center mt-4">
						<iconify-icon icon="solar:calendar-bold-duotone" class="fs-20px w-20px me-7px text-gray-600 pb-2px"></iconify-icon> 
						2 Weeks Ago
					</div>
					<div class="fs-6 px-2">
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Organize Project Tasks</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Research Market Trends</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
						<div class="position-relative hover-bg-body hover-show rounded-4 py-8px px-3 ps-20px border-0 d-flex align-items-center">
							<div class="flex-1 text-body">Craft Social Media Posts</div>
							<a href="#" class="stretched-link" data-toggle-ai-tab="aiChatPrev"></a>
							<div class="dropdown position-relative z-3">
								<a href="#" data-bs-toggle="dropdown" class="link-gray-500 d-none hover-show-elm"><i class="fa fa-ellipsis"></i></a>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Share Chat</a>
									<a href="#" class="dropdown-item">See Details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">Rename</a>
									<a href="#" class="dropdown-item">Archive</a>
									<a href="#" class="dropdown-item">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END scrollbar -->
			</div>
			<!-- END ai-chat-history -->
			
			<hr class="m-0 opacity-100 border-top" />
			
			<!-- BEGIN ai-chat-info -->
			<div class="p-2">
				<div class="py-8px px-2 d-flex align-items-center">
					<i class="far fa-folder fa-lg fa-fw me-2"></i>
					Explore Bots
				</div>
				<div class="py-8px px-2 d-flex align-items-center">
					<i class="far fa-gem fa-lg fa-fw me-2"></i>
					Go Pro
				</div>
			</div>
			<!-- END ai-chat-info -->
			
			<hr class="m-0 opacity-100 border-top" />
			
			<!-- BEGIN ai-chat-user-info -->
			<div class="rounded-4 px-3 py-3 border-0">
				<div class="fw-semibold flex-1 text-body d-flex align-items-center">
					<div class="w-30px h-30px me-2 fw-400 rounded-circle text-white bg-dark d-flex align-items-center justify-content-center">
						S
					</div>
					support@seantheme.com
				</div>
			</div>
			<!-- END ai-chat-user-info -->
		</div>
		<!-- END ai-chat-sidebar-content -->
	</div>
	<!-- END ai-chat-sidebar -->
	
	<!-- BEGIN ai-chat-content -->
	<div class="flex-1 d-flex flex-column mw-100 h-100">
		<!-- BEGIN ai-chat-tabs -->
		<div class="flex-1 overflow-hidden w-100 h-100">
			<div class="h-100 p-2 p-lg-4" data-scrollbar="true" data-height="100%">
				<div class="tab-content px-3 px-lg-4 py-3">
					<!-- BEGIN ai-chat-intro -->
					<div id="aiChatIntro" class="tab-pane fade show active">
						<div class="display-6 fw-bold mb-0">
							<span class="text-theme">Hello, there</span>
						</div>
						<div class="fs-3 fw-bold text-body mb-4">How can I assist you today?</div>
						<div class="row g-4">
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Suggest hidden gems and must-see spots for my next trip.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:calendar-date-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Plan My Adventure</div>
										<div class="fs-15px fw-bold">Suggest hidden gems and must-see spots for my next trip.</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Create a concise and professional response for any situation.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:chat-square-arrow-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Draft a Quick Reply</div>
										<div class="fs-15px fw-bold">Create a concise and professional response for any situation.</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Break down complex ideas into simple, easy-to-understand explanations.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Simplify This</div>
										<div class="fs-15px fw-bold">Break down complex ideas into simple, easy-to-understand explanations.</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Write and troubleshoot code with smart fixes for tricky errors.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:code-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Code & Debug</div>
										<div class="fs-15px fw-bold">Write and troubleshoot code with smart fixes for tricky errors.</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Generate fresh ideas for projects, names, or creative solutions.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:lightbulb-bolt-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Brainstorm Anything</div>
										<div class="fs-15px fw-bold">Generate fresh ideas for projects, names, or creative solutions.</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-xl-4">
								<a class="card cursor-pointer h-100 hover-bg-body position-relative overflow-hidden rounded-4 text-decoration-none" data-toggle-ai-tab="aiChatNew" data-toggle-ai-input="Craft emails, reports, or social posts in a polished, clear tone.">
									<div class="card-body p-4">
										<div class="mb-3 d-flex">
											<iconify-icon icon="solar:pen-2-bold-duotone" class="fs-40px text-gray-600"></iconify-icon>
										</div>
										<div class="text-gray-500 fw-semibold mb-1">Write It for Me</div>
										<div class="fs-15px fw-bold">Craft emails, reports, or social posts in a polished, clear tone.</div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- END ai-chat-intro -->
			
					<!-- BEGIN ai-chat-prev -->
					<div id="aiChatPrev" class="tab-pane fade">
						<!-- BEGIN chat-human -->
						<div class="d-flex justify-content-end align-items-end mb-3">
							<div class="rounded-4 px-3 py-2 bg-body mw-75">
								Can you generate some content for social media captions?
							</div>
							<div>
								<div class="w-30px h-30px my-2px ms-2 me-2 rounded-circle text-white bg-dark d-flex align-items-center justify-content-center">
									S
								</div>
							</div>
						</div>
						<!-- END chat-human -->
						
						<!-- BEGIN chat-ai -->
						<div class="mb-3">
							<div class="d-flex justify-content-start align-items-end">
								<div>
									<div class="w-30px h-30px my-2px ms-2 fs-16px me-2 rounded-circle bg-theme text-theme-color d-flex align-items-center justify-content-center">
										<i class="fa fa-shekel-sign"></i>
									</div>
								</div>
								<div class="rounded-4 px-3 py-2 bg-body mw-75">
									<div>Absolutely! What’s the topic or product?</div>
								</div>
							</div>
							<div class="d-flex">
								<div class="w-30px h-30px me-2 ms-2"></div>
								<div class="d-flex flex-wrap w-100 p-2 opacity-75">
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-copy"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-up"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-down"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="fa fa-fw fa-microphone"></i></a>
									<a href="#" class="link-gray-500 text-decoration"><i class="fa fa-fw fa-arrow-rotate-right"></i></a>
								</div>
							</div>
						</div>
						<!-- END chat-ai -->

						<!-- BEGIN chat-human -->
						<div class="d-flex justify-content-end align-items-end mb-3">
							<div class="rounded-4 px-3 py-2 bg-body mw-75">
								Let’s say… a coffee shop promotion.
							</div>
							<div>
								<div class="w-30px h-30px my-2px ms-2 me-2 rounded-circle text-white bg-dark d-flex align-items-center justify-content-center">
									S
								</div>
							</div>
						</div>
						<!-- END chat-human -->
						
						<!-- BEGIN chat-ai -->
						<div class="mb-3">
							<div class="d-flex justify-content-start align-items-end">
								<div>
									<div class="w-30px h-30px my-2px ms-2 fs-16px me-2 rounded-circle bg-theme text-theme-color d-flex align-items-center justify-content-center">
										<i class="fa fa-shekel-sign"></i>
									</div>
								</div>
								<div class="rounded-4 px-3 py-2 bg-body mw-75">
									<div>How about these:</div>
									<ol class="my-2 ps-4">
										<li>Start your day with the perfect brew – 20% off all lattes today!</li>
										<li>Coffee first, everything else later. Grab your cup now!</li>
										<li>A little caffeine, a lot of happiness. Visit us for your daily fix!</li>
									</ol>
									<div>Need more options?</div>
								</div>
							</div>
							<div class="d-flex">
								<div class="w-30px h-30px me-2 ms-2"></div>
								<div class="d-flex flex-wrap w-100 p-2 opacity-75">
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-copy"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-up"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-down"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="fa fa-fw fa-microphone"></i></a>
									<a href="#" class="link-gray-500 text-decoration"><i class="fa fa-fw fa-arrow-rotate-right"></i></a>
								</div>
							</div>
						</div>
						<!-- END chat-ai -->

						<!-- BEGIN chat-human -->
						<div class="d-flex justify-content-end align-items-end mb-3">
							<div class="rounded-4 px-3 py-2 bg-body mw-75">
								How can I fetch API data in Vue.js?
							</div>
							<div>
								<div class="w-30px h-30px my-2px ms-2 me-2 rounded-circle text-white bg-dark d-flex align-items-center justify-content-center">
									S
								</div>
							</div>
						</div>
						<!-- END chat-human -->
						
						<!-- BEGIN chat-ai -->
						<div class="mb-3">
							<div class="d-flex justify-content-start align-items-end">
								<div>
									<div class="w-30px h-30px my-2px ms-2 fs-16px me-2 rounded-circle bg-theme text-theme-color d-flex align-items-center justify-content-center">
										<i class="fa fa-shekel-sign"></i>
									</div>
								</div>
								<div class="rounded-4 px-3 py-2 bg-body mw-75">
									Here’s a simple example:
									<div class="card border-0 rounded-3 my-2 overflow-hidden shadow">
										<div class="card-header d-flex bg-component border-0">
											<span class="flex-1">vue</span>
											<span><a href="#" class="text-body text-decoration-none"><i class="far fa-copy"></i> Copy</a></span>
										</div>
										<div class="hljs-container p-3">
									<pre><code class="html hljs">&lt;script&gt;
export default {
  async mounted() {
    const response = await fetch('https://api.example.com/data');
    const data = await response.json();
    console.log(data);
  }
}
&lt;/script&gt;					
</code></pre>
										</div>
									</div>
									Would you like me to explain how this works?
								</div>
							</div>
							<div class="d-flex">
								<div class="w-30px h-30px me-2 ms-2"></div>
								<div class="d-flex flex-wrap w-100 p-2 opacity-75">
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-copy"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-up"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="far fa-fw fa-thumbs-down"></i></a>
									<a href="#" class="link-gray-500 text-decoration me-2"><i class="fa fa-fw fa-microphone"></i></a>
									<a href="#" class="link-gray-500 text-decoration"><i class="fa fa-fw fa-arrow-rotate-right"></i></a>
								</div>
							</div>
						</div>
						<!-- END chat-ai -->
					</div>
					<!-- END ai-chat-prev -->
			
					<!-- BEGIN ai-chat-new -->
					<div id="aiChatNew" class="tab-pane fade">
						
					</div>
					<!-- END ai-chat-new -->
				</div>
			</div>
		</div>
		<!-- END ai-chat-tabs -->
		
		<!-- BEGIN ai-chat-input -->
		<div>
			<div class="px-lg-4 px-3 pb-3">
				<div class="position-relative mx-lg-4 mx-2 h-100">
					<div class="position-absolute start-0 bottom-0 px-2 pb-2 d-flex">
						<button type="button" class="btn btn-lg text-gray-500 p-0 w-30px h-30px d-flex align-items-center justify-content-center me-1"><i class="fa fa-fw fa-plus"></i></button>
						<button type="button" class="btn btn-lg text-gray-500 p-0 w-30px h-30px d-flex align-items-center justify-content-center me-1"><i class="fa fa-fw fa-globe"></i></button>
						<button type="button" class="btn btn-lg text-gray-500 p-0 w-30px h-30px d-flex align-items-center justify-content-center"><i class="fa fa-fw fa-microphone"></i></button>
					</div>
					<input type="text" class="form-control form-control-lg rounded-4 pt-10px fs-6" style="padding-bottom: 80px;" id="userInput" placeholder="Message AI Bot" />
					<div class="position-absolute end-0 bottom-0 px-2 pb-2" style="z-index: 1050;">
						<button id="sendButton" class="btn btn-lg border-0 btn-theme">
							<i class="fa fa-arrow-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- END ai-chat-input -->
	</div>
	<!-- END ai-chat-content -->
@endsection
