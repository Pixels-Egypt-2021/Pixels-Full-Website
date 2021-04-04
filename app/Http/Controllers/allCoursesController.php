<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Traits\GeneralTrait;


class allcoursesController extends Controller
{
    use GeneralTrait;

    public function index() {
        $courses = Course::all() ;
        if(!$courses)
            return $this -> returnEror('001' , 'field');

        return $this -> returnData('courses', $courses , 'Done');
    }
    
    public function getById(Request $request) {
        $course = Course::selection()->find($request->id);
        return response()->json($course);
        
    }
}
