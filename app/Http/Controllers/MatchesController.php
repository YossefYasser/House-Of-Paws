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

           $friends[] = $match->friend_id;
           $username = DB::select("select name from users where id = '$friends'");
           foreach($username as $friendName){
            $users[] = $friendName->name;
        }
 }  

       return view('matches')->with("friends", $friends)->with("users",$users);
    }
    
}
