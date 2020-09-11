<?php

use Illuminate\Support\Facades\Route;

use App\Post;


Auth::routes();


Route::get('/', function () {
    return view('welcome');
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
