@extends('layouts.app')

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


<div  class="container" style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px;">

{!! Form::model($post,['method' => 'PATCH', "action"=>[ "PostsController@update",$post->id]]) !!}
        {{csrf_field()}}
        {!! Form::label('featured','Upload Another Picture:') !!}<br> 
        {!! Form::file('bath',null,["class"=>"form-control"])!!} 
        <br>
        <br>
        
        {{csrf_field()}}
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,["class"=>"form-control"])!!}
        <br>
        {!! Form::label('body','Body:') !!}
        {!! Form::text('body',null,["class"=>"form-control"])!!}
         <br>
         {!! Form::label('species',"Select Your Pet's Species:") !!}
        {!! Form::select('species',["cat"=>"cat","dog"=>"dog","bird"=>"bird"],null)!!}
        {!! Form::label('gedner',"Select Your Pet's Gender:") !!}
        {!! Form::select('gender',["male"=>"male","female"=>"female"],null)!!}
         <div class="image-container">
                
                 </div>
{!! Form::submit('Edit Post',["class"=>"btn btn-primary"])!!}
{!! Form::close() !!}
{{-- {!! Form::open(['method' => 'DELETE', "action"=> ["PostsController@destroy",$post->id]]) !!}
<a href="{{route("post.hdelete",["id"=>$post->id])}}"> </a>
{!! Form::submit('Delete Post',["class"=>"btn btn-danger"])!!}
{!! Form::close() !!} --}}
</div>
@endsection

@yield('footer')