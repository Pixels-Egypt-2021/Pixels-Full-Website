@extends('layouts.app')

@section('content')

<h1 class="mt-4 mb-5 text-center">Edit Event</h1>

    {!! Form::open(['action' => ['AdminEventController@update',$event->id],'method'=> 'PUT','enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('name','Event Name')}}
        {{Form::text('name',$event->name,['class'=> 'form-control','placeholder'=> 'Event Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description','Event Description')}}
        {{Form::textarea('description',$event->description,['class'=> 'form-control','placeholder'=> 'Event Description'])}}
    </div>

    <div class="form-group">
        {{Form::label('year','Event Year',['class'=> ' d-block'])}}
        {{Form::date('year',\Carbon\Carbon::parse($event->year),['class'=> '','placeholder'=> 'Event Year'])}}
    </div>


    <div class="form-group">
        {{Form::label('term','Season Term',['class'=> ' d-block'])}}
        {{Form::select('term', array('First' => 'First', 'Second' => 'Second'),$event->season_term,['class'=> ''])}}
    </div>

    <div class="form-group">
        {{Form::label('participants','Participants Number',['class'=> ' d-block'])}}
        {{Form::number('participants',$event->participants_no,['class'=> '','placeholder'=> 'Participants Number'])}}
    </div>

    <div class="form-group">
        {{Form::label('sessions','Sessions Number',['class'=> ' d-block'])}}
        {{Form::number('sessions',$event->sessions_no,['class'=> '','placeholder'=> 'Sessions Number'])}}
    </div>

    <div class="form-group">
        {{Form::label('flyers','Flyers Number',['class'=> ' d-block'])}}
        {{Form::number('flyers',$event->flyers_no,['class'=> '','placeholder'=> 'Flyers Number'])}}
    </div>
    <div class="form-group">
        {{Form::label('courses','Courses Number',['class'=> ' d-block'])}}
        {{Form::number('courses',$event->courses_no,['class'=> '','placeholder'=> 'Courses Number'])}}
    </div>

    <div class="form-group">
        {{Form::label('','Event Related Image',['class'=> ' d-block'])}}
        {{Form::file('img',['class'=>'w-25'])}}
    </div>

    <div class="form-group">
        {{Form::label('video_link','Video Link')}}
        {{Form::text('video_link',$event->video_link,['class'=> 'form-control w-25','placeholder'=> 'Video Link'])}}
    </div>


    <div class="mt-4 mb-2">
        {{Form::submit('Update',['class'=> 'btn btn-light d-flex m-auto '])}}
        {!!Form::close()!!}
 </div>

@endsection

