@extends('layouts.app')

@section('content')

<h1 class="mt-4 mb-5 text-center">Add New Event</h1>

    {!! Form::open(['action' => 'AdminEventController@store','method'=> 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('name','Event Name')}}
            {{Form::text('name','',['class'=> 'form-control','placeholder'=> 'Event Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Event Description')}}
            {{Form::textarea('description','',['class'=> 'form-control','placeholder'=> 'Event Description'])}}
        </div>

        <div class="form-group">
            {{Form::label('year','Event Year')}}
            {{Form::date('year','',['class'=> 'form-control w-25','placeholder'=> 'Event Year'])}}
        </div>


        <div class="form-group">
            {{Form::label('term','Season Term',['class'=> ' d-block'])}}
            {{Form::select('term', array('First' => 'First', 'Second' => 'Second'),['class'=> 'form-control w-25'])}}
        </div>

        <div class="form-group">
            {{Form::label('participants','Participants Number')}}
            {{Form::number('participants','0',['class'=> 'form-control w-25','placeholder'=> 'Participants Number'])}}
        </div>

        <div class="form-group">
            {{Form::label('sessions','Sessions Number')}}
            {{Form::number('sessions','0',['class'=> 'form-control w-25','placeholder'=> 'Sessions Number'])}}
        </div>

        <div class="form-group">
            {{Form::label('flyers','Flyers Number')}}
            {{Form::number('flyers','0',['class'=> 'form-control w-25','placeholder'=> 'Flyers Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('courses','Courses Number')}}
            {{Form::number('courses','0',['class'=> 'form-control w-25','placeholder'=> 'Courses Number'])}}
        </div>

        <div class="form-group">
            {{Form::label('','Event Related Image',['class'=> ' d-block'])}}
            {{Form::file('img',['class'=>'w-25'])}}
        </div>

        <div class="form-group">
            {{Form::label('video_link','Video Link')}}
            {{Form::text('video_link','',['class'=> 'form-control w-25','placeholder'=> 'Video Link'])}}
        </div>

        <div class="mt-4 mb-2">
            {{Form::submit('Submit',['class'=> 'btn btn-light d-flex m-auto '])}}
            {!!Form::close()!!}
     </div>

@endsection

