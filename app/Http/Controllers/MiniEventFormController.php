<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\InternalParticipant;
use App\Traits\GeneralTrait;

class MiniEventFormController extends Controller
{
    // use Response;

    use GeneralTrait;

    public function index(){
        $participants = Participant::all();
        return $this -> returnData('participants',$participants,'Don');
    }



    public function postpartispant(Request $request){
        $participant = new Participant;
        $participant->name = $request->input('name') ;
        $participant->phone = $request->input('phone') ;
        $participant->email = $request->input('email') ;
        $participant->university = $request->input('university') ;
        $participant->study_year = $request->input('studyYear') ;
        $participant->course1_id = $request->input('courseId1') ;
        $participant->course2_id = $request->input('courseId2') ;
        $participant->save();


        return $this->returnData("participant",$participant,"Done");
        // $participants = Participant::find($request -> id);
        // return "done submited";

    }

    public function postInternalPartispant(Request $request){
        $intparticipant = new InternalParticipant;
        $intparticipant->name = $request->input('name') ;
        $intparticipant->phone = $request->input('phone') ;
        $intparticipant->committee = $request->input('committee') ;
        $intparticipant->first_course = $request->input('courseId1') ;
        $intparticipant->sec_course = $request->input('courseId2') ;
        $intparticipant->save();

        return $this->returnData("inernal_participant",$intparticipant,"Done");
    }
}
