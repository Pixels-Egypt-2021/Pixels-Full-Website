<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsors;
use App\Http\Resources\Sponsor as SponsorResource;

use App\Traits\GeneralTrait;

class SponsorController extends Controller
{

    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // get sponsors
          $sponsors = Sponsors::all();

          // Return collection of sponsors as a resource
         return $this -> returnData("sponsors",$sponsors,"success");
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
        $sponsor = $request->isMethod('put') ? Sponsors::findOrFail($request->id) : new Sponsors;

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


        $sponsor->name = $request->input('name');
        $sponsor->deal = $request->input('deal');
        $sponsor->img = $fileNameToStore;


        // to differ between update and store cases
        if($sponsor->save())
        {
            return new SponsorResource($sponsor);
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
         // get sponsor
         $sponsor = Sponsors::findOrFail($id);

         // return a single sponsor as a resource
         return new SponsorResource($sponsor);
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
         // get sponsor
         $sponsor = Sponsors::findOrFail($id);

         if($sponsor->delete()){
         return new SponsorResource($sponsor);
         }
    }
}
