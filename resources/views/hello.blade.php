<?php
use Illuminate\Support\Facades\DB;
$user = auth()->user();
 $matches= DB::select("select friend_id from friends where user_id ='$user->id'");
    $hi = array();
      foreach($matches as $match) { 
         $hi[] = $match->friend_id;
      } 
      foreach($hi as $key => $value)
{
  echo $key." has the value". $value ."<br>";
  $value = DB::select("select name from users where '$value' = id ");

  
}
?>