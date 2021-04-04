@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            @if(isset($_GET['id']))
                                {{ session('status') }}
                            @endif
                        </div>
                    @endif


                    <span class="text-info">
                        @if(isset($_GET['id']))
                            @if ($_GET['id']!="internal")
                                {{$search->course_name}}
                            @endif
                        @endif
                    </span> Partisipant
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <a class="btn btn-outline-primary mb-2 mr-2 rounded-pill" href="/pixels/admin">All</a>
            <a class="btn btn-outline-primary mb-2 mr-2 rounded-pill" href="/pixels/admin?id=internal">Internal</a>
            @foreach ($courses as $course)
                <a class="btn btn-outline-info mb-2 mr-2 rounded-pill" href="?id={{$course->id}}">{{$course->course_name}}</a>
            @endforeach
        </div>
        <div class="col-12 mt-4 overflow-auto">

            <table class="table table-dark table-striped table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">First Course</th>
                        <th scope="col">Sec Course</th>
                        @if (isset($_GET['id']))
                            @if ($_GET['id']=="internal")
                            <th scope="col">committee</th>
                            @else
                            <th scope="col">Email</th>
                            <th scope="col">University</th>
                            <th scope="col">AC year</th>

                            <th scope="col">Course Name</th>

                            @endif
                        @else
                            <th scope="col">Email</th>
                            <th scope="col">University</th>
                            <th scope="col">AC year</th>

                        @endif
                    </tr>
                </thead>
                @if (isset($_GET['id']))
                    @if ($_GET['id']=="internal")
                        <tbody>
                            @php($index=0)
                            @foreach($participants as $participant)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$participant->name}}</td>
                                    <td><a href="tel:+2{{$participant->phone}}">{{$participant->phone}}</a></td>
                                    <td>{{$participant->first_course}}</td>
                                    <td>{{$participant->sec_course}}</td>
                                    <td>{{$participant->committee}}</td>
                                </tr>
                                @php($index++)
                            @endforeach
                        </tbody>
                    @else
                        <tbody>
                            @php($index=0)
                            @foreach($participants as $participant)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$participant->name}}</td>
                                    <td><a href="tel:+2{{$participant->phone}}">{{$participant->phone}}</a></td>
                                    <td>
                                        @foreach ($courses as $course)
                                            @if($participant->course1_id == $course->id )
                                                {{$course->course_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($courses as $course)
                                            @if($participant->course2_id == $course->id )
                                                {{$course->course_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td><a href="email:{{$participant->email}}">{{$participant->email}}</a></td>
                                    <td>{{$participant->university}}</td>
                                    <td>{{$participant->study_year}}</td>
                                    @if(isset($_GET['id']))
                                        <td>{{$search->course_name}}</td>
                                    @endif
                                </tr>
                                @php($index++)
                            @endforeach
                        </tbody>
                    @endif
                    @else
                    <tbody>
                        @php($index=0)
                        @foreach($participants as $participant)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$participant->name}}</td>
                                <td><a href="tel:+2{{$participant->phone}}">{{$participant->phone}}</a></td>
                                <td>
                                    @foreach ($courses as $course)
                                        @if($participant->course1_id == $course->id )
                                            {{$course->course_name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($courses as $course)
                                        @if($participant->course2_id == $course->id )
                                            {{$course->course_name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td><a href="email:{{$participant->email}}">{{$participant->email}}</a></td>
                                <td>{{$participant->university}}</td>
                                <td>{{$participant->study_year}}</td>
                                @if(isset($_GET['id']))
                                    <td>{{$search->course_name}}</td>
                                @endif
                            </tr>
                            @php($index++)
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
