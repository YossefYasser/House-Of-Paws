@extends('layouts.app')
<h1>edit post</h1>
@section('content') 
{{-- <form  method="post" action ="/posts/{{$post->id}}" >
         {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <label>Title</label>
        <input type="text" name="title" value="{{$post->title}}">
        <label>Post</label>
        <input type="text" name="body"  value="{{$post->body}}">
        <input type="submit" name="submit">
</form> 


<form  method="post" action ="/posts/{{$post->id}}" >
         {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="submit" value="DELETE POST">
</form>  --}}


{{-- ________________________________
edit and delete using pacakge
________________________________ --}}


 
{!! Form::model($post,['method' => 'PATCH', "action"=>[ "PostsController@update",$post->id]]) !!}

        {{csrf_field()}}
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,["class"=>"form-control"])!!}
        {!! Form::label('body','Body:') !!}
        {!! Form::text('body',null,["class"=>"form-control"])!!}
         <br>
         <div class="image-container">
                <img src="{{"../../".$post->path}}" alt="There is no image">
                
                  </div>
        {!! Form::submit('Edit Post',["class"=>"btn btn-primary"])!!}
{!! Form::close() !!}
{{-- {!! Form::open(['method' => 'DELETE', "action"=> ["PostsController@destroy",$post->id]]) !!}
<a href="{{route("post.hdelete",["id"=>$post->id])}}"> </a>
{!! Form::submit('Delete Post',["class"=>"btn btn-danger"])!!}
{!! Form::close() !!} --}}

@endsection

@yield('footer')