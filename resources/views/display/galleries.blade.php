@include('display.header')

@include('display.navbar')

<!--  gallery -->
<section class="gallery">

    <div class="container">

        <h3 class="text-uppercase py-5">{{ isset($type) ? $type : 'Gallery' }}</h3>
        <div>
            @for ($index = 0; $index < sizeof($posts); $index++)
                @if( ($index) % 3 === 0)
                    <div class="row">
                        @endif
                        <div class="col-lg-4 col-md-4 col-sm-12 col-10 d-block m-auto">
                            <div class="card">
                                <img src="{{ url( '/' ) . '/' . $posts[$index]->image_path }}" class="card-img img-fluid">
                                <div class="card-body">
                                    <a href="{{ url( '/' ) . '/view/gallery/' . $posts[$index]->id }}"><h6 class="card-titlle text-center" >{{ $posts[$index]->title }}</h6></a>
                                </div>
                            </div>
                        </div>
                        @if( ($index + 1) % 3 === 0)
                    </div>
                @endif
            @endfor
        </div>
        <div class="pagination-wrapper text-center"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>

</section>

@include('display.footer')
