@extends('layouts.app')


@section('content')


   @foreach ($posts as $post)
   <div class="image-container">
      <img height="100" src="{{$post->path}}">
  
    </div>
<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li> 
   @endforeach
@endsection