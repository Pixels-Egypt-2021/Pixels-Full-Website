<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Get all events
         $events = Events::all();

         //return the view with the events
         return view('events.index')-> with ('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request validations
        $this->validate($request,[
            'name'=> 'required' ,
            'description'=> 'required' ,
            'year'=> 'required' ,
            'img' => 'image|nullable|max:1999'
        ]);

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




        $event = new Events;

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->year = $request->input('year');
        $event->season_term = $request->input('term');
        $event->participants_no = $request->input('participants');
        $event->sessions_no = $request->input('sessions');
        $event->flyers_no = $request->input('flyers');
        $event->courses_no = $request->input('courses');
        if($request->hasFile('img')){
        $event->img = $fileNameToStore;
        }
        $event->video_link = $request->input('video_link');


       $event->save();

       return redirect('/events')->with('success','Event is Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the events
        $event = Events::find($id);

        // return the view with the event data
        return view('events.edit')->with('event',$event);

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
        $this->validate($request,[
            'name'=> 'required' ,
            'description'=> 'required' ,
            'img' => 'image|nullable|max:1999'
        ]);

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

        // update the event with id
        $event = Events::find($id);


        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->year = $request->input('year');
        $event->season_term = $request->input('term');
        $event->participants_no = $request->input('participants');
        $event->sessions_no = $request->input('sessions');
        $event->flyers_no = $request->input('flyers');
        $event->courses_no = $request->input('courses');
        if($request->hasFile('img')){
            $event->img = $fileNameToStore;
        }
        $event->video_link = $request->input('video_link');

        $event->save();

        return redirect('/events')->with('success','Event is Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the event
        $event = Events::find($id);

      $event -> delete();
      return redirect('/events')->with('success','Event is Deleted');
    }
}
