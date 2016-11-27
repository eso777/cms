<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <title>Laravel</title>

          <!-- Fonts  
      
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->

          <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" />
          <!-- Styles 
      
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
          -->



          <!--  BootStrap Offline -->
          <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
          <link rel="stylesheet" href="{{asset('css/load.css')}}">

          <!--  Start Section My Styles -->
          <link href="{{asset('css/style.css')}}" rel="stylesheet">


          <style>
               body {
                    font-family: 'Lato';
               }

               .fa-btn {
                    margin-right: 6px;
               }
          </style>
     </head>
     <body id="app-layout" class="loaded">
        
         
         <div id="loader-wrapper">
            <div id="loader"></div>
         </div>
         
         
          <nav class="navbar navbar-default navbar-static-top">
               <div class="container">
                    <div class="navbar-header">

                         <!-- Collapsed Hamburger -->
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                              <span class="sr-only">Toggle Navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                         </button>

                         <!-- Branding Image -->
                         <a class="navbar-brand" href="{{ url('/') }}">
                              Laravel
                         </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                         <!-- Left Side Of Navbar -->
                         <ul class="nav navbar-nav">
                              <li><a href="{{ url('admin/home') }}">Home</a></li>
                              <li><a href="{{ url('admin/menus') }}">Menus</a></li>
                              <li><a href="{{ url('admin/items') }}">Items</a></li>

                         </ul>

                         <!-- Right Side Of Navbar -->
                         <ul class="nav navbar-nav navbar-right">
                              <!-- Authentication Links -->
                              @if (Auth::guest())
                              <li><a href="{{ url('/login') }}">Login</a></li>
                              <li><a href="{{ url('/register') }}">Register</a></li>
                              @else
                              <li class="dropdown">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                   </a>

                                   <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                   </ul>
                              </li>
                              @endif
                         </ul>
                    </div>
               </div>
          </nav>



          <div class="container" >
               <div class="row">
                    <div class="col-lg-12" id="myDiv">

                         @yield('content')

                    </div>
               </div>
          </div>



          <!-- JavaScripts 
         

          <!-- J-query js -->
          <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>

          <!-- BootStrap js  -->
          <script src="{{asset('js/bootstrap.min.js')}}"></script>
          <script src="{{asset('js/load.js')}}"></script>

          <!-- 
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
          -->

          {{-- <script src="{{ asset('js/load.js') }}"></script> --}}
          {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
     
     
     <!-- J-s in pages  -->
     @yield('inlineJS')
     
</body>
</html>
