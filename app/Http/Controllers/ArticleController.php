<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Http\Resources\Article as ArticleResource;
use App\Traits\GeneralTrait;


class ArticleController extends Controller
{
    use GeneralTrait ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Get articles
         $articles = Articles::all();

         // Return collection of articles as a resource
        if(!$articles)
            return $this -> returnError("001","failed to feach data");
        
        return $this -> returnData("articles",$articles,"Success");

        return ArticleResource::collection($articles);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $article = $request->isMethod('put') ? Articles::findOrFail($request->article_id) : new Articles;


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

        $article->title = $request->input('title');
        $article->sub_title = $request->input('sub_title');
        $article->body = $request->input('body');
        $article->img = $fileNameToStore;
        $article->video_link = $request->input('video_link');


        // to differ between store and update casese
        if($article->save())
        {
            return new ArticleResource($article);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // get article
        $article = Articles::find($request ->id);

        // return a single article as a resource
        return $this -> returnData("article",$article,"success");

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
        // get article
        $article = Articles::findOrFail($id);

        if($article->delete()){
        return new ArticleResource($article);
        }
    }


}
