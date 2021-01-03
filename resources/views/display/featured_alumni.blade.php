@include('display.header')

@include('display.navbar')

<!-- start of the Featured Alumni section -->
<section class="alumni">

    <div class="container">

        <h3 class="text-capitalize">{{ isset($type) ? $type : 'Alumni' }}</h3>


        <div class="row">

            <!-- start of vertical side navbar -->
            <div class="col-sm-3 vertical-nav bg-white " id="sidebar">

                <p class="text-gray font-weight-bold  ">Related Links</p>

                <ul class="nav flex-column bg-white mb-0">

                    <li class="nav-item ">
                        <a href="{{ url('/students/alumni') }}" class="nav-link text-dark bg-light current"><i class="fa fa-chevron-right mr-3 "></i>Featured Alumni </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('/view/alumni') }}" class="nav-link text-dark bg-light "><i class="fa fa-chevron-right mr-3 "></i>Alumni List</a>
                    </li>

                </ul>

            </div>
            <!-- end of vertical side navbar -->


            <!-- Page content - profile of few best performing ex-students  -->
            <div class="col-sm-9 page-content  " id="content">

                <h5 class="text-gray text-uppercase ">Our Featured Alumni</h5>
                <p > Some of the best performing ex-students of the school.  </p>

                @for ($index = 0; $index < sizeof($alumni); $index++)
                    @if( ($index) % 3 === 0)
                        <div class="row">
                            @endif
                            <div class="col-lg-4 col-md-4 col-sm-12 col-10 d-block m-auto">
                                <div class="card">
                                    <img src="{{ url($alumni[$index]->image_path) }}" class="img-fluid">
                                    <div class="text-content">
                                        <h6>{{ $alumni[$index]->first_name .
                                ( isset( $alumni[$index]->middle_name) ? (' ' . $alumni[$index]->middle_name) : ' ') .
                                $alumni[$index]->last_name  }}</h6>
                                        <p>{{'Batch' . $alumni[$index]->batch}}<br>
                                            {{ $alumni[$index]->current_involvement }}</p>
                                    </div>
                                </div>
                            </div>
                            @if( ($index + 1) % 3 === 0)
                        </div>
                    @endif
                @endfor

            </div>
            <!-- end of page content -->

        </div>

    </div>

</section>
<!-- end of Fetaured Alumni section -->


@include('display.footer')
