@extends("layouts.app")



@section("content")

<div class="profile_left" style="">
<img src="../{{$post->path}}" style='border-radius:3px; margin:10px ; width:200px;' alt="There is no image">
<br>
<p style="font-size:18px; margin-left:9px; margin-bottom:0px;">Name : {{$post->title }}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Gender: {{$post->gender}}</p>
<p style="font-size:18px; margin-left:9px;  margin-bottom:0px;">Joined at : {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('m/d/Y') : Auth::user()->email }}</p>


</div>
<div class="profile_right" style="margin-left:300px;padding:15px;border-radius:5px; background-color:rgb(255,251,219,0.5); width:60%;
">
    <h2 style="font-weight:bold">{{$post->title}}</h2>
    <h5>{{$post->body}}</h5>
</div>
<a href="{{route('messages')}}" class="btn btn-success" style="margin-left: 300px;margin-top: 10px">Open Messages</a>
<!--

-->
@endsection
