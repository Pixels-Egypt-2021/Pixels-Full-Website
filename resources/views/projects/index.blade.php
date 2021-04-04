                                    <!-- table -->
@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/projects/create" class="btn btn-dark mt-2 ">Add project</a>

    <div class="row justify-content-center " style="width:fit-content;">
        <h3 class="mt-3 mb-2">Your Projects</h3>
        <div class="card bg-dark text-light mt-3">

          <div class="card-body">


                   @if(count($projects) > 0)
                   <div>
                      <table class="table table-striped table-dark ">
                         <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                          </tr>

                            @foreach ($projects as $project)
                              <tr>

                                <th>{{$project->name}}</th>
                                <th>{{$project->title}}</th>
                                <th>{{$project->description}}</th>


                                <th > <a href="/projects/{{$project->id}}" class="btn btn-light">Show</a></th>

                                <th > <a href="/projects/{{$project->id}}/edit" class="btn btn-primary">Edit</a></th>

                                <th>
                                    {!!Form::open(['action'=> ['AdminProjectController@destroy', $project->id],'method' => 'POST', 'class' => 'pull-right' ])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>


                           </tr>
                       @endforeach
              </table>
             @else
             <p> you have no posts</p>
             @endif
           </div>

       </div>
      </div>
   </div>
@endsection
