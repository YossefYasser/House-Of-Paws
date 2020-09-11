@extends('layouts.app')


@section('content')
    

   <h1>Create Post</h1>
{{-- <form method="post" action="/posts"> --}}
    {!! Form::open(['method' => 'POST', 'action' => 'PostsController@store', 'files'=>true, "enctype"=>"multipart/form-data" ]) !!}


    <div class="form-group">
        {{ Form::label('user_id', 'User_id:' )}}
        {{ Form::text('user_id', null, ['class'=>'form-control']) }}
        {{ Form::label('title', 'Title:' )}}
        {{ Form::text('title', null, ['class'=>'form-control']) }}
        {{ Form::label('body', 'body:' )}}
        {{ Form::text('body', null, ['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::file('featured',['class'=>'form-control']) }}
    </div>

    <div class="form-group">
      
      {{ Form::submit('Create Post', ['class'=>'btn btn-primary'])}}

    </div>
{!! Form::close() !!}


@if(count($errors) > 0)
   
    <div class="alert alert-danger">
        <ul>
           
            @foreach ($errors->all() as $error)
                
                 <li>{{$error}}</li>

            @endforeach



        </ul>
    </div>
@endif
@endsection 

