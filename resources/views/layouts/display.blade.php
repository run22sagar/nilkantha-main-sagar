<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nilkantha School') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fixed.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/aboutUs.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>

<header>
    <div class="row">

        <!-- Top NavBar Starts: Displaying Address and Login, No Display on Mobile View smart-scroll -->

        <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar top-bar">
            <div class="container">
                <ul class="list-inline mb-0 py-2" >
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="fas fa-phone fa-sm" ></span>
                            01-2038382
                        </a>
                    </li>
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="far fa-envelope fa-sm" ></span>
                            info@nilkantha.com
                        </a>
                    </li>
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="fas fa-map-marker-alt fa-sm" ></span>
                            Nilkantha, Dhading, Nepal
                        </a>
                    </li>
                </ul>

                <!-- Collapse for mobile view -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Item for Top Nav -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank"><button type="button" class="btn btn-outline-light text-light top-btn">Login</button></a>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>
    </div>
    <!--End of Top Nav Bar-->

    <!--Start of Bottom / Main Nav Bar -->
    <div class="row">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar down-bar ">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="#/" target="_blank">
                    <strong>Nilkantha School</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about_us') }}">About Us</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Academics
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="academicsNepali.html">Nepali Department</a>
                                <a class="dropdown-item" href="academicsEnglish.html">English Department</a>
                                <a class="dropdown-item" href="academicsComputer.html">Computer Science Department</a>
                                <a class="dropdown-item" href="academicsMathematics.html">Mathematics Department</a>
                                <a class="dropdown-item" href="academicsSocial.html">Social StudiesDepartment</a>
                                <a class="dropdown-item" href="academics">HPEDepartment</a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admission
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="AdmissionForm.html">Admission Form</a>
                                <a class="dropdown-item" href="#">Scholarship Notice</a>
                                <a class="dropdown-item" href="#">Fee Payment Notice</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Articles
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notice
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" href="noticeExam.html">Online First Semester Examination</a>
                                <a class="dropdown-item" href="#">Grade XI Routine</a><a class="dropdown-item" href="#">Mid Term Exam Notice</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gallery
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="gallery.html">Photo Gallery</a>
                                <a class="dropdown-item" href="#">Video Gallery</a>

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">Contact</a>
                        </li>



                    </ul>




                </div>

            </div>
        </nav>
    </div>
    <!--End of Bottom/ Main Nav Baar-->
    <div class="bgimg"></div>
</header>

<div>
    @yield('content')
</div>

<!-- footer -->

<footer class="footer " >

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
                    <li ><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Notice</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
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

</body>
</html>
