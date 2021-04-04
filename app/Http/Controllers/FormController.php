<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;


class FormController extends Controller
{
    public function index() {
        $data = Form::all();
        return view('attackOnPixels');
        return $data;
    }
    public function post(Request $request) {

        $rules = [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required',
            'univ' => 'required',
            'dep' => 'required',
            'acYear' => 'required',
            'preVolu' => 'required',
            'aboutPixels' => 'required',
            'committee' => 'required',
            'aboutCommitte' => 'required',
            'quesOne' => 'required',
            'quesTwo' => 'required',
            'secCommitte' => 'required',
        ];

        $messages = [
            'name.required' => 'Name is required',
            'name.min' => 'Please provide youe full name ',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email',
            'phone.required' => 'Please provide a valid phone',
            'univ.required' => 'Please provide your univirsty',
            'dep.required' => 'Please provide your department',
            'acYear.required' => 'Please provide your academic  year',
            'preVolu.required' => 'Mention to the previos student activity',
            'aboutPixels.required' => 'Please tell us bout pixels',
            'committee.required' => 'Please choose a valid answer',
            'aboutCommitte.required' => 'Please tell us about this committee',
            'quesOne.required' => 'Tish field is required',
            'quesTwo.required' => 'Tish field is required',
            'secCommitte.required' => 'Please choose a valid answer',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->flash());
        }

        $form = new Form;
        $form->name = $request->input('name') ;
        $form->email = $request->input('email') ;
        $form->phone = $request->input('phone') ;
        $form->univ = $request->input('univ') ;
        $form->dep = $request->input('dep') ;
        $form->acYear = $request->input('acYear') ;
        $form->preVolu = $request->input('preVolu') ;
        $form->aboutPixels = $request->input('aboutPixels') ;
        $form->committee = $request->input('committee') ;
        $form->aboutComm = $request->input('aboutCommitte') ;
        $form->quesOne = $request->input('quesOne') ;
        $form->quesTwo = $request->input('quesTwo') ;
        $form->secCommitte = $request->input('secCommitte') ;
        $form->save();

        return redirect()->to('home');
    }

    public function getAllData () {
        $secRectute = Form::all();
        return view('allData')->with('data',$secRectute) ;
    }
}
