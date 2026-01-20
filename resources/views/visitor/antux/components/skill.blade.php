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
