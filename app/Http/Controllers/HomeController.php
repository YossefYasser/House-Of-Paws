<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $id = auth()->user()->id;
        $post= $user->post()->get();
        $species="";
        $postat = DB::select("select post_id from seens  where user_id = '$user->id' ") ;
        $seenposts=array();
           foreach($postat as $postt )
           {    
               $seenposts[]=$postt->post_id;

           }
        if(count($post)> 0){
           $species=$post[0]["species"];
           return view('home')->with("posts",$posts)->with("species",$species)->with("user",$user)->with("seenposts",$seenposts);
        }
    
        
        return view('home')->with("posts",$posts)->with("user",$user)->with("seenposts",$seenposts)->with("species",$species);
    }
   
    public function likeInsert(request $request){
        //search in likes table if user_from liked user_to before
        $likes= DB::select("select* from likes where user_to = '$request->userid' and user_from ='$request->usertoid'") ;
        if (! empty($likes)){
            DB::insert("insert into friends(user_id,friend_id)values('$request->userid','$request->usertoid')");
            DB::insert("insert into friends(user_id,friend_id)values('$request->usertoid','$request->userid')");
            DB::delete("delete from likes where user_to = '$request->userid' and user_from ='$request->usertoid'");
        }
        else{
            $like = new Likes;
            $like->user_to = $request->usertoid;
            $like->user_from = $request->userid;
            $like->save();

        }
          
        $seen = new Seen;
        $seen->user_id = $request->userid;
        $seen->post_id = $request->postid;
        $seen->save();
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
