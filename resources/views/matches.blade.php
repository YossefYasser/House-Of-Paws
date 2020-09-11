@extends('layouts.app')
<?php
use Hashids\Hashids;
$hashids = new Hashids();
?>

    @section('content')
        

<div class="matches"
    style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px; border:none; height:450px; width:600px; margin:auto;
    ">
 <h1 style="padding-bottom: 5px;">Your Matches: <br><h1> 
    @php($counter=0)
        @foreach ($users as $values) 
            @foreach ($values as  $value) 
                @php($counter++)
 <div class="profilelink"><h4><a href="{{ route('friend.profile', $hashids->encode($value->id)) }}" style="color: rgb(53,64,119); background: rgb(52,58,64,0.1)
"
                     > {{$counter}} . {{$value->name}}</a></h4></div>
                  
            @endforeach
        @endforeach
</div>

    @endsection