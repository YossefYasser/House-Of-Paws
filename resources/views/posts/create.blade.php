@extends('layouts.app')


@section('content') 





@if(count($user->post()->get() )==0)


{!! Form::open(["file"=> true,'method' => 'POST', "action"=> "PostsController@store","enctype"=>"multipart/form-data"]) !!}

<div class="form-group">
        {!! Form::file('featured')!!}
        <br>
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,["class"=>"form-control"])!!}
        {!! Form::label('body','Post:') !!}
        {!! Form::text('body',null,["class"=>"form-control"])!!}
        {!! Form::label('species',"Select Your Species:") !!}
        {!! Form::select('species',["cat"=>"cat","dog"=>"dog","bird"=>"bird"],null)!!}
        {!! Form::label('gedner',"Select Your Gender:") !!}
        {!! Form::select('gender',["male"=>"male","female"=>"female"],null)!!}

        
</div>
<input type="submit" name="submit">
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
   <div class="alert alert-warning">
     <h1>You Already Have a Post<h1>
         <h4> Wanna Replace It With A New One?</h4>
   </div>
   

 @endif
@endsection
@yield('footer')