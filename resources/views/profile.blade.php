@extends("layouts.app")



@section("content")
@if(!empty($post))
<div class="profile_left" style="">
<img src="{{$post->path}}" style='border-radius:3px; margin:10px ; width:200px; height;200' alt="There is no image">
<br>
<p style="font-size:18px; margin-left:9px; margin-bottom:0px;">Username : {{$user->name }}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Gender: {{$post->gender}}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Joined at : {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('m/d/Y') : Auth::user()->email }}</p>

{{-- {!! Form::model($post,['method' => 'PATCH', "action"=>[ "PostsController@update",$post->id]]) !!}
    {!! Form::submit('Edit Post',["class"=>"btn btn-primary"])!!}
{!! Form::close() !!} --}}
</div>
<div class="profile_right" style="margin-left:300px;padding:15px;border-radius:5px; background-color:rgb(255,251,219,0.5); width:60%;
">
    <h2 style="font-weight:bold">{{$post->title}}</h2>
<h5>{{$post->body}}</h5>
 <br>
 
 <a href="{{route('posts.edit',$post->id)}}"> <button class="btn btn-primary" style="margin-right: 15px; float:left">Edit Post</button></a>
 {!! Form::open(['method' => 'DELETE', "action"=> ["PostsController@destroy",$post->id]]) !!} 
 {!! Form::submit('Delete Post',["class"=>"btn btn-danger"])!!}
{!! Form::close() !!}
 
</div>
@else
<div  class="container" style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px;">
    <h1>You Haven't Posted Anything Yet<h1>
        <h4> </h4>
        <a class="btn btn-primary" href="{{route('create')}}">Add Your Post From Here</a>

  </div>
@endif
@endsection