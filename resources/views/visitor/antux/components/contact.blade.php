<!-- Start Contact -->
<div id="contact" class="contact-style-one-area default-padding bg-gray">
    <div class="container">
        <div class="contact-style-one-items">

            <h1 class="fixed-text">Contact Me</h1>
            <div class="row">
                <div class="col-lg-6">
                    <form action="visitor/antux/mail/contact.php" method="POST" class="contact-form contact-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name"
                                        type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*"
                                        type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                        type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn-style-regular" type="submit" name="submit" id="submit">
                                    <span>Get in Touch</span> <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-lg-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="contact-illustration">
                <img src="{{ asset('visitor/antux/img/illustration/5.png') }}" alt="Image Not Found">
                <img src="{{ asset('visitor/antux/img/shape/13.png') }}" alt="Image Not Found">
            </div>

        </div>
    </div>
</div>
<!-- End Contact -->
