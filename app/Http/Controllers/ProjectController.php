<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Models\ProjectsContent;
use App\Http\Resources\Project as ProjectResource;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // get projects
          $projects = ProjectsContent::all();

          // Return collection of projects as a resource
         return ProjectResource::collection($projects);
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
        $project = $request->isMethod('put') ? Projects::findOrFail($request->id) : new Projects;


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




        $project->name = $request->input('name');
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->components = $request->input('components');
        $project->components_imgs = $file1NameToStore;
        $project->design_imgs = $file2NameToStore;
        $project->pcb_imgs = $file3NameToStore;
        $project->steps = $request->input('steps');
        $project->code = $request->input('code');
        $project->link = $request->input('link');
        $project->project_imgs = $file4NameToStore;
        $project->video_link = $request->input('video_link');

        // to differ between store and update casese
        if($project->save())
        {
            return new ProjectResource($project);
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
         // get project
         $project = Projects::findOrFail($id);

         // return a single project as a resource
         return new ProjectResource($project);

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
        // get project
        $project = Projects::findOrFail($id);

        if($project->delete()){
        return new ProjectResource($project);
        }
    }
}
