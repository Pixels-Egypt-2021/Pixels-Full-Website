                                    <!-- table -->


@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/sponsors/create" class="btn btn-dark mt-2 ">New Sponsor</a>

    <div class="row justify-content-center " style="width:fit-content;">
        <h3 class="mt-3 mb-2">Your Sponsors</h3>
        <div class="card bg-dark text-light mt-3">

          <div class="card-body">


                   @if(count($sponsors) > 0)
                   <div>
                      <table class="table table-striped table-dark ">
                         <tr>
                            <th>Organization Name</th>
                            <th>Organization Logo</th>
                            <th>Deal Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>

                            @foreach ($sponsors as $sponsor)
                              <tr>
                                <th>{{$sponsor->name}}</th>
                                <th><img style=" width: 50px; height: 50px;" src="/storage/images/{{$sponsor->img}}" ></th>
                                <th>{{$sponsor->deal}}</th>


                                <th> <a href="/sponsors/{{$sponsor->id}}/edit" class="btn btn-light">Edit</a></th>

                                <th>
                                    {!!Form::open(['action'=> ['AdminSponsorController@destroy', $sponsor->id],'method' => 'POST', 'class' => 'pull-right' ])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>
                           </tr>
                       @endforeach
              </table>
             @else
             <p> you have no sponsors</p>
             @endif
           </div>

       </div>
      </div>
   </div>
@endsection
