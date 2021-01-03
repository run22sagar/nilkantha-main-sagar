@include('display.header')

@include('display.navbar')

<!-- start of the academics section -->
<section class="academics">

    <div class="container">

        <h3 class="text-uppercase py-5 text-center">Contact Us</h3>

    </div>

    @if(!$contact->exists)
        <div class="container page-desc">
            <h5 class="r-sub-title-b text-center">We would love to hear from you. Please contact us at:</h5>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-map-marker-alt contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>{{ $contact->address }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-phone contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>{{ $contact->phone }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-envelope contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>{{ $contact->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!--Contact Links -->
            <h5 class="r-sub-title-b text-center">Follow us at:</h5>

            <div class="container text-center">
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-facebook-f s-icons" style="color: #0f5288"></i>
                </a>

                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-instagram s-icons" style="color: #0f5288"></i>
                </a>

                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-youtube s-icons" style="color: #0f5288"></i>
                </a>
            </div>

        </div>
    @else
        <div class="container page-desc">
            <h5 class="r-sub-title-b text-center">We would love to hear from you. Please contact us at:</h5>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-map-marker-alt contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>Nilkantha, Dhading, Nepal</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-phone contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>023-23545</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-box">
                        <div class="container text-center contact-icon-bg">
                            <i class="fas fa-3x fa-envelope contact-icon"></i>
                        </div>
                        <div class="card-body text-center contact-body">
                            <h6>contact@nilkantha.edu.np</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
</section>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-5">
        <form method="POST" action="{{ url('/contacts/sendMail') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label> Message </label>
                        <textarea class="form-control" name="message" rows="5" placeholder="Enter your query"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
    <div class="col-md-4">
        @if($contact->exists)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {!! $contact->googleMapUrl !!}
                    </div>



                </div>
            </div>

            <h5 class="r-sub-title-b text-center">Follow us at:</h5>

            <div class="container text-center">
                <a href="{{ $contact->facebook }}" target="_blank">
                    <i class="fab fa-3x fa-facebook-f s-icons" style="color: #0f5288"></i>
                </a>

                <a href="{{ $contact->facebook }}" target="_blank">
                    <i class="fab fa-3x fa-instagram s-icons" style="color: #0f5288"></i>
                </a>

                <a href="{{ $contact->facebook }}" target="_blank">
                    <i class="fab fa-3x fa-youtube s-icons" style="color: #0f5288"></i>
                </a>
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d452094.46377294714!2d85.07319436557592!3d27.717656835062368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39952b9cce89c14b%3A0xf0967839636c6736!2sNeelkantha%20Secondary%20School!5e0!3m2!1sen!2snp!4v1609419667137!5m2!1sen!2snp" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>



                </div>
            </div>

            <h5 class="r-sub-title-b text-center">Follow us at:</h5>

            <div class="container text-center">
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-facebook-f s-icons" style="color: #0f5288"></i>
                </a>

                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-instagram s-icons" style="color: #0f5288"></i>
                </a>

                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-3x fa-youtube s-icons" style="color: #0f5288"></i>
                </a>
            </div>
        @endif
    </div>
    <div class="col-md-1"></div>

</div>
<!--Contact Links -->

@include('display.footer')
