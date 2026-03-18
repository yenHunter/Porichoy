@extends('layouts.vertical', ['title' => 'FAQs'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Pages', 'title' => 'FAQs'])

    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 col-md-8">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="ti ti-help-hexagon fs-1 text-primary"></i>
                        </div>
                        <h3 class="fw-semibold mb-2">Need Help with Something?</h3>
                        <p class="text-muted mb-4">
                            We're here to assist you with any technical questions, account issues, or feedback.<br />
                            Reach out to our support team — we’ll get back to you as soon as possible!
                        </p>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <a class="btn btn-success" href="mailto:support@example.com">
                                <i class="ti ti-mail fs-5 me-1"></i> Contact Support
                            </a>
                            <a class="btn btn-primary" href="https://twitter.com/intent/tweet?text=Hello+Support"
                                target="_blank">
                                <i class="ti ti-brand-twitter fs-5 me-1"></i> Tweet to Us
                            </a>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title mb-1">General</h4>
                            <p class="text-muted mb-0">Here are some common questions about our templates.</p>
                        </div> <!-- end card-header-->
                        <div class="card-body">
                            <div class="accordion accordion-bordered" id="BorderedaccordionExample">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="BorderedheadingOne">
                                        <button aria-controls="BorderedcollapseOne" aria-expanded="true"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#BorderedcollapseOne" data-bs-toggle="collapse" type="button">
                                            What is included in your template purchase?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="BorderedheadingOne" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseOne">
                                        <div class="accordion-body">
                                            Our templates come with clean source code, comprehensive documentation, SCSS
                                            files, and starter project setups for various frameworks (e.g., React, Angular,
                                            Laravel).
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="BorderedheadingTwo">
                                        <button aria-controls="BorderedcollapseTwo" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#BorderedcollapseTwo" data-bs-toggle="collapse" type="button">
                                            Do you offer support after purchase?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="BorderedheadingTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseTwo">
                                        <div class="accordion-body">
                                            Yes! We provide 6 months of free support for bug fixes, usage questions, and
                                            minor updates. You can also extend support if needed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="BorderedheadingThree">
                                        <button aria-controls="BorderedcollapseThree" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#BorderedcollapseThree" data-bs-toggle="collapse"
                                            type="button">
                                            Can I use the template for multiple projects?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="BorderedheadingThree" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseThree">
                                        <div class="accordion-body">
                                            The standard license allows use in a single end product. For multiple projects,
                                            a separate license is required for each use case.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="BorderedheadingFour">
                                        <button aria-controls="BorderedcollapseFour" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#BorderedcollapseFour" data-bs-toggle="collapse" type="button">
                                            Are the templates compatible with the latest frameworks?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="BorderedheadingFour" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseFour">
                                        <div class="accordion-body">
                                            Yes, we regularly update our templates to ensure compatibility with the latest
                                            versions of frameworks like Bootstrap, React, Angular, Laravel, and others.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="BorderedheadingFive">
                                        <button aria-controls="BorderedcollapseFive" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#BorderedcollapseFive" data-bs-toggle="collapse" type="button">
                                            Do you provide Figma or design files?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="BorderedheadingFive" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionExample" id="BorderedcollapseFive">
                                        <div class="accordion-body">
                                            Yes, we include Figma or design source files with selected templates. Please
                                            check the product details or contact us if unsure.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title mb-1">Payments</h4>
                            <p class="text-muted mb-0">Here are some common questions related to billing and payment.</p>
                        </div> <!-- end card-header-->
                        <div class="card-body">
                            <div class="accordion accordion-bordered" id="BorderedaccordionPayment">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="paymentHeadingOne">
                                        <button aria-controls="paymentCollapseOne" aria-expanded="true"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#paymentCollapseOne" data-bs-toggle="collapse"
                                            type="button">
                                            What payment methods do you accept?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="paymentHeadingOne" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionPayment" id="paymentCollapseOne">
                                        <div class="accordion-body">
                                            We accept all major credit/debit cards, PayPal, and Stripe payments. Some
                                            marketplaces may support additional methods.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="paymentHeadingTwo">
                                        <button aria-controls="paymentCollapseTwo" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#paymentCollapseTwo" data-bs-toggle="collapse"
                                            type="button">
                                            Will I receive an invoice after purchase?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="paymentHeadingTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionPayment" id="paymentCollapseTwo">
                                        <div class="accordion-body">
                                            Yes, you will receive an official invoice or receipt via email immediately after
                                            your purchase is completed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="paymentHeadingThree">
                                        <button aria-controls="paymentCollapseThree" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#paymentCollapseThree" data-bs-toggle="collapse"
                                            type="button">
                                            Is there a refund policy?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="paymentHeadingThree" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionPayment" id="paymentCollapseThree">
                                        <div class="accordion-body">
                                            Yes, we follow the refund policy of the marketplace where the item was
                                            purchased. Please refer to their refund terms or contact us directly if unsure.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="paymentHeadingFour">
                                        <button aria-controls="paymentCollapseFour" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#paymentCollapseFour" data-bs-toggle="collapse"
                                            type="button">
                                            Can I upgrade my license later?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="paymentHeadingFour" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionPayment" id="paymentCollapseFour">
                                        <div class="accordion-body">
                                            Absolutely! You can upgrade your license at any time by contacting support or
                                            purchasing the extended license separately.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="paymentHeadingFive">
                                        <button aria-controls="paymentCollapseFive" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#paymentCollapseFive" data-bs-toggle="collapse"
                                            type="button">
                                            Why was my payment declined?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="paymentHeadingFive" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionPayment" id="paymentCollapseFive">
                                        <div class="accordion-body">
                                            Payment failures may occur due to incorrect card info, insufficient funds, or
                                            bank restrictions. Please try another method or contact your provider.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->
            <div class="row">
                <!-- Refunds Section -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title mb-1">Refunds</h4>
                            <p class="text-muted mb-0">Find answers related to our refund policy and conditions.</p>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-bordered" id="BorderedaccordionRefund">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="refundHeadingOne">
                                        <button aria-controls="refundCollapseOne" aria-expanded="true"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#refundCollapseOne" data-bs-toggle="collapse" type="button">
                                            What is your refund policy?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="refundHeadingOne" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionRefund" id="refundCollapseOne">
                                        <div class="accordion-body">
                                            We offer refunds within 14 days of purchase if the template is faulty or not as
                                            described. Please review the full policy or reach out for clarification.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="refundHeadingTwo">
                                        <button aria-controls="refundCollapseTwo" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#refundCollapseTwo" data-bs-toggle="collapse" type="button">
                                            How do I request a refund?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="refundHeadingTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionRefund" id="refundCollapseTwo">
                                        <div class="accordion-body">
                                            You can request a refund by contacting our support team with your order ID and a
                                            brief reason for the request.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="refundHeadingThree">
                                        <button aria-controls="refundCollapseThree" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#refundCollapseThree" data-bs-toggle="collapse"
                                            type="button">
                                            Are there any non-refundable purchases?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="refundHeadingThree" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionRefund" id="refundCollapseThree">
                                        <div class="accordion-body">
                                            Custom services, extended licenses, and downloadable assets with confirmed usage
                                            typically aren’t refundable.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Customization Section -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title mb-1">Customization</h4>
                            <p class="text-muted mb-0">Questions about custom development and template modifications.</p>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-bordered" id="BorderedaccordionCustom">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="customHeadingOne">
                                        <button aria-controls="customCollapseOne" aria-expanded="true"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#customCollapseOne" data-bs-toggle="collapse" type="button">
                                            Do you offer customization services?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="customHeadingOne" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionCustom" id="customCollapseOne">
                                        <div class="accordion-body">
                                            Yes, we offer paid customization services based on your requirements. Contact us
                                            for a quote.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="customHeadingTwo">
                                        <button aria-controls="customCollapseTwo" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#customCollapseTwo" data-bs-toggle="collapse" type="button">
                                            Can I modify the template myself?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="customHeadingTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionCustom" id="customCollapseTwo">
                                        <div class="accordion-body">
                                            Absolutely! All templates come with full source code and documentation to help
                                            you make your own changes.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="customHeadingThree">
                                        <button aria-controls="customCollapseThree" aria-expanded="false"
                                            class="accordion-button shadow-none bg-light bg-opacity-50 collapsed"
                                            data-bs-target="#customCollapseThree" data-bs-toggle="collapse"
                                            type="button">
                                            Will customizing the template affect support?
                                        </button>
                                    </h2>
                                    <div aria-labelledby="customHeadingThree" class="accordion-collapse collapse"
                                        data-bs-parent="#BorderedaccordionCustom" id="customCollapseThree">
                                        <div class="accordion-body">
                                            Support is still available, but major custom changes may not be covered under
                                            standard support terms.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
