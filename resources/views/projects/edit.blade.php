@extends('layouts.app')

@section('content')


<h1 class="mt-3 mb-5 text-center">Edit Project</h1>

    {!! Form::open(['action' => ['AdminProjectController@update',$project->id],'method'=> 'PUT', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('','Project Name')}}
            {{Form::text('name',$project->name,['class'=> 'form-control','placeholder'=> 'Project Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Project Title')}}
            {{Form::text('title',$project->title,['class'=> 'form-control','placeholder'=> 'Project Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Project Description')}}
            {{Form::textarea('description',$project->description,['class'=> 'form-control','placeholder'=> 'Project Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Project Components')}}
            {{Form::textarea('components',$project->components,['class'=> 'form-control','placeholder'=> 'Project Components'])}}
        </div>



        <div class="form-group">
            {{Form::label('','Components Images',['class'=> ' d-block'])}}
            {!! Form::file('components_imgs[]', array('multiple'=>true,'class'=>'send-btn')) !!}
        </div>

        <div class="form-group">
            {{Form::label('','Mechanical Design',['class'=> ' d-block'])}}
            {!! Form::file('design_imgs[]', array('multiple'=>true,'class'=>'send-btn')) !!}
        </div>

        <div class="form-group">
            {{Form::label('','PCB',['class'=> ' d-block'])}}
            {!! Form::file('pcb_imgs[]', array('multiple'=>true,'class'=>'send-btn')) !!}
        </div>





        <div class="form-group">
            {{Form::label('','Project Steps')}}
            {{Form::textarea('steps',$project->steps,['class'=> 'form-control','placeholder'=> 'Project Steps'])}}
        </div>

        <div class="form-group">
            {{Form::label('','Source Code')}}
            {{Form::textarea('code',$project->code,['class'=> 'form-control','placeholder'=> 'Source Code'])}}
        </div>

        <div class="form-group">
            {{Form::label('','Code Link')}}
            {{Form::text('link',$project->link,['class'=> 'form-control','placeholder'=> 'Code Link'])}}
        </div>




        <div class="form-group">
            {{Form::label('','Project Images',['class'=> ' d-block'])}}
            {!! Form::file('project_imgs[]', array('multiple'=>true,'class'=>'send-btn')) !!}
        </div>


        <div class="form-group">
            {{Form::label('video_link','Video Link')}}
            {{Form::text('video_link',$project->video_link,['class'=> 'form-control','placeholder'=> 'Video Link'])}}
        </div>

<div class="mt-4 mb-2">
       {{Form::submit('Update',['class'=> 'btn btn-light d-flex m-auto '])}}
        {!!Form::close()!!}
</div>
@endsection

