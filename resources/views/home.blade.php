@extends('layouts.app')

    @section('content')
        
   
  <div class="container">
    
    @if(count($posts) > 1 and $species != "")
    
     <div id="myCarousel" class="carousel slide carousel-fade" data-interval="false" data-ride="carousel"style=" width: 60%;
     margin: 0 auto; border-radius:7px; ">
      <!-- Indicators -->
      

        
          
          <ol class="carousel-indicators" >
            <?php $i = 0; ?> 
            {{-- el i da variable bykhaly awl indicator active --}}
           @foreach($posts  as $key=> $post)
           {{-- and (in_array($post->id ,$seenposts) --}}
           
              @if($species == $post->species  and ($post != $user->post()->get()->first())and (!in_array($post->id ,$seenposts)))
               
              <li data-target="#myCarousel" data-slide-to="{{$key+1}}" class="{{$i == 0 ? 'active' : '' }}" ></li>
              <?php $i++; ?>
              @endif 
             
           @endforeach
        
          </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" >
        
      <?php $active=0;$a = 0;
      $k=0?>
      {{-- k de 3ebara 3n variable by-increment m3 kol iteration bt7sl  --}}
                  @foreach($posts  as $key => $post )
                  
                    @if($species == $post->species and ($post != $user->post()->get()->first())and (!in_array($post->id ,$seenposts)))
                    <input type="hidden" id="{{"name"."$k"}}"value={{$post->id}} >
                    <?php $active=1?>
                    <input type="hidden" id="{{"userto"."$k"}}"value={{$post->user_id}} >
                    {{-- input hidden el id bta3o bykon 3la 7sb k btkon bkam ( name1,name2,name3) --}}
                       <div class="carousel-item item {{$a==0? "active" : ""}}" >
                        <?php $a++; ?>  
                          <img  src="{{$post->path}}" style="width:100%; max-height: 400px;border-radius: 5px;">
                          
                           <div class="carousel-caption jumbotron" style=
                           "
                           padding:25px;background-color:rgb(255,251,219,0.5);
                           position: relative;
                           left: auto;
                           right: auto;
                           margin-top:20px;
                           height: 150px;
                           text-align : left;
                           color: black;
                           font-family:'Arvo',serif;
                          " >
                           
                          <span class="no"> <h2 >{{$post->title}} -   {{$post->gender}} </h2>
                           
                           <input  type ="hidden" id="userid" value={{$user->id}} >
                           {{-- <input id="name2"value={{$p}} > --}}
                           
                           <?php $k++ ?>
                           <h4 >{{$post->body}}</h4><span>
                          </div>
                        </div>
                        
                     @endif
                   @endforeach 
                  <div class="carousel-item {{$active==0? "active" : ""}}">
                    <img  src="https://images.pexels.com/photos/1883300/pexels-photo-1883300.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" style="width:100%; max-height: 400px;border-radius: 5px;">
                    <div class="carousel-caption jumbotron" style=
                    "
                    padding:45px;background-color:rgb(255,251,219,0.5);
                    position: relative;
                    left: auto;
                    right: auto;
                    margin-top:20px;
                    height: 150px;
                    text-align : left;
                    color: black;
                    font-size: 40px;
                    font-family:'Arvo',serif;">
                    
                    <h2 style="text-align: center;">There are no more Posts to Show right now..</h2>
 
                   </div>
                  </div>
                 
     </div>
     @if($active!=0)    
     <a class="carousel-control-prev" href="#myCarousel" data-slide="next" style=>
      <button class="btn btn-danger  carusel-button" style="padding: 12px 20px 0px 20px;" id="left"><p>Dislike</p></button>    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <button class="btn btn-success carusel-button " style="padding:12px 20px 0px 20px; " id="right"><p>like</p></button>    </a>
    @endif
    </div>
    @else
       @if(count($posts) <= 1 and $species != "")
       
        {{-- <div class="alert alert-warning" style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px; border:none;">
            <h1>There Are No New Posts To Show At The Moment.. <h1>
                
       
          </div> --}}
          <div class="noPosts">
            <img  src="https://images.pexels.com/photos/1883300/pexels-photo-1883300.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" style="width:500px; max-height: 400px;border-radius: 5px;   display: block;
            margin-left: auto;
            margin-right: auto; bottom:0%; margin-bottom:0;">
            <div class="jumbotron" style=
            "
            padding:45px;background-color:rgb(255,251,219,0.5);
            position: relative;
            left: auto;
            right: auto;
            margin-top:20px;
            height: 150px;
            width: 300px;
            text-align : left;
            color: black;
            font-size: 40px;
            font-family:'Arvo',serif;
            width:500px; max-height: 400px;border-radius: 5px;   display: block;
            margin-left: auto;
            margin-right: auto; bottom:0%;
            margin-top: 0;">
            
            <h2 style="text-align: center;">There are no more Posts to Show right now..</h2>

           </div>
          </div>
       
       @else
       <div class="alert alert-warning" style="padding:25px;background-color:rgb(255,251,219,0.5); border-radius:5px; border:none;">
        <h1>Create Yout First Post Right Now To See Other's Posts! <h1>
            <a class="btn btn-primary" href="{{route('create')}}">Add Your Post From Here</a>
            
   
      </div>
        @endif

      @endif
    </div>
    
   </div>
    

 <!-- jQuery library -->
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.2/css/bootstrap.min.css"> --}}
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">  --}}
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"
 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
 crossorigin="anonymous">
</script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Latest compiled JavaScript -->
     <script>
       var k = 0;
       // el variable da by increment zy el variable ele fo2 m3 kol iteration fa by5leny a-access el input el hidden ele shayl el current post id 
       //hn3ml hena insert fl likes table + el seen table
       $(document).on('click','#right',function(){
    var postId = $('#name'+k).val();
    var usertoId = $('#userto'+k).val();
    var userId = $('#userid').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({

        type:'post',
        url:"{!! URL::to('/likeInsert') !!}",
        dataType: 'JSON',
        data: {
            "_method": 'get',
            "_token": token,
            "postid": postId,
            "userid": userId,
            "usertoid": usertoId,
        },
        success:function(data){
            // alert("likeInsert");
            // alert(k);
             k = k+1
        },
        error:function(){

        },
    });
}); 
// hn3ml hena insert fl seen table bs 
$(document).on('click','#left',function(){
    var postId = $('#name'+k).val();
    var usertoId = $('#userto'+k).val();
    var userId = $('#userid').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({

        type:'post',
        url:"{!! URL::to('/insert') !!}",
        dataType: 'JSON',
        data: {
            "_method": 'get',
            "_token": token,
            "postid": postId,
            "userid": userId,
            "usertoid": usertoId,
        },
        success:function(data){
            //  alert("dislikeInser");
            // alert(data);
             k = k+1
        },
        error:function(){

        },
    });
});
//     $(document).ready(function() {

//     $("#ajaxSubmit").click(function(e) {
     
//     alert('hello');
//     $.ajax({
      
//         type : "get",
//         url : "/insert",
//         data : {
//           // "_method":get
          
//           id:7},
//         success : function(response) {
//             alert(response);
            
//         }
//     });
//     e.preventDefault();
// });

// });
    // $(function(){
    // $('.carousel').carousel({
    // interval : false    
    // });  
    // $('.carousel').on('slide.bs.carousel', function(){
    // $('p').toggleClass('yellow');    
    // });
    // $('.carousel').hover(function(){
    // $(this).carousel('pause');
    // },function(){
    // $(this).carousel('cycle');
    // });
    // }); 
              // $(document).ready( function() {
                  
              //    $('.container').delay(5000).fadeOut();
          
              //   });
              $(document).ready( function() {
    var carouselLength = $('.carousel-item').length - 1;

// If there is more than one item
if (carouselLength) {
    $('.carousel-control-next').removeClass('d-none');
}

$('.carousel').carousel({
    interval: false,
    wrap: false
}).on('slide.bs.carousel', function (e) {
    // First one
    if (e.to == 0) {
        $('.carousel-control-prev').addClass('d-none');
        $('.carousel-control-next').removeClass('d-none');
    } // Last one
    else if (e.to == carouselLength) {
        $('.carousel-control-prev').addClass('d-none');
        $('.carousel-control-next').addClass('d-none');
        $('.carousel-indicators').addClass('d-none');
        $('.no').addClass('d-none');
        // $('.container').delay(5000).fadeOut();

    } // The rest
    else {
        $('.carousel-control-prev').removeClass('d-none');
        $('.carousel-control-next').removeClass('d-none');
    }
});
              });
    </script> 


@endsection
