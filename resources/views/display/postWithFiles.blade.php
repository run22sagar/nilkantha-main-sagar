
<section class="academics">

    <div class="container">

        <h3 class="text-uppercase py-4">{{ isset($type) ? $type : 'Post With Files' }}</h3>

        <div class="row">

            <!-- start of vertical side navbar -->
            <div class="col-sm-3 vertical-nav bg-white " id="sidebar">

                <p class="text-gray font-weight-bold  ">Related Links</p>

                <ul class="nav flex-column bg-white mb-0">

                    @foreach($recentPosts as $post)
                        <li class="nav-item ">
                            <a href="{{ url('/posts') . '/' . $type . '/' . $post['id']}}" class="nav-link text-dark current "><i class="fa fa-chevron-right mr-3 "></i>{{ $post['title'] }}</a>
                        </li>
                    @endforeach

                </ul>

            </div>
            <!-- end of vertical side navbar -->

            <!-- middle space between side navbar and table -->
            <div class="col-sm-1"></div>

            <!-- Page content - nepali department  -->
            <div class="col-sm-8 page-content  " id="content">
                @foreach($posts as $post)

                    <h5 class="text-gray text-uppercase">{{ $post->title }}</h5>
                    <p class="py-4">{{ $post->sub_title }}</p>

                    <p></p>
                    @if(isset($post->image_path))
                        <td><img src=" {{ url($post->image_path)}}" width="100%" height="200px"/></td>
                    @endif
                    {!! $post->description !!}

                    @if(sizeof($post->files) > 0)
                        @for ($index = 0; $index < sizeof($post->files); $index++)
                            @if( $index % 3 === 0)
                                <div class="row">
                                    @endif
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-10 d-block m-auto">
                                        <div class="card">
                                            <a href="#"><img src="{{ url($post->files[$index]->path) }}" class="card-img img-fluid"></a>
                                        </div>
                                    </div>
                                    @if( ($index + 1) % 3 === 0)
                                </div>
                            @endif
                        @endfor

                    @endif
                @endforeach
            </div>

        </div>

    </div>

</section>
