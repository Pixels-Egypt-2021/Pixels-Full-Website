                                    <!-- table -->


@extends('layouts.app')

@section('content')

    <a href="/events/create" class="btn btn-dark mt-2 ">New Event</a>

    <div class="row justify-content-center " style="width:fit-content;">
        <h3 class="mt-3 mb-2">Your Events</h3>

        <div class="card bg-dark text-light mt-3">

          <div class="">


                   @if(count($events) > 0)
                   <div>
                      <table class="table table-striped table-dark ">
                         <tr>
                            <th>Event Name</th>
                            <th>Description</th>
                            <th>Year</th>
                            <th>Term</th>
                            <th >Participants Number</th>
                            <th>Sessions Number</th>
                            <th>Flyers Number</th>
                            <th>Courses Number</th>
                            <th>Image</th>
                            <th>Video Link</th>
                            <th>Edit</th>
                            <th>Delete</th>

                          </tr>

                            @foreach ($events as $event)
                              <tr>
                                <th>{{$event->name}}</th>
                                <th >{{$event->description}}</th>
                                <th >{{$event->year}}</th>
                                <th >{{$event->season_term}}</th>
                                <th >{{$event->participants_no	}}</th>
                                <th >{{$event->sessions_no}}</th>
                                <th >{{$event->flyers_no}}</th>
                                <th >{{$event->courses_no}}</th>

                                <th><img style=" width: 50px; height: 50px;" src="/storage/images/{{$event->img}}" ></th>
                                <th ><a href="{{$event->video_link}}">{{$event->video_link}}</a></th>

                                <th > <a href="/events/{{$event->id}}/edit" class="btn btn-light">Edit</a></th>

                                <th>
                                    {!!Form::open(['action'=> ['AdminEventController@destroy', $event->id],'method' => 'POST', 'class' => 'pull-right' ])!!}
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
