@extends("layouts.app")



@section("content")
<div class="profile_left" style="">

<img src="{{$post->path}}" style='border-radius:3px; margin:10px ; width:200px; height;200' alt="There is no image">
<br>
<p style="font-size:18px; margin-left:9px; margin-bottom:0px;">Username : {{$user->name }}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Gender: {{$post->sex}}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Joined at : {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('m/d/Y') : Auth::user()->email }}</p>

{{-- {!! Form::model($post,['method' => 'PATCH', "action"=>[ "PostsController@update",$post->id]]) !!}
    {!! Form::submit('Edit Post',["class"=>"btn btn-primary"])!!}
{!! Form::close() !!} --}}
</div>
<div style="margin-left:300px;">
    <h2 style="font-weight:bold">{{$post->title}}</h2>
<h5>{{$post->body}}</h5>
 <br>
 {!! Form::open(['method' => 'DELETE', "action"=> ["PostsController@destroy",$post->id]]) !!}
<a href="{{route('posts.edit',$post->id)}}"> <button class="btn btn-primary" style="margin-right: 15px;">Edit Post</button></a>
 
 {!! Form::submit('Delete Post',["class"=>"btn btn-danger"])!!}
{!! Form::close() !!}
</div>

@endsection