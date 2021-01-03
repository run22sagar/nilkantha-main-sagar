<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>{{ config('app.name', 'Nilkantha School') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/academicsEnglish.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>


<body>

<header>

    @include('display.navbar')

</header>

<!-- start of the academics section -->
<section class="academics">


    <div class="container">

        <div class="row">

            <!-- start of vertical side navbar -->
        @include('members._sidebar')
        <!-- end of vertical side navbar -->
        <!-- middle space between side navbar and table -->
        <div class="col-sm-1"></div>

            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">

                        {{--                        <a href="{{ url( '/academics/faculty') . '/' . $member->department->name }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
                        {{--                        <a href="{{ url('/members/' . $member->id . '/edit') }}" title="Edit FacultyMember"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                        {{--                        <form method="POST" action="{{ url('members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                        {{--                            {{ method_field('DELETE') }}--}}
                        {{--                            {{ csrf_field() }}--}}
                        {{--                            <button type="submit" class="btn btn-danger btn-sm" title="Delete FacultyMember" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                        {{--                        </form>--}}
                        {{--                        <br/>--}}
                        {{--                        <br/>--}}

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th> First Name </th>
                                    <td> {{ $member->first_name }} </td>
                                </tr>
                                <tr>
                                    <th> Middle Name </th>
                                    <td> {{ $member->middle_name }} </td>
                                </tr>
                                <tr>
                                    <th> Last Name </th>
                                    <td> {{ $member->last_name }} </td>
                                </tr>
                                <tr>
                                    <th> Designation </th>
                                    <td> {{ $member->designation }} </td>
                                </tr>
                                <tr>
                                    <th> Education </th>
                                    <td> {{ $member->education }} </td>
                                </tr>
                                <tr>
                                    <th> Department </th>
                                    <td> {{ $member->department->name }} </td>
                                </tr>
                                <tr>
                                    <th> Image </th>
                                    <td><img src=" {{ asset($member->image_path)}}" height="270px" width="100%"/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>

</section>

@include('display.footer')
