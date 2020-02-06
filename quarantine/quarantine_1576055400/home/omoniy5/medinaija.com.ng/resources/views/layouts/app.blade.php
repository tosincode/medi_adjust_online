<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Welcome to MediNaija</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
       <link type="text/css" media="all" href="{{asset('css/hospital_style.css')}}" rel="stylesheet" />
      <link type="text/css" media="all" href="{{asset('css/doctor_style.css')}}" rel="stylesheet" />
    <link rel='stylesheet' id='iv_directories-font-css' href='https://fonts.googleapis.com/css?family=Raleway&amp;ver=5.2.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sb-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C300%2C400%2C600%2C700%7CDroid+Serif%3A400%2C700%2C400italic%7CMontserrat%3A400%2C700%7CNothing+You+Could+Do%7CLibre+Baskerville%3A400%2C400italic&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
 
  
    <link rel='stylesheet' id='open-sans-style-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C600%2C700&amp;ver=5.2.2' type='text/css' media='all' />
    <script type='text/javascript' src='{{asset("js/jquery.js")}}'>

    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
         .media-left img {
    width: 64px;
    height: 64px; 
    border-radius: 50%;
  
}
        body {
    margin: 0;
    font-family: "Nunito", sans-serif;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f8fafc;
}
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }
        
        /*  @media only screen and (max-width: 768px) {*/
        /*   .user-wrapper {*/
        /*    height:auto;*/
        /*}*/


        /*   }*/
        
         @media only screen and (max-width: 600px) {
           .user-wrapper {
            height:auto;
        }
          input[type=text]{
             width: 75%;
          }
          

           }
           @media only screen and (min-width: 992px) {
            input[type=text]{
             width: 90%;
          }

           }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float: right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: #eeeeee;
        }

        input[type=text] {
            
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
        .btn-primary{
   /*width:20%;*/

     width: 70px;
    color: #fff;
    height: 40px;
    background-color: #3490dc;
    border-color: #3490dc;
    margin-top: -8px;
    font-weight: bold;
    }
         p{
        font-size: 1.7rem;
    }
    </style>
</head>
<body>
<div id="app">
      <div class="uou-block-11a mobileMenu">
        <h5 class="title">Menu</h5>
        <a href="#" class="mobile-sidebar-close">X </a>
        <nav class="main-nav">
            <ul id="menu-menumain" class="">
                <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-65 current_page_item menu-item-68 active ">
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
                    Welcome {{ Auth::user()->full_name }}
                </li>
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

    <main class="py-4">
        @yield('content')
    </main>
</div>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
//   if (window.matchMedia('(max-width: 768px)').matches)
// {
 

//     if ($(".user-wrapper").css("height", "500")){
//         $(".user-wrapper").css("overflow-y", "scroll");
//     } 
//     else{
//         $(".user-wrapper").css("height", "auto");
//     }
    
// }
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#show_user').click(function(e){
  e.preventDefault();
  $('.expander').slideToggle();
    $('html, body').animate({
        scrollTop: 1000
    }, 2000);
});

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('90d34a76a51861bb0386', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });
        
         $(document).on("click","#btn-primary",function(e) {
                e.preventDefault();
               var message = $(".submit").val();
            
            if (message != '' && receiver_id != '') {
                // while pressed enter text box will be empty
                $(".submit").val('')

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }

      
    });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
</body>
</html>
