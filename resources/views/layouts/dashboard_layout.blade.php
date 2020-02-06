<!doctype html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Welcome to MediNaija</title>
    <meta name="description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    
     <link rel="icon" href="{{asset('images/medinaija_logo.png')}}">
    <meta property="og:title" content="Welcome to MediNaija" />
    <meta property="og:description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <meta property="og:url" content="index.html" />
    <meta property="og:site_name" content="MediNaija" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <meta name="twitter:title" content="Welcome to MediNaija" />
   
    <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <!--  <link href='https://cdn.shortpixel.ai/' rel='preconnect' />
    <link rel="alternate" type="application/rss+xml" title="MediNaija &raquo; Feed" href="feed/index.html" /> -->
    <!-- <link rel="alternate" type="application/rss+xml" title="MediNaija &raquo; Comments Feed" href="comments/feed/index.html" /> -->
   <!--   <link type="text/css" media="all" href="{{asset('css/main.css')}}" rel="stylesheet" /> -->
     <link type="text/css" media="all" href="{{asset('css/hospital_style.css')}}" rel="stylesheet" />
      <link type="text/css" media="all" href="{{asset('css/doctor_style.css')}}" rel="stylesheet" />
    <link rel='stylesheet' id='iv_directories-font-css' href='https://fonts.googleapis.com/css?family=Raleway&amp;ver=5.2.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sb-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C300%2C400%2C600%2C700%7CDroid+Serif%3A400%2C700%2C400italic%7CMontserrat%3A400%2C700%7CNothing+You+Could+Do%7CLibre+Baskerville%3A400%2C400italic&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet" />

    <link rel='stylesheet' id='roboto-style-css' href='https://fonts.googleapis.com/css?family=Roboto+Slab%3A400%2C700&amp;ver=5.2.2' type='text/css' media='all' />
    <link rel='stylesheet' id='open-sans-style-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C600%2C700&amp;ver=5.2.2' type='text/css' media='all' />

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">

      @yield('css')

    <script type='text/javascript' src='{{asset("js/jquery.js")}}'></script>
   
      <script src="{{ asset('js/app.js') }}" defer></script>
      <style type="text/css">
    
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
      </style>
</head>

