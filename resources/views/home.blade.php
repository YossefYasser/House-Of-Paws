@extends('layouts.app')

    @section('content')
        
   
  <div class="container">
    
    @if(count($posts) > 1 and $species != "")
    
     <div id="myCarousel" class="carousel slide" data-ride="carousel"style=" width: 60%;
     margin: 0 auto; border-radius:7px; ">
      <!-- Indicators -->
      

        
          
          <ol class="carousel-indicators" >
            <?php $i = 0; ?> 
            {{-- el i da variable bykhaly awl indicator active --}}
           @foreach($posts  as $key=> $post)
              
              @if($species == $post->species  and ($post != $user->post()->get()->first()) )
               
              <li data-target="#myCarousel" data-slide-to="{{$key+1}}" class="{{$i == 0 ? 'active' : '' }}" ></li>
              <?php $i++; ?>
              @endif 
             
           @endforeach
        
          </ol>
    
      <!-- Wrapper for slides -->
    <div class="carousel-inner" >
        
      <?php $a = 0; ?>
                  @foreach($posts  as $key => $post )
                  
                    @if($species == $post->species and ($post != $user->post()->get()->first()))
                    
                       <div class="carousel-item {{$a==0? "active" : ""}}" >
                        <?php $a++; ?>  
                          <img  src="{{$post->path}}" style="width:100%; max-height: 400px;">
                          
                           <div class="carousel-caption" style="
                           position: relative;
                           left: auto;
                           right: auto;
                           height: 100px;
                           text-align : left;
                           color: black;
                          ">
                           
                           <h2 >{{$post->title}}</h2>
                           <h4 >{{$post->body}}</h4>
                          </div>
                        </div>
                        
                     @endif
                   @endforeach 
                 
                  
    </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <button class="btn btn-danger  carusel-button" style="padding: 4px 20px 1px 20px;"><p>Dislike</p></button>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <button class="btn btn-success carusel-button " style="padding: 4px 20px 1px 20px;"><p>like</p></button>
        <span class="sr-only">Next</span>
      </a>
      @else
       @if(count($posts) <= 1 and $species != "")
       
        <div class="alert alert-warning">
            <h1>There Are No New Posts To Show At The Moment.. <h1>
                
       
          </div>
       
       @else
       <div class="alert alert-warning">
        <h1>Create Yout First Post Right Now To See Other's Posts! <h1>
            <a class="btn btn-primary" href="{{route('create')}}">Add Your Post From Here</a>
            
   
      </div>
        @endif

      @endif
    </div>
    </div>
 

<!-- Latest compiled JavaScript -->
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
