<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;
use App\Http\Resources\Magazine as MagazineResource;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get magazine
        $magazine = Magazine::all();

        // Return collection of magazine as a resource
       return MagazineResource::collection($magazine);

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
        $magazine = $request->isMethod('put') ? Magazine::findOrFail($request->article_id) : new Magazine;


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



        $magazine->title = $request->input('title');
        $magazine->sub_title = $request->input('sub_title');
        $magazine->body = $request->input('body');
        $magazine->img = $fileNameToStore;
        $magazine->video_link = $request->input('video_link');

        // to differ between store and update casese
        if($magazine->save())
        {
            return new MagazineResource($magazine);
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
        // get magazine elemnet
        $magazine = Magazine::findOrFail($id);

        // return a single magazine element as a resource
        return new MagazineResource($magazine);
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
        // get magazine element
        $magazine = Magazine::findOrFail($id);

        if($magazine->delete()){
        return new MagazineResource($magazine);
        }
    }
}
