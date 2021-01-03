@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Alumni</div>
                    <div class="card-body">
                        <a href="{{ url('/alumni/create') }}" class="btn btn-success btn-sm" title="Add New Alumnus">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/alumni') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th><th>Middle Name</th><th>Last Name</th>
                                        <th>Batch</th><th>Featured Image</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($alumni as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td><td>{{ $item->middle_name }}</td>
                                        <td>{{ $item->last_name }}</td><td>{{ $item->batch }}</td>
                                        <td><img src="{{\Illuminate\Support\Facades\URL::asset($item->image_path)}}" width="150px" height="150px"></td>
                                        <td>
{{--                                            <a href="{{ url('/alumni/' . $item->id) }}" title="View Alumnus"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                            <a href="{{ url('/alumni/' . $item->id . '/edit') }}" title="Edit Alumnus"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/alumni' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Alumnus" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $alumni->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
