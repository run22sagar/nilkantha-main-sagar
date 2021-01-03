@include('display.header')

@include('display.navbar')
<link rel="stylesheet" type="text/css" href="css/fixed.css">
<!--Carousel Start / Index Page Main View-->
<div id="demo" class="carousel slide carousel-fade " data-ride="carousel">


    <!-- Indicators -->
    <!-- <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
   -->
    <!-- The slideshow -->
    @if( $posts['carousel']->isEmpty() )
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/testb.jpg" alt="Los Angeles">
            </div>
            <div class="carousel-item">
                <img src="img/testc.jpg" alt="Chicago">
            </div>
            <div class="carousel-item">
                <img src="img/testb.jpg" alt="New York">
            </div>
        </div>
    @else
        @foreach($posts['carousel'] as $key => $value)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ url('/') . '/' . $value['path'] }}" alt="{{ $value['title'] }} " width="1300px" height="550px">
            </div>
        @endforeach
    @endif

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>
<!--Carousel End-->

<!-- Notification Section Start-->
<div class="container-fluid notice-box">
    <div class="row">
        <div class="container content">

            <!-- <div class="noticeBox">
                <p class="d-inline-flex p-3 text-center ">Notice</p>
            </div> -->

            <span class="noticeBox">
						<p class="d-inline-flex p-3 text-center bg-danger ">Notice
						</p>
                <!-- <i class="fas fa-caret-right bg-danger"></i> -->
				</span>
            <span class="has-arrow">

				</span>


            <span class="marquee noticeText">
				<marquee>
					<a href="#"> Scholarship Notice</a>	&nbsp;&nbsp;
					<a href="#"> Result of Grade X</a>	&nbsp;&nbsp;
					<a href="#"> Dashain Vacation Notice</a>&nbsp;&nbsp;
					<a href="#"> Result of Semester and Unit Test</a>	&nbsp;&nbsp;
					<a href="#"> Dashain Vacation Notice</a>&nbsp;&nbsp;
                     @if( $posts['notices']->isEmpty() )--}}
                        <a href="#"> Scholarship Notice</a>	&nbsp;&nbsp;
                        <a href="#"> Result of Grade X</a>	&nbsp;&nbsp;
                        <a href="#"> Dashain Vacation Notice</a>&nbsp;&nbsp;
                        <a href="#"> Result of Semester and Unit Test</a>	&nbsp;&nbsp;
                        <a href="#"> Dashain Vacation Notice</a>&nbsp;&nbsp;
                    @else
                        @foreach( $posts['notices'] as $notice )
                            <a href="{{ url('/') . '/view/notices/' . $notice['id'] }}">{{ $notice['title'] }}</a>&nbsp;&nbsp;
                        @endforeach
                    @endif
				</marquee>
			</span>

            <!-- <marquee >
                <span class="marquee">This is a marquee!</span>
            </marquee>
     -->

        </div>
    </div>
</div>
<!-- Notification Section End-->


<!-- Scholarship Gallery and Contact Section Start-->
<div class="container-fluid size size_a">
    <div class="row">
        <div class="col-12 narrow mb-4 nil_starts">
            <div class="row">
                <div class="col-md-4  ">
                    <a href="{{ url('/') . '/view/admission' }}" class="btn btn-success lesson-box shadow p-4 mb-5  rounded ">
                        <span class="far fa-file-alt nil_icon" ></span>
                        <p class="lead">Admission</p>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ url('/') . '/view/galleries' }}" class="btn btn-info lesson-box shadow p-4 mb-5  rounded">
                        <span aria-hidden="true" class="far fa-images nil_icon" ></span>
                        <p class="lead">Gallery</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/') . '/contacts' }}" class="btn btn-primary lesson-box shadow p-4 mb-5  rounded">
                        <span aria-hidden="true" class="fas fa-phone nil_icon" ></span>
                        <p class="lead">Contact</p>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Scholarship Gallery and Contact Section Start-->


