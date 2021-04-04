<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Get projects
         $projects = Projects::all();

         //return the view with the projects
         return view('projects.index')-> with ('projects', $projects);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
            'title' => 'required',
            'description' => 'required'
        ]);


        // Handle File Upload
        if($request->hasFile('components_imgs')){

            foreach($request->file('components_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file1NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file1NameToStore);
            $components_imgs[] = $file1NameToStore;
            }
        }

              else {
                  $file1NameToStore = 'noimage.jpg';
              }




              // Handle file upload
              if($request->hasFile('design_imgs')){

                foreach($request->file('design_imgs') as $image){

                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // File name to store
                $file2NameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $image->storeAs('public/images', $file2NameToStore);
                $design_imgs[] = $file2NameToStore;
                }
            }

                  else {
                      $file2NameToStore = 'noimage.jpg';
                  }





        // Handle File Upload
        if($request->hasFile('pcb_imgs')){

            foreach($request->file('pcb_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file3NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file3NameToStore);
            $pcb_imgs[] = $file3NameToStore;
            }
        }

              else {
                  $file3NameToStore = 'noimage.jpg';
              }





        // Handle File Upload
        if($request->hasFile('project_imgs')){

            foreach($request->file('project_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file4NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file4NameToStore);
            $project_imgs[] = $file4NameToStore;
            }
        }

              else {
                  $file4NameToStore = 'noimage.jpg';
              }


        $project = new Projects;

        $project->name = $request->input('name');
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->components = $request->input('components');

        if($request->hasFile('components_imgs')){
        $project->components_imgs = implode("|", $components_imgs);
        }


        if($request->hasFile('design_imgs')){
        $project->design_imgs = implode("|", $design_imgs);
        }


        if($request->hasFile('pcb_imgs')){
        $project->pcb_imgs = implode("|", $pcb_imgs);
        }

        $project->steps = $request->input('steps');
        $project->code = $request->input('code');
        $project->link = $request->input('link');


        if($request->hasFile('project_imgs')){
        $project->project_imgs = implode("|", $project_imgs);
        }

        $project->video_link = $request->input('video_link');

       $project->save();

       return redirect('/projects')->with('success','Project is Created');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the project
        $project = Projects::find($id);

         // return the view with this project data
         return view('projects.show')->with('project',$project);
    }








    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the project
         $project = Projects::find($id);

         // return the view with the project data
         return view('projects.edit')->with('project',$project);
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
            'title' => 'required',
            'description' => 'required'
        ]);


        // Handle File Upload
        if($request->hasFile('components_imgs')){

            foreach($request->file('components_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file1NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file1NameToStore);
            $components_imgs[] = $file1NameToStore;
            }
        }

              else {
                  $file1NameToStore = 'noimage.jpg';
              }




              // Handle file upload
              if($request->hasFile('design_imgs')){

                foreach($request->file('design_imgs') as $image){

                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                // File name to store
                $file2NameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $image->storeAs('public/images', $file2NameToStore);
                $design_imgs[] = $file2NameToStore;
                }
            }

                  else {
                      $file2NameToStore = 'noimage.jpg';
                  }





        // Handle File Upload
        if($request->hasFile('pcb_imgs')){

            foreach($request->file('pcb_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file3NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file3NameToStore);
            $pcb_imgs[] = $file3NameToStore;
            }
        }

              else {
                  $file3NameToStore = 'noimage.jpg';
              }





        // Handle File Upload
        if($request->hasFile('project_imgs')){

            foreach($request->file('project_imgs') as $image){

            // Get filename with the extension
            $filenameWithExt = $image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just ext
            $extension = $image->getClientOriginalExtension();
            // File name to store
            $file4NameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $image->storeAs('public/images', $file4NameToStore);
            $project_imgs[] = $file4NameToStore;
            }
        }

              else {
                  $file4NameToStore = 'noimage.jpg';
              }



              $project = Projects::find($id);


              $project->name = $request->input('name');
              $project->title = $request->input('title');
              $project->description = $request->input('description');
              $project->components = $request->input('components');

              if($request->hasFile('components_imgs')){
              $project->components_imgs = implode("|", $components_imgs);
              }


              if($request->hasFile('design_imgs')){
              $project->design_imgs = implode("|", $design_imgs);
              }


              if($request->hasFile('pcb_imgs')){
              $project->pcb_imgs = implode("|", $pcb_imgs);
              }

              $project->steps = $request->input('steps');
              $project->code = $request->input('code');
              $project->link = $request->input('link');


              if($request->hasFile('project_imgs')){
              $project->project_imgs = implode("|", $project_imgs);
              }

              $project->video_link = $request->input('video_link');




              $project->save();

        return redirect('/projects')->with('success','Project Is Updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the project
        $project = Projects::find($id);

      $project -> delete();
      return redirect('/projects')->with('success','project is Deleted');
    }
}
