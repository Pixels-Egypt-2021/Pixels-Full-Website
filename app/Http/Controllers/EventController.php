<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get events
        $events = Events::all();

        // Return collection of events as a resource
       return EventResource::collection($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // to determine whether to store or update
        $event = $request->isMethod('put') ? Events::findOrFail($request->id) : new Events;

         // Handle File Upload
         if($request->hasFile('img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);

              }
              else {
                  $fileNameToStore = 'noimage.jpg';
              }

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->year = $request->input('year');
        $event->season_term = $request->input('season_term');
        $event->participants_no = $request->input('participants_no');
        $event->sessions_no = $request->input('sessions_no');
        $event->flyers_no = $request->input('flyers_no');
        $event->courses_no = $request->input('courses_no');
        $event->img = $fileNameToStore;
        $event->video_link = $request->input('video_link');

        // to differ between store and update casese
        if($event->save())
        {
            return new EventResource($event);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get event
        $event = Events::findOrFail($id);

        // return a single event as a resource
        return new EventResource($event);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // get event
         $event = Events::findOrFail($id);

         if($event->delete()){
         return new EventResource($event);
         }
    }
}
