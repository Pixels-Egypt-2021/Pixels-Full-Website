                                    <!-- table -->


@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/magazine/create" class="btn btn-dark mt-2 ">Create Article</a>

    <div class="row justify-content-center " style="width:fit-content;">
        <h3 class="mt-3 mb-2">Your Articles</h3>
        <div class="card bg-dark text-light mt-3">

          <div class="card-body">


                   @if(count($articles) > 0)
                   <div>
                      <table class="table table-striped table-dark ">
                         <tr>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Body</th>
                        <th>Image</th>
                        <th >Video Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                          </tr>

                            @foreach ($articles as $article)
                              <tr>
                                <th>{{$article->title}}</th>
                                <th>{{$article->sub_title}}</th>
                                <th class="col-6">{{$article->body}}</th>
                                <th><img style=" width: 50px; height: 50px;" src="/storage/images/{{$article->img}}" ></th>
                                <th ><a href="{{$article->video_link}}">{{$article->video_link}}</a></th>

                                <th > <a href="/magazine/{{$article->id}}/edit" class="btn btn-light">Edit</a></th>

                                <th>
                                    {!!Form::open(['action'=> ['AdminMagazineController@destroy', $article->id],'method' => 'POST', 'class' => 'pull-right' ])!!}
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
