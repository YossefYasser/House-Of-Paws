<?php

use Illuminate\Support\Facades\Route;

use App\Post;
use App\user;


Auth::routes();


Route::get('/', function () {
    return view('welcome');
});
Route::get('/notify', function () {
//     $userto = User::find(1);
//     $userfrom=User::find(2);
//    Notification::send($userto, new \App\Notifications\PostNewNotification($userfrom));
// $user=  User::find(1);
// foreach($user->notifications as $noti){
//     print_r($noti->data["id"]); // lw 3ayz t access el id
    
//     echo "<br>";
// }

$userto =User::find($request->userid);
$userfrom=User::find($request->usertoid);
Notification::send($userto, new \App\Notifications\PostNewNotification($userfrom));

$userfrom =User::find($request->userid);
$userto=User::find($request->usertoid);
Notification::send($userto, new \App\Notifications\PostNewNotification($userfrom));
});

Route::group(['middleware'=>['auth']],function(){
 Route::resource("/posts","PostsController");
 Route::get('/profile', 'userProfile@index')->name('profile');
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/likeInsert', 'HomeController@likeInsert')->name('likeInsert');
 Route::get('/insert', 'HomeController@seenInsert')->name('insert');

 Route::get("/posts/create","PostsController@create")->name('create');
 Route::get('/about', function(){
    return view('about');
})->name("about");
Route::get('/matches', "MatchesController@showMatches")->name("matches");
Route::get('/readn', "MatchesController@markread")->name("readn");



});

Route::group(['middleware'=>['auth','admin']],function(){

    Route::resource('/dashboard','admin\AdminController');
    Route::get('/dashboard','admin\AdminController@index')->name("dashboard");


    // Route::get('/post-edit/{id}','admin\AdminController@edit');

    // Route::put('/post-edit-update/{id}','admin\AdminController@update');

    // Route::get('/post-delete/{id}','admin\AdminController@destroy');

});
Route::get('/hello',function(){

   return view("hello");
});
Route::get('/profile/{id}', 'FriendsProfileController@index')->name('friend.profile');

//Routes for Chat

Route::group(['middleware'=>['auth']],function(){

    Route::get('/messages','MessageController@index')->name('messages');
    Route::get("/message/{id}",'MessageController@fetch')->name('message');
    Route::post('/message','MessageController@sendMessage');

});