<!-- Scrolling  Section Starts-->
<div id="resources" class="offset">
    <div class="fixed-background">
        <div class="row dark text-center ">
            @if($posts['message']->isEmpty())

                <div class="col-12 narrow2 mb-2">
                    <b id="text3">DIRECTOR'S SPEAKS</b><br>
                </div>


                <div class="col-md-8 scroll-content">

                    <p class="lead text-left pl-5">The idea of establishing a model school that would provide quality all-round education to meritorious students coming from every walk of life in an environment that fosters unity in diversity was conceived in 1964.  The idea was initiated by the Late King Mahendra in consultation with the then British Council representative, Lynndon Clough. <br>

                        After much planning and forethought, Budhanilkantha School came into existence in 1972. As a joint venture between the Government of the United Kingdom and the Government of Nepal....<br><br><button type="button" class="btn btn-outline-light">Read More</button>

                    </p>


                </div>


                <div class="col-md-4">
                    <img class="rounded-circle z-depth-2" alt="200x200" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                         data-holder-rendered="true">
                </div>
            @else
                @foreach( $posts['message'] as $message)
                    <div class="col-12 narrow2 mb-2">
                        <b id="text3" class="text-capitalize">{{ $message['title'] }}</b><br>
                    </div>


                    <div class="col-md-8 scroll-content">
                        <!-- <h3 id="text2">1:6</h3>
                        <div class="heading-underline"></div>   -->
                    <div class="founder_message">
                      <p class="lead text-left pl-5">{!!  substr($message['description'], 0, ( strlen($message['description']) > 521 ? 521 : strlen($message['description']) ) ) . '....' !!}
                          <br><br><a href="{{ url('/') . '/view/aboutUs/' . $message['id'] }}" class="btn btn-outline-light">Read More</a>
                      </p>
                    </div>
                    </div>

                    @if( strlen($message['image_path']) > 0 )
                        <div class="col-md-4">
                            <img class="rounded-circle z-depth-2" alt="{{ $message['title'] }}" src="{{ url('/') . '/' . $message['image_path'] }}"
                                 data-holder-rendered="true" width="200" height="200">
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="fixed-wrap">
            <div class="fixed scroll-image">

            </div>
        </div>

    </div>
</div>
<!-- Scrolling Section Ends-->


<!-- News and Events Section Starts-->
<div class="container-fluid">
    <div class="row news-section">
        <div class="col-12 mb-2 news-top">
            <b id="text3">HAPPENINGS AT NILKANTHA </b><br>
        </div>

        <div class="col-md-6 featured-news">
            <h5>Latest News</h5>

            @if($posts['featured']->isEmpty())
                <a href="#"><h6>Sixth-Graders create unique way to rember the 13 colonies</h6></a>

                <p>Nilkantha sixth-graders took their Lower School peers on an engaging journey through history recently when they taught them how to remember the order of the 13 colonies in a unique way.   ...
                </p>
                <button type="button" class="btn btn-outline-primary">Read More</button>
            @else
                @foreach($posts['featured'] as $news)
                    <a href="{{ url('/') . '/view/news/' . $news['id'] }}"><h6>{{ $news['title'] }}</h6></a>
                    <p>{!!  substr($news['description'], 0, ( strlen($news['description']) > 521 ? 521 : strlen($news['description']) ) ) !!} ....</p>
                    <a href="{{ url('/') . '/view/news/' . $news['id'] }}" class="btn btn-outline-primary">Read More</a>
                @endforeach
            @endif

        </div>

        <div class="col-md-6 upcoming-events">
            <h5>Upcoming Events</h5>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators news-indicator">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @if($posts['events']->isEmpty())--}}
                        <div class="carousel-item active event-heading">

                            <h6>LPC Montly Meeting</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 8:15 am - 9:15 am</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Nov 20, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>

                            <hr>

                            <h6>First Terminal Examination</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 9:00 am - 12:00 pm</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Dec 15, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>
                            <hr>


                        </div>
                        <div class="carousel-item">

                            <h6>Weekly Test</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 8:15 am - 9:15 am</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Nov 20, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>

                            <hr>

                            <h6>Orientation</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 9:00 am - 12:00 pm</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Dec 15, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>
                            <hr>
                        </div>
                        <div class="carousel-item">

                            <h6>Weekly Test</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 8:15 am - 9:15 am</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Nov 20, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>

                            <hr>

                            <h6>Orientation</h6>
                            <div class="eventContent">
                                <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; 9:00 am - 12:00 pm</a><br>
                                <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; Dec 15, 2020</a><br>
                                <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; Dhading, School Premesis</a>
                            </div>
                            <hr>
                        </div>
                    @else
                        @foreach($posts['events'] as $key => $value)
                            @if( $key % 2 === 0)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }} event-heading">
                            @endif
                                    <h6><a href="{{ url('/'). '/view/events/' . $value['id'] }}">{{ $value['title'] }}</a></h6>
                                    <div class="eventContent">
                                        <a><span aria-hidden="true" class="fas fa-clock" > </span> &nbsp; {{ $value['start_time'] . ' - ' . $value['end_time'] }}</a><br>
                                        <a><span aria-hidden="true" class="far fa-calendar-minus" > </span> &nbsp; {{ $value['date'] }}</a><br>
                                        <a><span aria-hidden="true" class="far fas fa-map-marker-alt" > </span> &nbsp; {{ $value['location'] }}</a>
                                    </div>
                                    <hr>
                            @if( ($key + 1) % 2 === 0)
                                </div>
                            @endif
                            @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News Section Ends-->

@include('display.footer')
