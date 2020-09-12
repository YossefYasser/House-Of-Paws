<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;500&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@300&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap'>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
  /* video#bgvideo{
    position: fixed;
     min-height: 100%;
    min-width: 100%;
    height: 100%;
    width: 100%;
    z-index: -100;
    object-fit: cover;
    padding-top: 0px;

}   */
/* #vivo {
width: 100%;
height: 100%;
position: absolute;
padding:0;
margin:0;
left: 0px;
top: 0px;
z-index: -100;
overflow:hidden;
} */

body{
    font-family:'Arvo',serif;
    background: url("https://images.pexels.com/photos/3299906/pexels-photo-3299906.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940") no-repeat center center;
    background-attachment: fixed;
    background-size: cover;
}
.about{
    border-radius:5px;
    background-color: rgb(255,251,219,0.5);
    text-align: center;
    font-size: 30px;
    padding: 30px 20px 30px 20px;
    top: 50px;
    width: 800px;
    height: 300px;
    margin: auto;
    margin-top: 50px;
    font-family: 'Roboto Slab', serif;
}


     #myCarousel{
    width: 60%;
    margin: 0 auto;
}
.carousel-inner .item img{
    height: 400px;
    margin: 0 auto;
}


ol.carousel-indicators {
   position: absolute;
   bottom: 5px;
   margin: 0;
   left: 0;
   right: 0;
   width: auto;
}

ol.carousel-indicators li,
ol.carousel-indicators li.active {
   width: 1rem;
   height: 1rem;
   margin: 0;
   border-radius: 50%;
   border: 0;
   background: transparent;
}

ol.carousel-indicators li {
   background : grey;
   margin-left: .5rem;
   margin-right: .5rem;
}

ol.carousel-indicators li.active {
   background: black;
}

.carousel-caption  {
   /* font-family: 'Arvo', serif; */
   /* font-family: 'Noto Sans JP', sans-serif; */
   font-family: 'Noto Sans JP', sans-serif;
   }

.carousel-caption  {
   /* font-family: 'Arvo', serif; */

   /* font-family: 'Grandstander', cursive; */
}
.navbar-brand a{
    padding-left: 20px;
}
.navbar-nav > li{
  padding-left:30px;
  padding-right:30px;
}
.navbar > li:hover{
 border-bottom: 3px white;
/* padding-bottom: 9px;*/
 cursor: pointer;
}



#lolo{
    padding-bottom: 0%;
}
#nav{
    position: relative;
}
.profile_left {

    border-radius: 5px;
    width: 220px;
    float: left;
    position: relative;
    background-color:rgb(255,251,219,0.5);
    color: #004077;
    margin-right: 20px;
    margin-left: 20px;
    z-index: 0;
}
.carousel-control-prev,
.carousel-control-next{
    align-items: flex-start;; /* Aligns it at the top */
}

.carousel-control-prev,
.carousel-control-next{
    align-items: flex-end;; /* Aligns it at the bottom */
}
.carusel-button{
   /* padding:150px; */

   padding-bottom:5px;
   position:relative;
   left: 0;
   margin-left: 0;

}
 #right{
    left: 10px;
    position: relative;
    bottom:350px;
}
#left{
    right:500px;
    position: relative;
    bottom:350px;
}
.footer{
    background-color: rgba(0,0,0,0.5);
    color: grey;
    font-size: 15px;
    padding: 5px 0;
    margin-top: auto;
    position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
}
.navbar-brand img{
    height: 30px;
    width: 30px;
}
/* .profilelink > a {
    color: black;
} */
@media(max-width :758px){


#myCarousel{
    top:30px;
    width: 500px;
    margin: 0 auto;
    height: 330px;
}
.carousel-indicators{
    height: auto;
    position: relative;

}
.carusel-button p {

    display: none;

}
.carusel-button{
    position: relative;
    top: 90px;
    width: 15px;
    height: 20px;
    }
   .carousel-inner{
   width: 300px;
   height:300px;
}

.carousel-inner > .item > img{
    width:100%; height: 200px;
    margin: 0 auto;



}
.carousel-inner {

position: relative;
left: auto;
right: auto;
height: auto;
text-align : left;
color: black;
/* font-family: 'Roboto', sans-serif; */
font-size: 20px;"
}

.carousel-caption h4{
    font-size:15px;
    padding-top: 0px;
}
.carousel-caption h2{
    font-size:20px;
    padding-top: 0px;
}
/* .carousel-item img{
   height: 300px; */

#right{
    top: -220px;
    left: 18px;
}
#left{
    top:-220px;


}

}

.carousel .carousel-control-prev {
  border-radius: $12;
  overflow: hidden;
}




</style>

</head>
<body>
   


    <div id="app">
        <nav  class="navbar navbar-expand-md navbar-dark bg-dark"role="navigation" id="nav">

            <div class="container-fluid" id="lolo">
                <a class="navbar-brand" href="{{ route("home") }}" >
                    <h1 id="brandname" style="padding: 0%; font-size:20px; letter-spacing:1px; font-family: 'Arvo', serif; " >All about Paws</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href={{route("home")}}>Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href={{route("about")}}>About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href={{route("create")}}>Add</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"href={{route("profile")}}>Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href={{route("matches")}}>Matches</a>
                            <li class="nav-item dropdown" id="notificaition"  >
                                <?php $number = count(Auth::user()->unreadnotifications) ?>
                              <a   id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                 @if(count(Auth::user()->unreadnotifications) == 0)
                                 Notifications 
                                 @else
                                 Notifications  <span class="badge badge-danger badge-counter" id="badge"> {{count(Auth::user()->unreadnotifications)}} </span> 
  
                                 @endif
                              </a> 
                              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                  
                                  <a class="dropdown-item" href={{route("matches")}}
                                    >
  
                                      You Have {{count(Auth::user()->unreadnotifications)}} New Matches
                                  </a>
                              </div>
                          </li>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href={{route("messages")}}>Messages</a>
                            </li>

                            <li class="nav-item dropdown" id="name"  >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }} </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="footer">
            <div class="container" >
                <p>&copy; Develop with FZ. all rights reserved.</p>
            </div>
        </div>
    </div>
<<<<<<< HEAD

<script src="http://code.jquery.com/jquery-3.3.1.min.js">
</script>

<script>
 $(document).on('click','#notificaition',function(){
    alert("likeInsert");

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({

        type:'post',
        url:"{!! URL::to('/readn') !!}",
        dataType: 'JSON',
        data: {
            "_method": 'get',
            "_token": token,
            
        }, 
        success:function(data){
            // alert("likeInsert");
            // alert(k);
        },
        error:function(){

        },
    });
});

</script>

</html>
=======
<script>
    @@yield('script')
</script>
</body>
</html>
>>>>>>> 36d272b4893d08e2b51c57c64621486df89fa038
