<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

use App\Traits\GeneralTrait;

class AdminArticleController extends Controller
{
    use GeneralTrait ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all articles
        $articles = Articles::all();

        //return the view with the articles
        return view('articles.index')-> with ('articles', $articles);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'title'=> 'required' ,
            'body' => 'required' ,
            'img' => 'image|nullable|max:1999'
        ]);


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
            // Store the image in the images folder (upload)
            $path = $request->file('img')->storeAs('public/images', $fileNameToStore);

              }
              else {
                  $fileNameToStore = 'noimage.jpg';
              }



        $article = new Articles;

        $article->title = $request->input('title');
        $article->sub_title = $request->input('sub_title');
        $article->body = $request->input('body');
        $article->img = $fileNameToStore;
        $article->video_link = $request->input('video_link');

       $article->save();

       return redirect('/articles')->with('success','Article is Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $article = Articles::find($id);

        return $this -> returnData("article" , $article ,"success");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the article
        $article = Articles::find($id);

        // return the view with the article data
        return view('articles.edit')->with('article',$article);
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
            'title'=> 'required' ,
            'body' => 'required' ,
            'img' => 'image|nullable|max:1999'
        ]);

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


        // update the article with id
        $article = Articles::find($id);
        $article->title = $request->input('title');
        $article->sub_title = $request->input('sub_title');
        $article->body = $request->input('body');
        if($request->hasFile('img')){
            $article->img = $fileNameToStore;
        }
        $article->video_link = $request->input('video_link');
        $article->save();

        return redirect('/articles')->with('success','article is Updated');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the article
    $article = Articles::find($id);

      $article -> delete();
      return redirect('/articles')->with('success','Article is Deleted');
    }


}
