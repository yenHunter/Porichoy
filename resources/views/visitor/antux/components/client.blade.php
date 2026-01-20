<!-- Start Partner -->
<div class="partner-style-one-area text-center default-padding bottom-less overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Partner</h4>
                    <h2 class="title">With The World Premier 80+ Brands</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-full">
        <div class="row">
            <div class="col-lg-12">
                @forelse ($client_list as $row)
                    <div class="partner-style-one-items">
                        @foreach ($row as $client)
                            <!-- Single Item -->
                            <div class="partner-style-one-item wow fadeInLeft">
                                <img src="{{ asset('visitor/antux/img/partner/1.png') }}" alt="Image Not Found">
                            </div>
                            <!-- End Single Item -->
                        @endforeach
                    </div>
                @empty
                    <div class="partner-style-one-items">
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInLeft">
                            <img src="{{ asset('visitor/antux/img/partner/1.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInLeft">
                            <img src="{{ asset('visitor/antux/img/partner/2.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInLeft">
                            <img src="{{ asset('visitor/antux/img/partner/3.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInLeft">
                            <img src="{{ asset('visitor/antux/img/partner/4.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInLeft">
                            <img src="{{ asset('visitor/antux/img/partner/4.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                    </div>
                    <div class="partner-style-one-items">
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInRight">
                            <img src="{{ asset('visitor/antux/img/partner/5.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInRight">
                            <img src="{{ asset('visitor/antux/img/partner/6.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInRight">
                            <img src="{{ asset('visitor/antux/img/partner/7.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <div class="partner-style-one-item wow fadeInRight">
                            <img src="{{ asset('visitor/antux/img/partner/7.png') }}" alt="Image Not Found">
                        </div>
                        <!-- End Single Item -->
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- End Partner -->
