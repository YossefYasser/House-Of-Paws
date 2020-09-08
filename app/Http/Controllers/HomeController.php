<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\user;
use App\likes;

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
   
    public function insert(){
        $like = new Likes;
        $like->user_to = "1";
        $like->user_from = "2";

        $like->save();
        return response()->json(['success'=>'Data is successfully added']);

    }

}
