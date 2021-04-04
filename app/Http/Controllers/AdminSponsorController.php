<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsors;
class AdminSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Get the sponsors
         $sponsors = Sponsors::all();

         //return the view with the sponsors
         return view('sponsors.index')-> with ('sponsors', $sponsors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsors.create');
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
            'deal'=> 'required' ,
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




        $sponsor = new Sponsors;

        $sponsor->name = $request->input('name');

        if($request->hasFile('img')){
        $sponsor->img = $fileNameToStore;
        }

        $sponsor->deal = $request->input('deal');

       $sponsor->save();

       return redirect('/sponsors')->with('success','Sponsor is added');


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
        // get the sponsor
        $sponsor = Sponsors::find($id);

        // return the view with the sponsor data
        return view('sponsors.edit')->with('sponsor',$sponsor);
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
            'deal' => 'required' ,
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


        $sponsor = Sponsors::find($id);
        $sponsor->name = $request->input('name');

        if($request->hasFile('img')){
            $sponsor->img = $fileNameToStore;
        }
        $sponsor->deal = $request->input('deal');
        $sponsor->save();

        return redirect('/sponsors')->with('success','sponsor is Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the sponsor
        $sponsor = Sponsors::find($id);

        $sponsor -> delete();
        return redirect('/sponsors')->with('success','Sponsor is deleted');
    }
}
