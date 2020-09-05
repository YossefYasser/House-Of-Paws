<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        

    {   
        $posts = Post::orderBy("id","desc")->get();
        return  view("posts.index", compact("posts"));
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= auth()->user();
        return view("posts.create")->with("user",$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $user = auth()->user();

        $request->validate(
        [
            "title"=>"required|max:50",
            "body"=>"required|max:144",
             "featured"=>"required|image",
             "category"=>"required",


        ]);
        $featured = $request -> featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts',$featured_new_name);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->body = $request->body;
        $post->category = $request->category;
        $post->user_id = $user->id;
        $post->sex = $request->sex;
        $post->path = "upload/posts/".$featured_new_name;
        $post->save();
        /*
        ________________
        
        display errors
        ________________
        
        Post::create($request->all());
        // $user = auth()->user();
        // $id= $user->id;
        
        $post = new Post;
        $post->title = $request->title
        return redirect("/posts");
        
        */
        /*
        $ImageName = $_FILES['file']['name'];
        $fileElementName = 'file';
        $path = public_path('images');
        $location = $path . $_FILES['file']['name']; 
        move_uploaded_file($_FILES['file']['tmp_name'], $location);
        
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->path = $_FILES["file"]["name"];
        $post->save();
        return redirect("/posts");
        */

        
        
         
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);
        
        return view("posts.show", compact("posts"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
         
         return view ("posts.edit")->with("post",$post);
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
        $post = Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hdelete($id)
    {
        $post = Post::withTrashed()->whereId($id)->first();
        $post->forceDelete();
        
        return redirect("/posts");

    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete(); 
        return redirect("/posts");

    }
}
