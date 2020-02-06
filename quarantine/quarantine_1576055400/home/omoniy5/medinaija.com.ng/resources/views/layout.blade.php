<!doctype html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Welcome to MediNaija</title>
   
   <meta name="description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Welcome to MediNaija" />
    <meta property="og:description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <meta property="og:site_name" content="MediNaija" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised" />
    <meta name="twitter:title" content="Welcome to MediNaija" />
   
    <script type='application/ld+json' class='yoast-schema-graph yoast-schema-graph--main'>
        {"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://medinaija.com.ng/#organization","name":"noiZ Investment","url":"https://medinaija.com.ng/","sameAs":[],"logo":{"@type":"ImageObject","@id":"https://medinaija.com.nag/#logo","url":"https://medinaija.com.ng/wp-content/uploads/2017/11/FInal-01.png","width":10172,"height":2614,"caption":"noiZ Investment"},"image":{"@id":"https://medinaija.com.ng/#logo"}},{"@type":"WebSite","@id":"https://medinaija.com.ng/#website","url":"https://medinaija.com.ng/","name":"MediNaija","publisher":{"@id":"https://medinaija.com.ng/#organization"},"potentialAction":{"@type":"SearchAction","target":"https://medinaija.com.ng/?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"WebPage","@id":"https://medinaija.com.ng/#webpage","url":"https://medinaija.com.ng/","inLanguage":"en-US","name":"Welcome to MediNaija","isPartOf":{"@id":"https://medinaija.com.ng/#website"},"about":{"@id":"https://medinaija.com.ng/#organization"},"datePublished":"2017-10-28T12:04:11+00:00","dateModified":"2017-11-16T15:43:21+00:00","description":"Medinaija is a web-based application that enlists all hospitals, pharmacies and medical practitioners in Nigeria. Enlistments are verified before publicised"}]}</script>
    <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <link rel="icon" href="{{asset('images/medinaija_logo.png')}}">
    <!--  <link href='https://cdn.shortpixel.ai/' rel='preconnect' />
  
   <!--   <link type="text/css" media="all" href="{{asset('css/main.css')}}" rel="stylesheet" /> -->
     <link type="text/css" media="all" href="{{asset('css/hospital_style.css')}}" rel="stylesheet" />
      <link type="text/css" media="all" href="{{asset('css/doctor_style.css')}}" rel="stylesheet" />
    <link rel='stylesheet' id='iv_directories-font-css' href='https://fonts.googleapis.com/css?family=Raleway&amp;ver=5.2.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sb-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C300%2C400%2C600%2C700%7CDroid+Serif%3A400%2C700%2C400italic%7CMontserrat%3A400%2C700%7CNothing+You+Could+Do%7CLibre+Baskerville%3A400%2C400italic&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
 
    <link rel='stylesheet' id='roboto-style-css' href='https://fonts.googleapis.com/css?family=Roboto+Slab%3A400%2C700&amp;ver=5.2.2' type='text/css' media='all' />
    <link rel='stylesheet' id='open-sans-style-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C600%2C700&amp;ver=5.2.2' type='text/css' media='all' />
    <script type='text/javascript' src='{{asset("js/jquery.js")}}'>

    </script>
    <script type='text/javascript' src='{{asset("css/app.css")}}'>
        
    </script>
    
   <style>
       
         @media only screen and (max-width: 600px) {
           .name_small_screen{
               display:none;
           }

           }
           @media only screen and (min-width: 992px) {
            .name_big_screen{
             display:none;
          }

           }
   </style>
  
</head>


<body class="home page-template page-template-templates page-template-home page-template-templateshome-php page page-id-65">



<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{2522649354465974}',
      cookie     : true,
      xfbml      : true,
      version    : '{v4.0}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

  
    
    <div class="uou-block-11a mobileMenu">
         @guest
                   @if (Route::has('register'))
        
         @endif
         
         @else
          Welcome {{ Auth::user()->full_name }}
          @endguest
        <h5 class="title">Menu</h5>
        <a href="#" class="mobile-sidebar-close">X </a>
        <nav class="main-nav">
            <ul id="menu-menumain" class="">
                <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-65 current_page_item menu-item-68 ">
                    <a href="/" aria-current="page">Home</a>
                </li>
                <li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69"><a href="{{ url('about_us') }}">About Us</a></li>
                <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="{{ url('contact') }}">Contact Us</a>
                </li>
                <li id="menu-item-216" class="menu-item menu-item-type-post_type_archive menu-item-object-hospital menu-item-216">
                    <a href="{{url('hospitals') }}">Hospitals</a>
                </li>
                <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor menu-item-218">
                    <a href="{{ url('doctors') }}">Doctors</a>
                </li>
                  @guest
                   @if (Route::has('register'))
                 <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor menu-item-218">
                    <a href="{{ url('login') }}">Login</a>
                </li>
                 <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor menu-item-218">
                    <a href="{{ url('register') }}">Register</a>
                </li>
                  @endif
                  @else
               
                <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor menu-item-218">
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                 <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor menu-item-218">
                    <a href="{{ url('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                                 </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                   
                </li>

                  @endguest
            </ul>
        </nav>
        <hr>
    </div>
    <div id="main-wrapper">
        <div id="app">
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
                                <a href="/login/facebook">  <img src="{{asset('images/continue_with_facebook.png')}}" class="home-category-img" alt="home category" style="height: 60px;margin-top:20px;width:210px;"></a>
                                        
                                               <a href="/login/google" class="btn" style="color:black;border:2px solid #1d5f8a;width:210px;height:53px;padding-top: 6px; margin-top:20px;padding-left:-4px;"> 
                                        <i class="fa fa-google" style="font-size: 30px;margin-right: 80px;padding-right:0;color:red;"></i>
                                        
                                       <span style="font-size: 14px;text-transform: capitalize;font-weight: bold;
                                           margin-left: -80px;">Continue with gmail</span>
                    
                                        </a>
                                        <br>
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
                                        <a href="/dashboard"> <i class="fa fa-edit"></i> &nbsp;Profile &nbsp;</a>
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
            <div class="box-shadow-for-ui">
                <div class="uou-block-2b">
                    <div class="container">
                        <a href="/" class="logo">
                            <img src="{{asset('images/medinaija_logo.png')}}" alt="image"> </a>
                        <a href="/" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span>
                        </a>
                       <nav class="nav">
                            <ul class="sf-menu sf-menu">
                                <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-65 current_page_item {{ (request()->is('/')) ? 'active' : '' }} ">
                                    <a href="/" >
                                        <strong>Home</strong>
                                    </a>
                                </li>
                                <li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page {{ (request()->is('about_us')) ? 'active' : '' }}" >
                                    <a href="{{ url('about_us') }}">
                                        <strong>About Us</strong>
                                    </a>
                                </li>
                                <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page {{ (request()->is('contact')) ? 'active' : '' }} ">
                                    <a href="{{ url('contact') }}">
                                        <strong>Contact Us</strong>
                                    </a>
                                </li>
                                <li id="menu-item-216" class="menu-item menu-item-type-post_type_archive menu-item-object-hospital {{ (request()->is('hospitals')) ? 'active' : '' }}">
                                    <a href="{{ url('hospitals') }}">
                                        <strong>Hospitals</strong>
                                    </a>
                                </li>
                                <li id="menu-item-218" class="menu-item menu-item-type-post_type_archive menu-item-object-doctor {{ (request()->is('doctors')) ? 'active' : '' }}">
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
        <div>
            @yield('index_content')
            @yield('about_content')
            @yield('contact_content')
            @yield('hospitals_content')
            @yield('doctors_content')
            @yield('registration_content')
            @yield('listed_hospital')
            @yield('listed_doctor')
            @yield('content')
            @yield('dashboard_content')
            @yield('hospital_search_content')
            @yield('general_hospitals_content')
            @yield('general_medicine_content')
            @yield('pharmacy_content')
            @yield('private_medicine_content')
            @yield('specialist_hospital_content')
            @yield('cardiologist_content')
            @yield('endocrinologist_content')
            @yield('general_medical_content')
            @yield('general_practitioner_content')
            @yield('geriatrician_content')
            @yield('laboratory_scientist_content')
            @yield('nurse_content')
            @yield('optician_content')
            @yield('public_health_physcian_content')
            @yield('surgeon_content')
            @yield('register_content')
            @yield('signup_content')
            @yield('success_content')





        </div>
    <div class="uou-block-4e">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#" class="logo"><img src="{{asset('images/medinaija_logo.png')}}" alt="image"></a>
                    <ul class="contact-info has-bg-image contain" data-bg-image="{{asset('images/footer-map-bg.png')}}">
                        <li><i class="fa fa-map-marker"></i><address> VGC, Lagos, Nigeria.</address></li>
                        <li><i class="fa fa-phone"></i><a href="tel:#">014625844</a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:">info@medinaija.com.ng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="uou-block-4a secondary">
        <div class="container">
            <p> <a href="#">© Copyright 2019</i></a>  All rights reserved. <a href="#">MediNaija.
 </a>
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
    <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCIqlk2NLa535ojmnA7wsDh0AS8qp0-SdE&amp;libraries=places&amp;ver=5.2.2'></script>
    <script type='text/javascript'>
        var jsdata = {
            "hospital_url": "https:\/\/medinaija.com.ng\/hospital\/",
            "doctor_url": "https:\/\/medinaija.com.ng\/doctor\/"
        };
    </script>
    @yield('hospital_script')
    <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>
    <script type="text/javascript" defer src="{{asset('js/autoptimize_8ac5055cabfa27ecd82e7dcb7e265ca5.js')}}"></script>
    <script type="text/javascript" defer src="{{asset('js/autoptimize_5e3c9a0d26bc9930f253e8588eab9d18.js')}}"></script>
    <script type="text/javascript" defer src="{{asset('js/autoptimize_80fd6d39c6d9c00f8f343318cf599791.js')}}"></script>
</body>


</html>