<body class="">    
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">   
     <div class="sidebar-wrapper">

       <a href="/" class="logo">
                            <img src="{{asset('images/medinaija_logo.png')}}" alt="image"> 
                          </a>
        <ul class="nav">


          <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('update_profile')) ? 'active' : '' }}">
            <a class="nav-link" href="/update_profile">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>

         <!--   CHAT NAV STARTS -->

           @if(Auth::user()->user == "doctor") 
           <li class="nav-item {{ (request()->is('startchat')) ? 'active' : '' }}">
            <a class="nav-link" href="/startchat">
              <i class="material-icons">chat</i>
              <p>Chat</p>
            </a>
          </li>

          @elseif(Auth::user()->user == "user")
          <li class="nav-item {{ (request()->is('startchat')) ? 'active' : '' }}">
            <a class="nav-link" href="/startchat">
              <i class="material-icons">chat</i>
              <p>Chat</p>
            </a>
          </li>
          @else

          @endif

        <!--   CHAT NAV ENDS -->
        @if(Auth::user()->user == "hospital") 
          <li class="nav-item {{ (request()->is('gallery')) ? 'active' : '' }}">
            <a class="nav-link" href="/gallery">
              <i class="material-icons">images</i>
              <p>Pictures</p>
            </a>
          </li>
          @endif
         <!--  NOTIFICATION NAVBAR STARTS -->

          @if(Auth::user()->user == "doctor") 
          
            <li class="nav-item {{ (request()->is('notification')) ? 'active' : '' }}">
            <a class="nav-link" href="/notification">
              <i class="material-icons">notifications</i>
              <p>Notification</p>
            </a>
          </li>
          @elseif(Auth::user()->user == "user")
               <li class="nav-item {{ (request()->is('notification')) ? 'active' : '' }}">
            <a class="nav-link" href="/notification">
              <i class="material-icons">notifications</i>
              <p>Notification</p>
            </a>
          </li>

          @else

          @endif

         <!--  NOTIFICATION NAVBAR -->
          <li class="nav-item {{ (request()->is('account')) ? 'active' : '' }}">
            <a class="nav-link" href="/account">
              <i class="material-icons">settings</i>
              <p>Account</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          
          </div>
        </div>
      </nav>
      <!-- Navbar -->

      <div id="" style="">
        <div class="toolbar">
            <div class="uou-block-1a">
                <div class="container">
                    <div class="search">
                        <a href="#" class="toggle fa fa-search">

                        </a>
                        <form class="search-form" method="get" action="/">
                            <input type="text" class="search-input" value="" name="s" id="s" placeholder="Search" />
                            <input type="submit" class="btn btn-default searchsubmit" />
                        </form>
                    </div>
                    <ul class="social">
                        <li>
                            <a class="fa fa-facebook" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-twitter" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-linkedin" href="#"></a>
                        </li>
                        <li>
                            <a class="fa fa-google-plus" href="#"></a>
                        </li>
                    </ul>
                    <ul class="authentication">
                         @guest
                        <li>
                            <a href="#">Login</a>
                            <div class="login-reg-popup">
                                <form name="loginform" id="loginform" class="default-form" action="{{ route('login') }}" method="POST">
                                      @csrf
                                    <input type="text" name="email" id="email" value="" size="20" placeholder="User name" class="@error('email') is-invalid @enderror" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror

                                    <input type="password" name="password" id="password" value="" size="20" class="@error('password') is-invalid @enderror" placeholder="Password">

                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                  <!--   <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
 -->
                                    <input type="submit" name="wp-submit" id="wp-submit" value="{{ __('Login') }}" class="btn btn-primary">
                                   
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                                </form>
                            </div>
                        </li>
                         @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                          @endif
                           @else
                           
                            <li>
                            <a href="#"> <i class="fa fa-user"></i> {{ Auth::user()->full_name }}</a>
                          <div class="login-reg-popup">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="/dashboard"> <i class="fa fa-edit"></i> Profile</a>
                                    </li>
                                    <li>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </div>
                            
                        </li>
                       
                         @endguest
                    </ul>
                </div>
            </div>
            <div class="box-shadow-for-ui" style="">
                <div class="uou-block-2b">
                    <div class="container">
                        <a href="/" class="logo">
                            <img src="{{asset('images/medinaija_logo.png')}}" alt="image"> 
                          </a>
                        
                        <nav class="nav">
                            <ul class="sf-menu sf-menu">
                                <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-65 current_page_item active ">
                                    <a href="/">
                                        <strong>Home</strong>
                                    </a>
                                </li>
                                <li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ url('about_us') }}">
                                        <strong>About Us</strong>
                                    </a>
                                </li>
                                <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ url('contact') }}">
                                        <strong>Contact Us</strong>
                                    </a>
                                </li>
                                <li id="menu-item-216" class="menu-item menu-item-type-post_type_archive menu-item-object-hospital">
                                    <a href="{{ url('hospitals') }}">
                                        <strong>Hospitals</strong>
                                    </a>
                                </li>
                                <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor">
                                    <a href="{{ url('doctors') }}">
                                        <strong>Doctors</strong>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="main-panel">

      <!-- End Navbar -->
       @yield('dashboard_content')
     @yield('user_content')
     @yield('gallery_content')
     @yield('appointment_content')
     @yield('account_content')
     @yield('chat_system')
      @yield('booking_content')
      @yield('profile_content')

    
     <div class="uou-block-4a secondary">
        <div class="container">
            <p> <a href="#">© Copyright 2019</i></a> MediNaija. All rights reserved. 
            </p>
            <ul class="social-icons">
                <li>
                    <a href="http://www.facebook.com/medinaija"><i class="fa fa-facebook"></i></a></li>
                <li>
                    <a href="http://www.twitter.com/medinaija">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div> 
  </div>
  
   <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-material-design.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-tagsinput.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  

  // FOR IMAGE PATH DISPAY
      document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
    </script>
  
  
    @yield('script')
</body>
</html>