<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findorfail($id);
        return view('admin/post-edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->input('postName');
        $post->body=$request->input('postContent');
        $post->gender=$request->input('postGender');
        $post->species=$request->input('postSpecies');
        $post->path=$request->input('postImage');
        $post->update();


        return redirect('/dashboard')->with('status','Post updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findorfail($id);
        $post->delete();
        return redirect('/dashboard')->with('status','Post deleted successfully');
    }
   /* public function listUsersForRoles(){

        $users=User::all();

        return view('admin.register_roles')->with('users',$users);
    }
   */
    public function viewDashboard(){

        $posts=Post::all();

        return view('admin.dashboard')->with('posts',$posts);
    }


}
