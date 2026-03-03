@extends(config('themes.default_color') === 'light' ? 'layout.app-light' : 'layout.app-dark')

@section('title', 'Porichoy')

@section('content')
    <!-- Start Breadcrumb -->
    <div class="breadcrumb-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <h1>Professional service websites design</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('visitor.index') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="active">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Timeline -->
    <div id="resume" class="timeline-area default-padding bg-gray">
        <div class="container">
            <div class="time-line-style-one-box">
                <div class="row guttex-xl">

                    <div class="col-lg-6">
                        <h2>My Expertise</h2>
                        <div class="time-style-one-items">
                            @forelse ($experience_list as $item)
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="col">
                                            <h4>{{ $item->position }}</h4>
                                            <p>
                                                {{ $item->organization }}
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <span>
                                                @if ($item->end_date === null)
                                                    {{ $item->start_date?->format('m/Y') }} - Present
                                                @else
                                                    {{ $item->start_date?->format('m/Y') . ' - ' . $item->end_date?->format('m/Y') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            {!! $item->details !!}
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @empty
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Lead Developer</h4>
                                            <p>
                                                Blockdots, London
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2022 - Present</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Full Stack Web Developer</h4>
                                            <p>
                                                Parsons, The New School
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2021 - 2022</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>UI Designer</h4>
                                            <p>
                                                House of Life, Leeds
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2018 - 2023</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h2>Education Background</h2>
                        <div class="time-style-one-items">
                            @forelse ($education_list as $item)
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="col">
                                            <h4>{{ $item->degree }}</h4>
                                            <p>
                                                {{ $item->institute }}
                                            </p>
                                        </div>
                                        <div class="col-md-auto">
                                            <span>
                                                @if ($item->end_date === null)
                                                    {{ $item->start_date?->format('m/Y') }} - Present
                                                @else
                                                    {{ $item->start_date?->format('m/Y') . ' - ' . $item->end_date?->format('m/Y') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            {!! $item->details !!}
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @empty
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Programming Course</h4>
                                            <p>
                                                Harverd University
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2006 - 2014</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Graphic Design Course</h4>
                                            <p>
                                                Blockdots, London
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2016 - 2020</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="timeline-style-one-item wow fadeInUp">
                                    <div class="timeline-header">
                                        <div class="left">
                                            <h4>Web design course</h4>
                                            <p>
                                                University of California
                                            </p>
                                        </div>
                                        <div class="right">
                                            <span>2012 - 2015</span>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            The education should be very interactual. Ut tincidunt est ac dolor aliquam
                                            sodales.
                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.
                                            sectors of the economy or areas of culture sed mauris hendrerit, laoreet smart
                                            software.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Timeline -->

    <!-- Start Fun Fact -->
    <div class="fun-factor-area default-padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Top Skills</h4>
                        <h2 class="title">See my expertise</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="fun-fact-style-two-items text-center">
                @forelse ($skill_list as $item)
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="{{ $loop->index * 100 }}ms">
                        <div class="icon">
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="{{ $item->score }}" data-speed="2000">
                                    {{ $item->score }}
                                </div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">{{ $item->title }}</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                @empty
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/xd.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="80" data-speed="2000">80</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Adobe XD</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="100ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/figma.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="90" data-speed="2000">90</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Figma</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/wordpress.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="70" data-speed="2000">70</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">WordPress</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/photoshop.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="80" data-speed="2000">80</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Photoshop</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="400ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/diamon.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="60" data-speed="2000">60</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Sketch</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <!-- Single item -->
                    <div class="funfact-style-two-item wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="{{ asset('visitor/antux/img/icon/ai.png') }}" alt="Image Not Found">
                        </div>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="90" data-speed="2000">90</div>
                                <div class="operator">%</div>
                            </div>
                            <span class="medium">Illustrator</span>
                        </div>
                    </div>
                    <!-- End Single item -->
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->
@endsection
