
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

.videoPlayer {
    min-height: 100%;
    //min-width:100%; - if fit to width
position:absolute;
bottom:0;
left:0;
width: 100%;
height: 100%;
position: absolute;
padding:0;
margin:0;
left: 0px;
top: 0px;
z-index: -100;
overflow:hidden;
object-fit: cover;
}
/* #carousel{
    padding-top: 100px;
} */
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
.carusel-button{
   padding:150px;
   top:180px;
   position:relative;
   
   
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
     
/* #name{
     padding-left:50px;  
    
}  */

#lolo{
    padding-bottom: 0%;
}
#nav{
    position: relative;
}
#Theusername{
    color: white;
    padding-left: 30px;
}
@media(max-width :858px){


#myCarousel{
    top:30px;
    width: 500px;
    margin: 0 auto;
    height: 310px;
}
.carousel-indicators{
    /* height: 30px; */
    position: absolute;
    bottom: 0%;
    border: 0;
    margin: 0;
}
.carousel-control p {
     
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
    width:100%; height: 100px;
    margin: 0 auto;
    
}
 .carousel-caption{
                            
position: relative;
left: auto;
right: auto;
height: 110px;
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
.carousel-item img{
   height: 200px;
}

}



</style> 

</head>
<body>
    <div id="app">
        <nav  class="navbar navbar-expand-md navbar-dark bg-dark"role="navigation" id="nav">
            
            <div class="container-fluid" id="lolo">
                <a class="navbar-brand" href="{{ url('/') }}" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

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
                            <a class="nav-link" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Add</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Edit</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Matches</a>
                          </li>
                            <li class=" dropdown" id="Theusername" style="padding-top:12px; color: white;" >
                                
                                    <a class=" dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">
                                        {{ Auth::user()->name }}
                                      {{-- <span class="caret"></span> --}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                    </ul>
                                  
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }} </span>
                                </a>
                                a class="dropdown-item" href="{{ route('logout') }}"
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    < onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div> --}}
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>