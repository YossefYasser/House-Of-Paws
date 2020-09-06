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
 Route::get("/posts/create","PostsController@create")->name('create');



});

Route::group(['middleware'=>['auth','admin']],function(){

    Route::resource('/dashboard','admin\AdminController');
    Route::get('/dashboard','admin\AdminController@index')->name("dashboard");


    // Route::get('/post-edit/{id}','admin\AdminController@edit');

    // Route::put('/post-edit-update/{id}','admin\AdminController@update');

    // Route::get('/post-delete/{id}','admin\AdminController@destroy');

});
Route::get('/create',function(){

    $post=new Post();
    $post->name='bobo';
    $post->user_id=1;
    $post->path='path';
    $post->gender='Female';
    $post->content='bobo is a cat';
    $post->image='No Image yet';
    $post->species='cat';
    $post->save();

});
