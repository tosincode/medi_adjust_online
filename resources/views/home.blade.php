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
                    <form action="https://medinaija.com.ng/hospitals/" method="POST" class="form-inline advanced-serach" id="searchformhd" onkeypress="">
                        <div class="container">
                            <div class="input-field">
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" class="cbp-search-input" id="keyword" name="keyword" placeholder="Filter By Keyword" value="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <input type="text" class="cbp-search-input location-input" id="address" name="address" placeholder="Location" value="">
                                        <i class="fa fa-map-marker marker"></i>
                                        <input type="hidden" id="latitude" name="latitude" value="">
                                        <input type="hidden" id="longitude" name="longitude" value="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-chevron-down arrow"></i>
                                        <select name="dir_specialties" id="dir_specialties" class="cbp-search-select">
                                            <option class="cbp-search-select" value="">Choose a Speciality</option>
                                            <option class="cbp-search-select" value="Allergy & Immunology">Allergy & Immunology</option>
                                            <option class="cbp-search-select" value=" Anaesthesia"> Anaesthesia</option>
                                            <option class="cbp-search-select" value="Bariatric (Weight Loss) Surgery">Bariatric (Weight Loss) Surgery
                                            </option>
                                            <option class="cbp-search-select" value="Breast Reconstruction">
                                                Breast Reconstruction</option>
                                            <option class="cbp-search-select" value="Breast Surgery">Breast Surgery</option>
                                            <option class="cbp-search-select" value="Cardiac Surgery">Cardiac Surgery</option>
                                            <option class="cbp-search-select" value="Cardiology">Cardiology</option>
                                            <option class="cbp-search-select" value="Clinical Neurophysiology">Clinical Neurophysiology</option>
                                            <option class="cbp-search-select" value="Colonoscopy">Colonoscopy</option>
                                            <option class="cbp-search-select" value="Colorectal Surgery">Colorectal Surgery</option>
                                            <option class="cbp-search-select" value="Cosmetic ">Cosmetic</option>
                                            <option class="cbp-search-select" value="Dermatology">Dermatology</option>
                                            <option class="cbp-search-select" value="Cosmetic Surgery">Cosmetic Surgery</option>
                                            <option class="cbp-search-select" value="Dermatologic Surgery">Dermatologic Surgery</option>
                                            <option class="cbp-search-select" value="Dermatology">Dermatology</option>
                                            <option class="cbp-search-select" value="Dietetics">Dietetics</option>
                                            <option class="cbp-search-select" value="Ear">Ear</option>
                                            <option class="cbp-search-select" value=" Nose and Throat (ENT) Surgery"> Nose and Throat (ENT) Surgery</option>
                                            <option class="cbp-search-select" value="Endocrinology">Endocrinology</option>
                                            <option class="cbp-search-select" value="Gastroenterology">Gastroenterology</option>
                                            <option class="cbp-search-select" value="Gastroscopy">Gastroscopy</option>
                                            <option class="cbp-search-select" value="General Medicine">General Medicine</option>
                                            <option class="cbp-search-select" value="General Surgery">General Surgery</option>
                                            <option class="cbp-search-select" value="Gynaecology">Gynaecology</option>
                                            <option class="cbp-search-select" value="Hand Surgery">Hand Surgery</option>
                                            <option class="cbp-search-select" value="Interventional Cardiology">Interventional Cardiology</option>
                                            <option class="cbp-search-select" value="Laparoscopic Surgery">Laparoscopic Surgery</option>
                                            <option class="cbp-search-select" value="Liver Biopsy">Liver Biopsy</option>
                                            <option class="cbp-search-select" value="Maxillofacial Surgery">Maxillofacial Surgery</option>
                                            <option class="cbp-search-select" value="Mohs Micrographic Surgery">Mohs Micrographic Surgery</option>
                                            <option class="cbp-search-select" value="Mole checks and monitoring">Mole checks and monitoring</option>
                                            <option class="cbp-search-select" value=" Neurology"> Neurology</option>
                                            <option class="cbp-search-select" value="Neurosurgery">Neurosurgery</option>
                                            <option class="cbp-search-select" value="Obstetrics">Obstetrics</option>
                                            <option class="cbp-search-select" value="Oncology">Oncology</option>
                                            <option class="cbp-search-select" value="Ophthalmology">Ophthalmology</option>
                                            <option class="cbp-search-select" value="Oral Surgery">Oral Surgery</option>
                                            <option class="cbp-search-select" value="Orthopaedic Surgery">Orthopaedic Surgery</option>
                                            <option class="cbp-search-select" value="Osteopathy">Osteopathy</option>
                                            <option class="cbp-search-select" value="Paediatrics">Paediatrics</option>
                                            <option class="cbp-search-select" value="Physiotherapy">Physiotherapy</option>
                                            <option class="cbp-search-select" value="Plastic and Reconstructive Surgery">Plastic and Reconstructive Surgery</option>
                                            <option class="cbp-search-select" value="Psychiatry">Psychiatry</option>
                                            <option class="cbp-search-select" value="Psychotherapy">Psychotherapy</option>
                                            <option class="cbp-search-select" value="Reconstructive Surgery">Reconstructive Surgery</option>
                                            <option class="cbp-search-select" value="Rheumatology">Rheumatology</option>
                                            <option class="cbp-search-select" value="Skin Cancer Surgery and Management">Skin Cancer Surgery and Management</option>
                                            <option class="cbp-search-select" value="Urology">Urology</option>
                                            <option class="cbp-search-select" value="Vascular & Interventional Radiology">Vascular & Interventional Radiology</option>
                                            <option class="cbp-search-select" value="Vascular Surgery">Vascular Surgery</option>
                                            <option class="cbp-search-select" value="Wireless Capsule Endoscopy ">Wireless Capsule Endoscopy</option>
                                            <option class="cbp-search-select" value="Laboratory Scientist">Laboratory Scientist</option>
                                            <option class="cbp-search-select" value="Allergist">Allergist</option>
                                            <option class="cbp-search-select" value="Anaesthesiologist">Anaesthesiologist</option>
                                            <option class="cbp-search-select" value="General Practitioner">General Practitioner</option>
                                            <option class="cbp-search-select" value="Nurse">Nurse</option>
                                            <option class="cbp-search-select" value="Public Health Physician">Public Health Physician</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-chevron-down arrow">
            </i>
                                        <select name="dir_type" id="dir_type" class="cbp-search-select">
                                            <option class="cbp-search-select" value="rurl_1">Hospital
                                            </option>
                                            <option class="cbp-search-select" value="rurl_2">Doctor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group search">
                                        <button type="button" id="search_submit_m" name="search_submit_m" onClick='submitSearchForm()' class="btn-new btn-custom-search "> <i class="fa fa-search"></i>
                                            <span>Search</span>
                                        </button>
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
                                                        <p class="short-description">{{$doctor->description}}</p>
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
            </div>
        </div>
    </div>
    </div>

<script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>

@endsection