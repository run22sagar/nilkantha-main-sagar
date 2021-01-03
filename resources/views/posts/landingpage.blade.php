@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        @if( $posts->isEmpty() )
                            <a href="{{ url('/posts/create/landingPage') }}" class="btn btn-success btn-sm" title="Add New Post">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Configuration
                            </a>
                        @endif

{{--                        <form method="GET" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">--}}
{{--                                <span class="input-group-append">--}}
{{--                                    <button class="btn btn-secondary" type="submit">--}}
{{--                                        <i class="fa fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th><th>Logo</th><th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ \Illuminate\Support\Facades\URL::asset($item->image_path) }}" width="150px" height="150px" /></td>
                                        <td>
{{--                                            <a href="{{ url('/') }}" title="View Landing Page"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                            <a href="{{ url('/images/' . $item->id ) }}" title="Add Carousel"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Carousel</button></a>
                                            <a href="{{ url('/posts/landingPage/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection