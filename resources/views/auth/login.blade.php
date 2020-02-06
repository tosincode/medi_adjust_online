@extends('layout')


@section('content')

<div class="blog-content pt60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-us-content">
                            <h5>{{ __('Login') }}</h5>
                            <div class="contact-info">
                                <div class="row">
                                <div class="col-md-6 left-part">
                                        <a href="/login/facebook">  <img src="{{asset('images/continue_with_facebook.png')}}" class="home-category-img" alt="home category" style="height: 60px;margin-top:20px;width:310px;"></a>
                                        
                                       <!--        <a href="/login/google" class="btn" style="color:black;border:2px solid #1d5f8a;width:310px;height:53px;padding-top: 6px; margin-top:20px;padding-left:-4px;"> -->
                                       <!-- <i class="fa fa-google" style="font-size: 30px;margin-right: 70px;padding-right:0;color:red;"></i>-->
                                        
                                       <!--<span style="font-size: 19px;text-transform: capitalize;font-weight: bold;-->
                                       <!--    margin-left: -50px;">Continue with gmail</span>-->
                    
                                       <!-- </a>-->
                                         
                                                             
                                                </div>
                                                
                                    <div class="col-md-6">
                                        <div class="single-part">
                                            
                                            
                                      <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Not registered') }}
                                    </a>
                                        </div>
                                        <h6>100% privacy guaranteed</h6>
                                    </div>
                                    
                                                
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>
    
@endsection
