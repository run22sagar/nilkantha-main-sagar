    @include('display.header')

    @include('display.navbar')

<!-- start of the academics section -->
<section class="academics">

    <div class="container">

        <h3 class="text-uppercase py-5">{{ isset($type) ? $type : 'Admissions' }}</h3>

        <div class="row">

            <!-- start of vertical side navbar -->
        @include('display.admissionSidebar')
        <!-- end of vertical side navbar -->

            <!-- middle space between side navbar and table -->
            <div class="col-sm-1"></div>

            <!-- Page content - nepali department  -->
            <div class="col-sm-8 page-content  " id="content">

                <h5 class="text-gray text-uppercase">{{ isset($type) ? $type : 'Courses' }}</h5>
                <p class="py-4">Here, you can view the courses of Schools</p>

            {{--                <p class="py-4"> Please download the admission form for the respective grades and submit to the school with specified documents. The last day for form submission is December 30,2020 </p>--}}

            <!-- start of faculty members table -->
                <table class="table">
                    <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ url($post->file_path) }}" target="_blank">Download</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="pagination-wrapper text-center"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>

            </div>

        </div>

    </div>

</section>

@include('display.footer')



















