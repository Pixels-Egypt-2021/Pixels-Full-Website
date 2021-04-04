@extends('layouts.app')

@section('content')


<h1 class="mt-3 mb-5 text-center">Add New Article</h1>

    {!! Form::open(['action' => 'AdminMagazineController@store','method'=> 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=> 'form-control','placeholder'=> 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('sub_title','Sub Title')}}
            {{Form::text('sub_title','',['class'=> 'form-control','placeholder'=> 'Sub Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=> 'form-control','placeholder'=> 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Article Related Image',['class'=> ' d-block'])}}
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

