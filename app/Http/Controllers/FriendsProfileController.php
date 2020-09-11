<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Hashids\Hashids;

class FriendsProfileController extends Controller
{
    public function index($id)
        

    {   
        
        $hashids = new Hashids();
        $idDecode =$hashids->decode($id); 
        $user = user::findOrFail($idDecode[0]);
        $post=$user->post()->get()->first();
        return  view("FriendsProfile")->with("user",$user)->with("post",$post);
        

        
    }

}
