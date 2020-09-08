<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\user;
use App\likes;
use App\seen;

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
    {   $posts = Post::all();
        $user = auth()->user();
        $post= $user->post()->get();
        $species="";
        if(count($post)> 0){
           $species=$post[0]["species"];
           return view('home')->with("posts",$posts)->with("species",$species)->with("user",$user);
        }
    
         
        return view('home')->with("posts",$posts)->with("user",$user)->with("species",$species);
    }
   
    public function likeInsert(request $request){
        $like = new Likes;
        $like->user_to = $request->usertoid;
        $like->user_from = $request->userid;
        $seen = new Seen;
        $seen->user_id = $request->userid;
        $seen->post_id = $request->postid;
        $seen->save();
        $like->save();
        return response()->json(['success'=>'Data is successfully added']);
    }
    public function seenInsert(request $request){
        $seen = new Seen;
        $seen->user_id = $request->userid;
        $seen->post_id = $request->postid;

        $seen->save();
        return response()->json(['success'=>'Data is successfully added']);
    }
    

}
