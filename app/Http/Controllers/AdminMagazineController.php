<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;

class AdminMagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all articles
        $magazine = Magazine::all();

        //return the view with the articles
        return view('magazine.index')-> with ('articles', $magazine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magazine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request validations
        $this->validate($request,[
            'title'=> 'required' ,
            'body' => 'required' ,
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
            // Store image in the images folder (Upload Image)
            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);


              }
              else {
                  $fileNameToStore = 'noimage.jpg';
              }




        $magazine = new Magazine;

        $magazine->title = $request->input('title');
        $magazine->sub_title = $request->input('sub_title');
        $magazine->body = $request->input('body');
        if($request->hasFile('img')){
        $magazine->img = $fileNameToStore;
        }
        $magazine->video_link = $request->input('video_link');

       $magazine->save();

       return redirect('/magazine')->with('success','Article is Created');


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
         // get the article
         $magazine = Magazine::find($id);

         // return the view with the article data
         return view('magazine.edit')->with('article',$magazine);
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
            'title'=> 'required' ,
            'body' => 'required' ,
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


        // update the article with id
        $magazine = Magazine::find($id);
        $magazine->title = $request->input('title');
        $magazine->sub_title = $request->input('sub_title');
        $magazine->body = $request->input('body');
        if($request->hasFile('img')){
            $magazine->img = $fileNameToStore;
        }
        $magazine->video_link = $request->input('video_link');
        $magazine->save();

        return redirect('/magazine')->with('success','article is Created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the article
        $magazine = Magazine::find($id);

        $magazine -> delete();
        return redirect('/magazine')->with('success','Article is Deleted');
    }
}
