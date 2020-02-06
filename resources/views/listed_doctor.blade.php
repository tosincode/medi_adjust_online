@extends('layout')


@section('listed_doctor')

     <div class="blog-content pt30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-direcotry-page">
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="doctor-short-bio clearfix content">
                                        <div class="cbp-l-member-img name_big_screen"> <img src="{{asset('uploads/images/'.$doctor_details->image)}}" alt="medi_naija_doctor">
                                        <br>
                                        <p style="color:black;font-weight:bold"> Dr. {{ $doctor_details->full_name }} <br> </p>
                                        
                                        </div>
                                        <div class="title-content">
                                            <div class="doctor-hospital-title">
                                                <h5>Profile Description</h5>
                                            </div> <span id="fav_dir567" class="fav-button"> <a  data-toggle="tooltip" data-placement="bottom" title="Add to Favorites" href="javascript:;"  > <span class="hide-sm">Verified&nbsp;&nbsp; </span> </a>
                                            </span>
                                        </div>
                                        <div class="cbp-l-doctor-info">
                                            <div class="cbp-l-doctor-desc" style="padding-left:20px;padding-right:20px">
                                                
                                                
                                                {{ $doctor_details->description }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="title-content">
                                            <div class="doctor-hospital-title">
                                                <h5>Qualifications</h5></div>
                                        </div>
                                        <div class="conten-desc">
                                            <div class="cbp-l-project-desc-text">
                                                <ul class="qualification-list">
                                                    <li><strong>Gender</strong> <span>
                                                        {{ $doctor_details->gender }} 
                                                    </span></li>
                                                    <li><strong>Hospital Affiliations</strong> <span> 
                                                       {{ $doctor_details->affiliation }}
                                                    </span>
                                                   </li>
                                                    <li><strong>Experience / Tranining</strong> <span>  
                                                        {{ $doctor_details->experience }}  years</span>
                                                    </li>
                                                    <li><strong>Medical School</strong> <span> {{ $doctor_details->medical_school }}</span></li>
                                                    <li><strong>Internship</strong> <span> {{ $doctor_details->internship }}</span></li>
                                                    <li><strong>Residency</strong> <span> 
                                                      {{ $doctor_details->residency }}
                                                    </span></li>
                                                    <li><strong>Fellowship</strong> <span>
                                                     {{ $doctor_details->fellowship }} </span></li>
                                                    <li><strong>Certifications</strong> <span> {{ $doctor_details->certifications }}</span></li>
                                                    <!-- <li><strong>Leadership Roles</strong> <span> </span></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content specialties-list">
                                        <div class="title-content">
                                            <div class="doctor-hospital-title">
                                                <h5> Specialties</h5></div>
                                        </div>
                                        <div class="conten-desc specialist-list">
                                            <ul class="cbp-l-project-details-list">{{ $doctor_details->specialities }}</ul>
                                        </div>
                                    </div>
                                    <div class="content"></div>
                                    <div class="content"></div>
                                    <div class="content"></div>
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <div class="medicaldirectory-sidebar">
                                        <div class="cbp-l-member-img name_small_screen"> 
                                        <img src="{{asset('uploads/images/'.$doctor_details->image)}}" alt="medi_naija_doctor">
                                        <p style="color:black;font-weight:bold"> Dr. {{ $doctor_details->full_name }}<br> </p>
                                        </div>
                                      
                                       
                                        <div class="sidebar-content"></div>
                                        <div class="sidebar-content">
                                            <div class="cbp-l-project-details-title"><span>Reviews</span></div>
                                            <ul class="cbp-l-project-details-list stars">
                                               
                                                <li><strong>Punctuality</strong>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Punctuality','1')"> <i id="Punctuality_1" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Punctuality','2')"> <i id="Punctuality_2" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Punctuality','3')"> <i id="Punctuality_3" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Punctuality','4')"> <i id="Punctuality_4" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Punctuality','5')"> <i id="Punctuality_5" class="uourating fa fa-star-o"></i></a>
                                                </li>
                                                <li><strong>Helpfulness</strong>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Helpfulness','1')"> <i id="Helpfulness_1" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Helpfulness','2')"> <i id="Helpfulness_2" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Helpfulness','3')"> <i id="Helpfulness_3" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Helpfulness','4')"> <i id="Helpfulness_4" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Helpfulness','5')"> <i id="Helpfulness_5" class="uourating fa fa-star-o"></i></a>
                                                </li>
                                                <li><strong>Knowledge</strong>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Knowledge','1')"> <i id="Knowledge_1" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Knowledge','2')"> <i id="Knowledge_2" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Knowledge','3')"> <i id="Knowledge_3" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Knowledge','4')"> <i id="Knowledge_4" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Knowledge','5')"> <i id="Knowledge_5" class="uourating fa fa-star-o"></i></a>
                                                </li>
                                                <li><strong>Bedside Manner</strong>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Bedside_Manner','1')"> <i id="Bedside_Manner_1" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Bedside_Manner','2')"> <i id="Bedside_Manner_2" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Bedside_Manner','3')"> <i id="Bedside_Manner_3" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Bedside_Manner','4')"> <i id="Bedside_Manner_4" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Bedside_Manner','5')"> <i id="Bedside_Manner_5" class="uourating fa fa-star-o"></i></a>
                                                </li>
                                                <li><strong>Wait Time</strong>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Wait_Time','1')"> <i id="Wait_Time_1" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Wait_Time','2')"> <i id="Wait_Time_2" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Wait_Time','3')"> <i id="Wait_Time_3" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Wait_Time','4')"> <i id="Wait_Time_4" class="uourating fa fa-star-o"></i></a>
                                                    <a title="Submit Rating" href="javascript:;" onclick="save_rating('567','Wait_Time','5')"> <i id="Wait_Time_5" class="uourating fa fa-star-o"></i></a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="sidebar-content">
                                            <div class="cbp-l-project-details-title"><span>Chat live by booking an appointment</span></div>
                                            <form action="#" id="message-pop" name="message-pop" method="POST" role="form">
                                               
                                                <a href="{{ url('appointments/'. $doctor_details->user_id.'/create') }}" class="btn btn-primary full-width">Book an appointment</a>
                                                <div id="update_message_popup"></div>
                                            </form>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="medicaldirectory-sidebar">
                                        <div class="sidebar-content claims">
                                            <div class="cbp-l-project-details-title"><span>Claim The Listing</span></div>
                                            <form action="#" id="message-claim" name="message-claim" method="POST" role="form">
                                                <div class="cbp-l-grid-projects-desc">
                                                    <input id="subject" name="subject" type="text" placeholder="Enter Subject" Value="Claim The Listing" class="cbp-search-input">
                                                </div>
                                                <div class="cbp-l-grid-projects-desc">
                                                    <textarea name="message-content" id="message-content" class="cbp-search-" cols="56" rows="4" title="Please Enter Message" placeholder="Enter Message"></textarea>
                                                </div>
                                                <input type="hidden" name="dir_id" id="dir_id" value="567"> <a onclick="send_message_claim();" class="btn btn-primary full-width">Submit Claim</a>
                                                <div id="update_message_claim"></div>
                                            </form>
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