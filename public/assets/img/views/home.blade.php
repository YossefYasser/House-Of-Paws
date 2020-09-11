@extends('layouts.app')

    @section('content')
        
    <video autoplay loop muted id="bgvideo" class="videoPlayer">
      <source
       src="video/puppies.mp4" type="video/mp4">
      
      </video> 
     
  <div class="container" >
     <div id="myCarousel" class="carousel slide" data-ride="carousel"style=" width: 60%;
     margin: 0 auto;">
      <!-- Indicators -->
      @if(count($posts)<3)
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        {{-- <li data-target="#myCarousel" data-slide-to="2"></li> --}}
      </ol>
      @else
      <ol class="carousel-indicators"style=" margin: 0 auto;">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      @endif

    
      <!-- Wrapper for slides -->
    <div class="carousel-inner" style=" margin: 0 auto;" >
        
                  @foreach($posts  as $key => $post)
                      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        
                           <img src="{{$post->path}}" style="width:100%; max-height: 400px;">
                           <div class="carousel-caption" style="
                           position: relative;
                           left: auto;
                           right: auto;
                           height: 110px;
                           text-align : left;
                           
                           color: black;
                       /* font-family: 'Roboto', sans-serif; */
                       font-size: 30px;">
                            <h2>{{$post->title}}<h2>
                           <h4>{{$post->body}}</h4>
                      {{-- <h4>el ota de 3ndaha 25 sana , beda , hlwa ,  shatra w zakia</h4> --}}
                          </div>
                     </div>
                  @endforeach 
                  
    </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <button class="btn btn-danger  carusel-button" style="padding: 4px 20px 1px 20px;"><p>Dislike</p></button>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <button class="btn btn-success carusel-button" style="padding: 4px 20px 1px 20px;"><p>like</p></button>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
     <script>
    $(function(){
    $('.carousel').carousel({
    interval : false    
    });  
    $('.carousel').on('slide.bs.carousel', function(){
    $('p').toggleClass('yellow');    
    });
    $('.carousel').hover(function(){
    $(this).carousel('pause');
    },function(){
    $(this).carousel('cycle');
    });
    });   
    </script> 


@endsection
