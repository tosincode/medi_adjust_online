@extends('layout')



@section('index_content')


 <div class="medicaldirectory-home-banner" style="background: url({{asset('images/medinaija-doctors.png')}}) top center no-repeat;">
            <div class="overlay"></div>
            <div class="banner-content">
                <div class="container">
                    <div class="home-banner-text">
                        <div class="row">
                            <div class="text-center">
                                <div class="banner-icon">
                                    <i class="fa fa-user-md"></i>
                                </div>
                                <h2> Welcome to MediNaija</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <p> Search for a hospital, pharmacy or any medical practitioner in Nigeria</p>
                            </div>
                        </div>
                    </div>
                    <div class="home-banner-button text-center">
                        <button type="button" class="btn-new btn-custom" onclick="location.href='/hospitals'">FIND A HOSPITAL</button>
                        <button type="button" class="btn-new btn-custom-white" onclick="location.href='/doctors'">FIND A DOCTOR</button>
                    </div>
                </div>
                 <div class="home-search-content">
                    <form action="{{url('general_search')}}" method="GET" class="form-inline advanced-serach" id="searchformhd" >
                        @csrf
                        <div class="container">
                            <div class="input-field">
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" class="cbp-search-input" id="keyword" name="keyword" placeholder="Filter By Keyword" value="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" class="cbp-search-input location-input" id="address" name="city" placeholder="Location" value="">
                                        <i class="fa fa-map-marker marker"></i>
                                        <input type="hidden" id="latitude" name="latitude" value="">
                                        <input type="hidden" id="longitude" name="longitude" value="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-chevron-down arrow"></i>
                                        <select name="category" id="dir_specialties" class="cbp-search-select">
                                                  <option class="cbp-search-select" value="">Choose a Speciality</option>
                                                  <option value="">Select your speciality</option>
                                                  <option value="Cardiologist">Cardiologist</option>
                                                  <option value="Endocrinologist"> Endocrinologist</option>
                                                  <option value="General Medicals"> General Medicals</option>
                                                  <option value="Specialist Hospital"> General Practitioner</option>
                                                  <option value="Geriatrician">Geriatrician</option>
                                                  <option value="Laboratory Scientist">Laboratory Scientist</option>
                                                  <option value="General Medicals"> General Medicals</option>
                                                  <option value=" Nurse">  Nurse</option>
                                                  <option value="Public Health Physician">Public Health Physician</option>
                                                  <option value="surgeons">Surgeons</option>
                                                  <option value="General Hospital">General Hospital</option>
                                              <option value="General Medicine">General Medicine</option>
                                              <option value="Pharmacy">Pharmacy</option>
                                              <option value="Specialist Hospital">Specialist Hospital</option>
                                              <option value="Private Hospital">Private Hospital</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-chevron-down arrow">
            </i>
                                        <select name="search_category" id="dir_type" class="cbp-search-select">
                                            <option class="cbp-search-select" value="Hospital">Hospital
                                            </option>
                                            <option class="cbp-search-select" value="Doctor">Doctor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group search">
                                        <button type="submit" id="submit" name="submit" class="btn-new btn-custom-search "><i class="fa fa-search"></i> <span>Search</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="blog-content pbzero home-blog">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="feature-content-body">
                        <div class="col-md-4 matchHeight" style="background: #ffffff;">
                            <div class="feature-content-single">
                                <h5>
                <i class="fa fa-hospital-o"></i> Hospital</h5>
                                <p>With countless of hospitals across the country medinaija is the right place to find your closest healthcare center</p>
                                <a href="/hospitals">
                                <div class="button-content">
                                    <button type="button" class="btn btn-transparent" >Search Now</button>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 matchHeight  middle" style="background: #ffffff;">
                            <div class="feature-content-single">
                                <h5><i class="fa fa-user-md"></i> Doctor</h5>
                                <p>Find the right doctor within the closest hospital across a wide range of medical fields including neurosurgery</p>

                                <a href="/doctors">
                                <div class="button-content">
                                    <button type="button" class="btn btn-transparent" >Search Now
                                    </button>
                                </div>
                                 </a>
                            </div>
                        </div>
                        <div class="col-md-4 matchHeight" style="background: #ffffff;">
                            <div class="feature-content-single">
                                <h5><i class="fa fa-file-text-o"></i>Register Now</h5>
                                <p>You&#039;re a medical center with hospitals and doctors worldwide, medical directory is the right place to list your hospitals and doctors, join us now</p>
                                <div class="button-content">
                                    <button type="button" class="btn btn-transparent" onclick="location.href='/register'">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center;">
                    <div class="doctor-feature-content pt50 pb50 home-shortcodes">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="row">
                                        <h2 class="home-title" style="text-align: center;"><strong> Featured  Doctor </strong></h2>
                                        <div class="categories-imgs text-center">
                                             <?php foreach ($doctors  as $doctor ): ?>
                                            <div class="col-md-3 col-sm-6">
                                                <a href="/listed_doctor/{{ $doctor->user_id}}" style="color:#000000;">
                                                    <div class="f-doctore-single">
                                                        <div class="image-wrapper-content"> <img src="{{asset('uploads/images/'.$doctor->image)}}" class="home-category-img" alt="home category">
                                                            <div class="categories-wrap-shadow">

                                                            </div>
                                                            <div class="inner-meta "> <i class="fa fa-link"></i>
                                                            </div>
                                                        </div>
                                                        <span style="font-size:15px; padding-bottom: 0;">{{$doctor->full_name}}</span>
                                                        <p class="f-doctor-subtitle">{{$doctor->specialities}}&nbsp;</p>
                                                        
                                                    </div>
                                                </a>
                                            </div>
                                           
                                          <?php endforeach ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                
                <h2 class="home-title" style="text-align: center; padding-top: 30px;"><strong>Join Us Now</strong></h2>
                <div class="home-subtitle">If you own a hospital, pharmacy, or you are a medical practitioner, enlist yourself or your medical professionalism here with us at MediNaija. We will make your patient connect with you without meeting with you physically. That is our missionary promise!</div>
                <div style="text-align: center;">
                    <noscript> </noscript>
                    <div class="pricing-table-content">
                        <div class="container">
                            <div class="text-center row">
                                <div class="col-md-4">
                                    <ul id="pt-1" style="width:  100%;">
                                        <li>
                                            <h2>WELCOME PACKAGE</h2>
                                            <h3>$ no currency<span> &nbsp; </span></h3>
                                            <ul></ul>
                                            <div class="submit-btn"> <a href="/register">Sign up Now</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
             
                </div>
            

<script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>

@endsection