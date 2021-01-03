@include('display.header')
@include('display.navbar')

<!-- start of the academics section -->
@if( $type === 'Managements')
    <section class="academics">

        <div class="container">

            <h3 class="text-capitalize">{{ isset($type) ? $type : 'Management' }}</h3>


            <div class="row">

                <!-- start of vertical side navbar -->
            @include('members._sidebar')
            <!-- end of vertical side navbar -->

                <!-- Page content - profile of few best performing ex-students  -->
                <div class="col-sm-9 page-content  " id="content">
                    @for ($index = 0; $index < sizeof($members); $index++)
                        @if( ($index) % 3 === 0)
                            <div class="row">
                                @endif
                                <div class="col-lg-4 col-md-4 col-sm-12 col-10 d-block m-auto">
                                    <div class="card">
                                        <img src="{{ url($members[$index]->image_path) }}" class="img-fluid">
                                        <div class="text-content">
                                            <h6>{{ $members[$index]->first_name .
                                ( isset( $members[$index]->middle_name) ? (' ' . $members[$index]->middle_name) : ' ') .
                                $members[$index]->last_name  }}</h6>
                                            <p>{{'Designation: ' . $members[$index]->designation}}</p>
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
@else
    <section class="academics">

        <div class="container">

            <h3 class="text-uppercase py-4">{{ $type }}</h3>

            <div class="row">

                <!-- start of vertical side navbar -->
                @include('members._sidebar')
                <!-- end of vertical side navbar -->
                <!-- middle space between side navbar and table -->
    {{--            <div class="col-sm-1"></div>--}}

                <!-- Page content - nepali department  -->
                <div class="col-sm-7 page-content  " id="content">
                    @if(isset($department))
                        <h5 class="text-gray text-uppercase">{{ strtoupper($department) . ' DEPARTMENT' }}</h5>
                    @endif
                        <p class="py-4">{{ $type }} List</p>
                        <!-- start of faculty members table -->
                    <table class="table">
                        <tbody>

                        @foreach($members as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->first_name .
                                    ( isset( $member->middle_name) ? (' ' . $member->middle_name) : ' ') .
                                    $member->last_name  }}</td>
                                <td>{{ $member->designation }}</td>
                                <td>{{ $member->education }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </section>
@endif
@include('display.footer')
