<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Events\MessageSent;
use App\Friend;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $friends=DB::select("select friend_id,posts.user_id,posts.title,posts.path,count(is_read) as unread from friends
        JOIN posts ON friend_id=posts.user_id and friend_id !=".Auth::id()."
        LEFT JOIN messages ON friend_id=messages.from and is_read=0 and messages.to=".Auth::id()."
        where friend_id !=".Auth::id()."
        group by friend_id,posts.user_id,posts.title,posts.path

        ");
        //dd($friends);

       /* $users=DB::select("select users.id,users.name,users.email,count(is_read) as unread
        from users LEFT JOIN messages ON users.id = messages.from and is_read=0 and messages.to=".Auth::id()."
        where users.id != ".Auth::id()."
        group by users.id, users.name, users.email
        ");
        */
        //dd($users);

       return View('messages/index')->with('users',$friends);
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }



    public function fetch($user_id){
        $my_id=Auth::id();
        Message::where(['from'=>$user_id,'to'=>$my_id])->update(['is_read'=>1]);

        $messages=Message::where(function ($query)use($user_id,$my_id){
           $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function ($query)use($user_id,$my_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();
        return view("messages.chat")->with('messages',$messages);
    }

    public function sendMessage(Request $request){
       $from=Auth::id();
       $to=$request->receiver_id;
       $message=$request->message;

        $data=new Message();
        $data->from=$from;
        $data->to=$to;
        $data->message=$message;
        $data->is_read=0;
        $data->save();

        $data=['from'=>$from,'to'=>$to];
        event(new MessageEvent($data));
       }

}
