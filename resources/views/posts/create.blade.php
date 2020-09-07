@extends('layouts.app')


@section('content') 





@if(count($user->post()->get() )==0)
<div  class="container" style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px;">
    

  

{!! Form::open(["file"=> true,'method' => 'POST', "action"=> "PostsController@store","enctype"=>"multipart/form-data"]) !!}

<div class="form-group" style="margin-left:15px;padding:10px; ;" >
    {!! Form::label('featured','Upload A Photo Of Your Pet:') !!}<br> 

        {!! Form::file('featured')!!}

        
        <br><br>
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,["class"=>"form-control"])!!}
        {!! Form::label('body','Description:') !!}
        {!! Form::text('body',null,["class"=>"form-control"])!!}
        <br>
        {!! Form::label('species',"Select Your Pet's Species:") !!}
        {!! Form::select('species',["cat"=>"cat","dog"=>"dog","bird"=>"bird"],null)!!}
        {!! Form::label('gedner',"Select Your Pet's Gender:") !!}
        {!! Form::select('gender',["male"=>"male","female"=>"female"],null)!!}
        <br>
        <input type="submit" name="submit" class="btn btn-primary">

        
</div>
</div>
{!! Form::close() !!}
@if (count($errors))
  <br>
    <div class="alert alert-danger">
        <ul>

            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach


        </ul>
         
   

    </div>
@endif
@else
   <div  style="padding:25px;background-color:rgb(255,251,219,0.5);">
     <h1>You Already Have a Post<h1>
         <h4> Wanna Edit it ?</h4>
         <a class="btn btn-primary" href="{{route('posts.edit',$user->post()->get()->first()->id)}}"> Edit Post</a>

   </div>
   

 @endif
@endsection
@yield('footer')