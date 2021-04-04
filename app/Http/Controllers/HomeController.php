<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Participant;
use App\Models\InternalParticipant;
use App\Models\Course;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        if(isset($_GET['id'])){
            $search = $_GET['id'];
            if($search=="internal"){
                $Participants = InternalParticipant::all();
                $search = "internal";
            }else{
                $Participants = Participant::where('course1_id','=',$search)
                ->orWhere('course2_id','=',$search)
                ->get();
                $search = Course::find($search);
            }
            
        }else {
            $Participants = Participant::all();
            $search = "all";
        }

        return view('home')->with(['participants'=> $Participants,'courses'=>$courses , 'search'=>$search]);
    }
}
