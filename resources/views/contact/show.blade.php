@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ url('/contact/saveInquiryDetails') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

            </form>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact {{ $contact->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/contact') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/contact/' . $contact->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('contact' . '/' . $contact->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contact->id }}</td>
                                    </tr>
                                    <tr><th> Address </th><td> {{ $contact->address }} </td></tr><tr><th> Phone </th><td> {{ $contact->phone }} </td></tr><tr><th> Email </th><td> {{ $contact->email }} </td></tr><tr><th> GoogleMapUrl </th><td> {{ $contact->googleMapUrl }} </td></tr><tr><th> MapImage </th><td> <img src="{{ \Illuminate\Support\Facades\URL::asset($contact->mapImage) }}"> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
