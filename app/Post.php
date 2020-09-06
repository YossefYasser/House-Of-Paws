<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
 
 
 protected $fillable =[
"title","body",'user_id',"path","sex","category",

     'name',
     'gender',
     'species',
     'content',
     'image',
 ];


 public function user(){
    return $this->belongsTo("App\user");

}
 public function getFeaturedAttribuute($featured){
 return asset($featured);
 }
}
 
