@extends('layout')

@section('register_content')

<div class="blog-content pt60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-us-content">
                            <h5>{{ __('To Start, Please Provide Your Basic Info.') }}</h5>
                            <div class="contact-info">
                                
                              
                                <div class="row">
                                    
                                    
                                    <div class="col-md-6 left-part" >
                                        <div class="single-part">
                                        <!--       <a href="/login/facebook" class="btn btn-primary" style="background:#1d5f8a;border:2px solid #1d5f8a;width:245px;height:53px;padding-top: 6px; margin-top:20px;margin-right:5px;"> -->
                                        <!--<i class="fa fa-facebook" style="font-size: 30px;margin-right: 20px;"></i>-->
                                        
                                        <!--Signin with Facebook-->
                    
                                        <!--</a>-->
                                        
                                        <a href="/login/facebook">  <img src="{{asset('images/continue_with_facebook.png')}}" class="home-category-img" alt="home category" style="height: 60px;margin-top:20px;width:310px;"></a>
                                        
                                       <!--        <a href="/login/google" class="btn" style="color:black;border:2px solid #1d5f8a;width:310px;height:53px;padding-top: 6px; margin-top:20px;padding-left:-4px;"> -->
                                       <!-- <i class="fa fa-google" style="font-size: 30px;margin-right: 70px;padding-right:0;color:red;"></i>-->
                                        
                                       <!--<span style="font-size: 19px;text-transform: capitalize;font-weight: bold;-->
                                       <!--    margin-left: -50px;">Continue with gmail</span>-->
                    
                                       <!-- </a>-->
                                        
                                        
                                        <br>
                                        
                                      <!--<a href="/login/google">  <img src="{{asset('images/btn_google_signin.png')}}" class="home-category-img" alt="home category" style="height: 60px;margin-top:20px;"></a>-->
                                      
                                            </div>
                                        </div>
                                    
                                    
                                    
                                    <div class="col-md-6 ">
                                        <div class="single-part">
                                          
                                           <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="full_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row" >
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Are you a ') }}</label>
                               <div class="col-md-6">
                                <select class="form-control" name="user">
                                    <option value="user">Patient</option>  
                                    <option value="doctor">Doctor</option>
                                    <option value="hospital">Hospital</option>
                                </select>
                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="number">

                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
