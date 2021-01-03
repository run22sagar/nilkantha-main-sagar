<!-- footer -->

<footer class="footer abtUsFooter" >

    <!-- top footer starts: navigation links and contact  -->
    <div class="container " >

        <div class="row">

            <div class="col-sm-12 col-md-6  ">
                <h4 >Nilkantha School</h4>
                <p class="mt-3 "> Nilkantha Numuna Secondary School, located in Dhading, is the government desinated school of Nepal.</p>
            </div>

            <div class="col-6 col-md-3 mb-4 mx-auto ">
                <h6  >Navigation Links</h6>
                <ul class="footer-links  ">
                    <li ><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/view/aboutUs') }}">About us</a></li>
                    <li><a href="{{ url('/view/courses') }}">Academics</a></li>
                    <li><a href="{{ url('/view/admission') }}">Admission</a></li>
                    <li><a href="{{ url('/view/courses') }}">Notice</a></li>
                    <li><a href="{{ url('/view/community') }}">Articles</a></li>
                    <li><a href="{{ url('/view/galleries') }}">Gallery</a></li>
                    <li><a href="{{ url('/contacts') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 ">
                <h6 >Contact Us</h6>
                <ul class="footer-links">
                    <li><span aria-hidden="true" class="fas fa-map-marker-alt fa-sm mr-2"></span>Nilkantha, Dhading, Nepal</li>
                    <li><span aria-hidden="true" class="fas fa-phone fa-sm mr-2" ></span>01-2038382</li>
                    <li><span aria-hidden="true" class="far fa-envelope fa-sm mr-2"></span>info@nilkantha.com</li>
                </ul>
            </div>

        </div>
        <hr class="small"><!-- underline -->

    </div>
    <!-- end of top footer -->


    <!-- start of bottom part of the footer -->
    <div class="container" >

        <div class="row">

            <div class="col-md-8 col-sm-6 col-xs-12 " >
                <p class="copyright-text">Copyright &copy; 2020 Nilkantha School, All Rights Reserved</p>
            </div>

            <div class="col-md-4 col-sm-6 col-12 inline ">
                <ul class="social-icons ">
                    <li ><a class="facebook" href="#"><i class="fab fa-facebook-f "></i></a></li>
                    <li ><a class="youtube" href="#"><i class="fab fa-youtube "></i></a></li>
                </ul>
            </div>

        </div>

    </div>
    <!--  end of bottom part of footer -->

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(window).scroll(function()
    {

        $('nav').toggleClass('scrolled',$(this).scrollTop()>50);
    });
</script>

</body>
</html>
