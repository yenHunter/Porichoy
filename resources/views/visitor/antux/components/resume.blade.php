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
