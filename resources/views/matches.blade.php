@extends('layouts.app')

    @section('content')
        

<div class="matches"
    style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px; border:none; height:450px; width:600px; margin:auto;
    ">
    {{-- <h1>Your Matches: {{$friends}}<h1> --}}
        @foreach ($users as $values) 
            @foreach ($values as  $value) 
                 
                  <h4> You Have A Match With {{$value->name}}</h4>
               
            @endforeach
        @endforeach
</div>

    @endsection