<!-- <header class="nav-area"> -->
<header class="">

    <div class="row ">
        <!-- Top NavBar Starts: Displaying Address and Login, No Display on Mobile View smart-scroll -->
        @if(isset($type))
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar top-bar bgcolor">
        @else
            <nav class="navbar  navbar-expand-lg navbar-light fixed-top top-bar bgcolor">
        @endif
            <div class="container">
                <ul class="list-inline mb-0 py-2" >
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="fas fa-phone fa-sm" ></span>
                            {{ isset(Illuminate\Support\Facades\Config::get('contact')->phone) ? Illuminate\Support\Facades\Config::get('contact')->phone : '01-2038382' }}
                        </a>
                    </li>
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="far fa-envelope fa-sm" ></span>
                            {{ isset(Illuminate\Support\Facades\Config::get('contact')->email) ? Illuminate\Support\Facades\Config::get('contact')->email : 'info@nilkantha.com' }}
                        </a>
                    </li>
                    <li class="list-inline-item" >
                        <a href="#" style="color: white">
                            <span aria-hidden="true" class="fas fa-map-marker-alt fa-sm" ></span>
                            {{ isset(Illuminate\Support\Facades\Config::get('contact')->address) ? Illuminate\Support\Facades\Config::get('contact')->address : 'Nilkantha, Dhading, Nepal' }}
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
                            <a class="nav-link" href="{{ url('/login') }}" target="_blank"><button type="button" class="btn btn-outline-light text-light top-btn">Login</button></a>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>
    </div>
    <!--End of Top Nav Bar-->

    <!--Start of Bottom / Main Nav Bar -->
    <div class="row">

        <nav class="navscroll navbar fixed-top navbar-expand-lg navbar-dark  down-bar bgcolor ">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="{{ url('/') }}" >
                    @if(isset(Illuminate\Support\Facades\Config::get('configurations')->image_path))

                        <img class="rounded-circle z-depth-2" alt="{{Illuminate\Support\Facades\Config::get('configurations')->title}}" src="{{ url('/') . '/' . Illuminate\Support\Facades\Config::get('configurations')->image_path }}" width="200px" height="120px"/>
                    @else
                        <strong>{{ Illuminate\Support\Facades\Config::get('configurations')->title ?? 'Nilkantha School '}}</strong>
                    @endif
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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About Us
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/view/about_us') }}">Messages</a>
                                <a class="dropdown-item" href="{{ url('/academics/managements') }}">Management</a>
                                <a class="dropdown-item" href="{{ url('/academics/faculties') }}">Faculty Members</a>
                                <a class="dropdown-item" href="{{ url('/academics/others') }}">Other Staffs</a>
                            </div>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Academics
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/view/courses') }}">Courses</a>
                                <a class="dropdown-item" href="{{ url('/students/alumni') }}">Alumni</a>
                                <a class="dropdown-item" href="{{ url('/view/alumni') }}">Students</a>
                            </div>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/view/admission') }}">Admission</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                News & Notices
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/view/news') }}">News</a>
                                <a class="dropdown-item" href="{{ url('/view/notices') }}">Notices</a>
                                <a class="dropdown-item" href="{{ url('/view/events') }}">Events</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Articles
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/view/community') }}">Community</a>
                                <a class="dropdown-item" href="{{ url('/view/nccs') }}">NCCS Description</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/view/galleries') }}">Gallery</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contacts') }}">Contact</a>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>

    </div>

    <!--End of Bottom/ Main Nav Baar-->
    @if(isset($type))
        <div class="bgimg"></div>
    @endif
</header>
