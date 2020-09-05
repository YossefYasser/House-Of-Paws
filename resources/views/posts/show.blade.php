@extends("layouts.app")



@section("content")
<ul>
  {{-- @foreach($posts as $post)
   <li>{{$post}}</li>

  @endforeach --}}
  <h1> {{$posts->title}}</h1>


</ul>

@endsection