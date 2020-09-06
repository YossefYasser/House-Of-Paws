<?php

use Illuminate\Support\Facades\Route;
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'userProfile@index')->name('profile');
Route::resource("/posts","PostsController")->middleware('auth');
