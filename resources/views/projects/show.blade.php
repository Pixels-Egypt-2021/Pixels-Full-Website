
@extends('layouts.app')

@section('content')

<a href="/projects" class="btn btn-dark mt-2" >Projects Table</a>

<div class=" ">
    <h1 class="font-weight-bolder ml-4 mt-5">{{$project->name}}</h1>
</div>

<div class="mt-5 bg-dark text-light  w-auto" >
<div class="container ">


        <div class="  row mt-5 ml-4" >
            <h3 class="font-weight-bold mt-5" >{{$project->title}}</h3>
        </div>


        <div class=" row mt-5 ml-4" >
            <p >{{$project->description}}</p>

        </div>


        <div class="  mt-5 ml-4" >
            <h4 class="mb-3 ">Components</h4>

            @if($project->components==NULL) <p>No components are found</p>
            @else <p>{{$project->components}}</p>
            @endif

        </div>


        <div class="  mt-5 ml-4" >
            <h4 class="mb-3 ">Components Images</h4>

            @if($project->components_imgs==NULL) <p>No components images are found</p>

            @else
                <div class="row justify-content-center" >

                    @foreach(explode('|', $project->components_imgs) as $img)
                        <img style=" width: 250px; height: 250px; display:block; " class="mt-3 mb-3 col-5 " src="/storage/images/{{$img}}" >
                    @endforeach

                </div>
            @endif


        </div>



        <div class=" mt-5 ml-4" >
            <h4 class="mb-3">Steps</h4>
            @if($project->steps==NULL) <p>No steps are found</p>
            @else <p>{{$project->steps}}</p>
            @endif

        </div>



        <div class="  mt-5 ml-4" >
            <h4 class="mb-3 ">Design Images</h4>

            @if($project->design_imgs==NULL) <p>No design images are found</p>

            @else
                <div class="row justify-content-center" >

                    @foreach(explode('|', $project->design_imgs) as $img)
                        <img style=" width: 250px; height: 250px; display:block; " class="mt-3 mb-3 col-5 " src="/storage/images/{{$img}}" >
                    @endforeach

                </div>
            @endif


        </div>



        <div class="  mt-5 ml-4" >
            <h4 class="mb-3 ">PCB Images</h4>

            @if($project->pcb_imgs==NULL) <p>No pcb images are found</p>

            @else
                <div class="row justify-content-center" >

                    @foreach(explode('|', $project->pcb_imgs) as $img)
                        <img style=" width: 250px; height: 250px; display:block; " class="mt-3 mb-3 col-5 " src="/storage/images/{{$img}}" >
                    @endforeach

                </div>
            @endif


        </div>


        <div class=" mt-5 ml-4" >
            <h4 class="mb-3">Source Code</h4>
            @if($project->code==NULL) <p>No source code is found</p>
            @else <p>{{$project->code}}</p>
            @endif

        </div>



        <div class="  mt-5 ml-4" >
            <h4 class="mb-3 ">Final Project Images</h4>

            @if($project->project_imgs==NULL) <p>No project images are found</p>

            @else
                <div class="row justify-content-center" >

                    @foreach(explode('|', $project->project_imgs) as $img)
                        <img style=" width: 250px; height: 250px; display:block; " class="mt-3 mb-3 col-5 " src="/storage/images/{{$img}}" >
                    @endforeach

                </div>
            @endif

        </div>



        <div class=" mt-5 ml-4" >
            <h4 class="mb-3">Link</h4>
            @if($project->link==NULL) <p>No link is found</p>
            @else <p>{{$project->link}}</p>
            @endif
        </div>


        <div class=" mt-5 ml-4" >
            <h4 class="mb-3">Video Link</h4>
            @if($project->video_link==NULL) <p>No video link is found</p>
            @else  <p>{{$project->video_link}}</p>
            @endif
        </div>




        <div class=" mb-1 row justify-content-center ">

            <div class="col-4"></div>

            <div class=" col-1">
                <a href="/projects/{{$project->id}}/edit" class="btn btn-primary">Edit </a>
            </div>

            <div class=" col-1 ">
                {!!Form::open(['action'=> ['AdminProjectController@destroy', $project->id],'method' => 'POST', 'class' => 'pull-right' ])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger '])}}
                {!!Form::close()!!}
            </div>

            <div class="col-4"></div>

        </div>




</div>
</div>


@endsection
