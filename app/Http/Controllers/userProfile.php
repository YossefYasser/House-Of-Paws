<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use App\seen;


class userProfile extends Controller
{
    public function index()
    {   
        $user = auth()->user();
        $post= $user->post()->get()->first();
        return view('profile')->with("post",$post)->with("user",$user);
    }
   
}
