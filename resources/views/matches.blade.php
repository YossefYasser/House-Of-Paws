@extends('layouts.app')

    @section('content')
        

<div class="matches"
    style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px; border:none; height:450px; width:600px; margin:auto;
    ">
    {{-- <h1>Your Matches: {{$friends}}<h1> --}}
    <?php 
    foreach ($friends as  $value) {
    
        echo ($value) ;
      
}
    foreach ($users as $valuee) {
         echo ($valuee);
     }
    ?>
</div>

    @endsection