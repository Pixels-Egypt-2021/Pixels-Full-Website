<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\subscription;
use App\Http\Resources\subscription as subscriptionResource;

class subscriptionController extends Controller
{

    public function send_email()
    {

        $subscribers = subscription::select('email')->get()->toArray();

        $emails = ['jessyzayeed93@gmail.com', 'hassanoscar128@gmail.com'];

     //$emails = explode(",", $emailss);


            if( Mail::raw('Tested Mail From Pixels Egypt', function ($message) use ($emails){

                $message->to($emails)->subject('Testing Mail From Pixels Egypt');

            }))



            var_dump( Mail:: failures());

            //Mail::to($subscriber)->send(new SendMail("Tested Mail From Pixels Egypt"));

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Get subscripers
         $subscribers = subscription::all();

         // Return collection of articles as a resource
        return subscriptionResource::collection($subscribers);
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
          // request validations
          $this->validate($request,[
            'name'=> 'required' ,
            'email' => 'required'
        ]);

        $subscriber = new subscription;
        $subscriber->name  = $request->input('name');
        $subscriber->email = $request->input('email');
        $subscriber->save();

        return new subscriptionResource($subscriber);
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
        $subscriber = Subscription::find($id);

        if($subscriber->delete()){
            return new subscriptionResource($subscriber);
            }
    }
}
