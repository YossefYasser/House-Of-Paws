<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    //
    public function showMatches(){
       $user = auth()->user()->id;
       $matches = DB::select("select friend_id from friends where user_id ='$user'");
       $friends = array();
       $users = array();
       foreach($matches as $match){

           
           $users[] = DB::select("select name,id from users where id = '$match->friend_id;'");
           
        };
       return view('matches')->with("friends", $friends)->with("users",$users);
    }
    
}
