<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProjectDetails ;
use App\Models\ProjectsContent;
use App\Traits\GeneralTrait;

class ProjectAdminController extends Controller
{
    use GeneralTrait ;

    public function getProjects() {
        $projects = ProjectDetails::all();


        if(!$projects)
            return returnError("001","failed");

        return $this -> returnData("project",$projects,"success request");
    }

    public function getProjectsContent() {

        $projects = ProjectsContent::all();


        if(!$projects)
            return returnError("001","failed");

        return $this -> returnData("project",$projects,"success request");
    }

    public function store(Request $request){
        $project = new ProjectDetails ;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->img = $request->img;
        $project->save();

        if(!$project)
            return $this -> returnError("001","failed");

        return $this -> returnData("project",$project,"Data sented");
    }

    public function getProjectDetailsById(Request $request){

        $projectId = $request->id;
        $project = ProjectDetails::find( $projectId );

        if(!$project)
            return $this -> returnError("001","failed");

        return $this -> returnData("project",$project,"Data sented");
    }

    public function storeContent(Request $request){
        $project = new ProjectsContent ;
        $project->sec_title = $request->title;
        $project->title_link = $request->title_link;
        $project->body = $request->body;
        $project->section_imgs = $request->img;
        $project->code = $request->code;
        $project->program_lang = $request->code_lang;
        $project->video_link = $request->video_link;
        $project->project_id = $request->project_id;
        $project->save();

        if(!$project)
            return returnError("001","failed");

        return $this -> returnData("project",$project,"Data sented");
    }
}
