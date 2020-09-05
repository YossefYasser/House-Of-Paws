@extends('layouts.app')

    @section('content')
        
   
  <div class="container">
    
    @if(count($posts) > 0 and $category != "")
    
     <div id="myCarousel" class="carousel slide" data-ride="carousel"style=" width: 60%;
     margin: 0 auto; border-radius:7px; ">
      <!-- Indicators -->
      

        
          
          <ol class="carousel-indicators" >
            <?php $i = 0; ?> 
            {{-- el i da variable bykhaly awl indicator active --}}
           @foreach($posts  as $key=> $post)
              
              @if($category == $post->category  and ($post != $user->post()->get()->first()) )
               
              <li data-target="#myCarousel" data-slide-to="{{$key+1}}" class="{{$i == 0 ? 'active' : '' }}" ></li>
              <?php $i++; ?>
              @endif 
             
           @endforeach
        
          </ol>
    
      <!-- Wrapper for slides -->
    <div class="carousel-inner" >
        
      <?php $a = 0; ?>
                  @foreach($posts  as $key => $post )
                  
                    @if($category == $post->category and ($post != $user->post()->get()->first()))
                    
                       <div class="carousel-item {{$a==0? "active" : ""}}" >
                        <?php $a++; ?>  
                          <img  src="{{$post->path}}" style="width:100%; height: 400px;">
                          
                           <div class="carousel-caption" style="
                           position: relative;
                           left: auto;
                           right: auto;
                           height: 100px;
                           text-align : left;
                           color: black;
                          ">
                           
                           <h2 style="padding-left : 8px;">{{$post->title}}</h2>
                           <h4 style="padding-left: 8px;">{{$post->body}}/h4>
                          </div>
                        </div>
                        
                     @endif
                   @endforeach 
                 
                  
    </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <button class="btn btn-danger  carusel-button" style="padding: 10px 20px 10px 20px ">Dislike</button>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <button class="btn btn-success carusel-button " style="padding: 10px 25px 10px 25px " >like</button>
        <span class="sr-only">Next</span>
      </a>
      @endif
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
