@extends('layout')


@section('listed_hospital')

 <div class="blog-content ">
            <div class="container">
                <div class="row">
                    <div class="single-direcotry-page">
                        <div class="row">
                            <div class="col-md-9 col-md-push-3">
                                <div class="content slider">
                                    <div class="cbp-slider">
                                        <ul class="cbp-slider-wrap">
                                            <li class="cbp-slider-item"> <img src="{{asset('uploads/images/'.$hospital_details->image)}}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="content specialties-list name_big_screen">
                                    <div class="title-content">
                                        <div class="doctor-hospital-title">
                                            <h5>Name</h5></div>
                                    </div>
                                    <div class="conten-desc">
                                        <ul class="cbp-l-project-details-list">
                                             <li>  <strong style="color:black;text-transform: uppercase;"> {{$hospital_details->full_name}} </strong></li>
                                         </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="title-content">
                                        <div class="doctor-hospital-title">
                                            <h5>About Us</h5></div> <span id="fav_dir619" class="fav-button"> <a  data-toggle="tooltip" data-placement="bottom" title="Add to Favorites" href="javascript:;"  > <span class="hide-sm">Verified&nbsp;&nbsp; </span> </a>
                                        </span>
                                    </div>
                                    <div class="conten-desc">
                                        <div class="cbp-l-project-desc-text"></div>
                                        <div class="cbp-l-project-desc-text">
                                            <ul class="qualification-list">
                                                <li><strong>For-profit or non-profit?</strong> <span> {{$hospital_details->non_profit}}</span></li>
                                                <li><strong>Size</strong> <span> {{$hospital_details->bed_size}} bedded</span></li>
                                                <li><strong>Cost</strong> <span>{{$hospital_details->average_cost}} </span></li>
                                                <li><strong>Average length of stay</strong> {{$hospital_details->length_of_stay}}<span> </span></li>
                                                <li><strong>Ownership</strong> <span> {{$hospital_details->ownership_type}}</span></li>
                                                <li><strong>Accredited by</strong> <span> {{$hospital_details->accreditation}}</span></li>
                                                <li><strong>Certifications</strong> <span> C.A.C</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="content specialties-list">
                                    <div class="title-content">
                                        <div class="doctor-hospital-title">
                                            <h5>Specialities</h5></div>
                                    </div>
                                    <div class="conten-desc specialist-list">
                                        <ul class="cbp-l-project-details-list">
                                            <li>{{$hospital_details->specialities}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content"></div>
                            </div>
                            <div class="col-md-3 col-md-pull-9">
                                <div class="medicaldirectory-sidebar">
                                    <div class="sidebar-content ">
                                        <div class="cbp-l-project-details-title name_small_screen "><span>Name</span></div>
                                         <ul class="cbp-l-project-details-list name_small_screen">
                                             <li style="text-transform: uppercase;">  <strong> {{$hospital_details->full_name}} </strong></li>
                                         </ul>
                                        
                                        <div class="cbp-l-project-details-title"><span>Contact Info</span></div>
                                        <ul class="cbp-l-project-details-list location-lists">
                                            <li>
                                                <strong>Location</strong>
                                                 {{$hospital_details->address}}
                                             </li>
                                                 <li>
                                                    <strong>Phone</strong>
                                                     <a  href="tel:{{$hospital_details->phonenumber}} ">{{$hospital_details->phonenumber}}</a>
                                                 </li>
                                                 <li><strong>Email</strong> {{$hospital_details->email}}
                                                 </li>
                                                 <li><strong>Website</strong> {{$hospital_details->website}}
                                            </li>
                                            <li><strong>Social Profile</strong></li>
                                            <li><strong>Share</strong> <a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="Share On Facebook" href="#"><i class="fa fa-facebook-square fa-2x"></i></a> <a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="Share On Twitter" href="#"><i class="fa fa-twitter fa-2x"></i></a> <a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="Share On linkedin" href="#"><i class="fa fa-linkedin-square fa-2x"></i></a> <a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="Share On google+" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
                                        </ul>
                                    </div>
                                   
                                   
                                    <div class="sidebar-content"></div>
                                    <div class="sidebar-content">
                                        <div class="cbp-l-project-details-title"><span>Reviews</span></div>
                                        <ul class="cbp-l-project-details-list stars">
                                            <li><strong>Cleanliness</strong>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Cleanliness','1')"> <i id="Cleanliness_1" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Cleanliness','2')"> <i id="Cleanliness_2" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Cleanliness','3')"> <i id="Cleanliness_3" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Cleanliness','4')"> <i id="Cleanliness_4" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Cleanliness','5')"> <i id="Cleanliness_5" class="uourating fa fa-star-o"></i></a>
                                            </li>
                                            <li><strong>Staff co-operation</strong>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Staff_co-operation','1')"> <i id="Staff_co-operation_1" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Staff_co-operation','2')"> <i id="Staff_co-operation_2" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Staff_co-operation','3')"> <i id="Staff_co-operation_3" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Staff_co-operation','4')"> <i id="Staff_co-operation_4" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Staff_co-operation','5')"> <i id="Staff_co-operation_5" class="uourating fa fa-star-o"></i></a>
                                            </li>
                                            <li><strong>Dignity and respect</strong>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Dignity_and_respect','1')"> <i id="Dignity_and_respect_1" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Dignity_and_respect','2')"> <i id="Dignity_and_respect_2" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Dignity_and_respect','3')"> <i id="Dignity_and_respect_3" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Dignity_and_respect','4')"> <i id="Dignity_and_respect_4" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Dignity_and_respect','5')"> <i id="Dignity_and_respect_5" class="uourating fa fa-star-o"></i></a>
                                            </li>
                                            <li><strong>Same-sex accommodation</strong>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Same-sex_accommodation','1')"> <i id="Same-sex_accommodation_1" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Same-sex_accommodation','2')"> <i id="Same-sex_accommodation_2" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Same-sex_accommodation','3')"> <i id="Same-sex_accommodation_3" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Same-sex_accommodation','4')"> <i id="Same-sex_accommodation_4" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Same-sex_accommodation','5')"> <i id="Same-sex_accommodation_5" class="uourating fa fa-star-o"></i></a>
                                            </li>
                                            <li><strong>Services</strong>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Services','1')"> <i id="Services_1" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Services','2')"> <i id="Services_2" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Services','3')"> <i id="Services_3" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Services','4')"> <i id="Services_4" class="uourating fa fa-star-o"></i></a>
                                                <a title="Submit Rating" href="javascript:;" onclick="save_rating('619','Services','5')"> <i id="Services_5" class="uourating fa fa-star-o"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-content">
                                        <div class="cbp-l-project-details-title"><span>Contact Us</span></div>
                                        <form action="#" id="message-pop" name="message-pop" method="POST" role="form">
                                            <div class="cbp-l-grid-projects-desc">
                                                <input id="subject" name="subject" type="text" placeholder="Enter Subject" class="cbp-search-input">
                                            </div>
                                            <div class="cbp-l-grid-projects-desc">
                                                <input name="email_address" id="email_address" type="text" placeholder="Enter Email" class="cbp-search-input">
                                            </div>
                                            <div class="cbp-l-grid-projects-desc">
                                                <textarea name="message-content" id="message-content" class="cbp-search-" cols="54" rows="4" title="Please Enter Message" placeholder="Enter Message"></textarea>
                                            </div>
                                            <input type="hidden" name="dir_id" id="dir_id" value="619"> <a onclick="send_message_iv();" class="btn btn-primary full-width">Send Message</a>
                                            <div id="update_message_popup"></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="medicaldirectory-sidebar">
                                    <div class="sidebar-content claims">
                                        <div class="cbp-l-project-details-title"><span>Claim</span></div>
                                        <form action="#" id="message-claim" name="message-claim" method="POST" role="form">
                                            <div class="cbp-l-grid-projects-desc">
                                                <input id="subject" name="subject" type="text" placeholder="Enter Subject" Value="Claim The Listing" class="cbp-search-input">
                                            </div>
                                            <div class="cbp-l-grid-projects-desc">
                                                <textarea name="message-content" id="message-content" class="cbp-search-" cols="56" rows="4" title="Please Enter Message" placeholder="Enter Message"></textarea>
                                            </div>
                                            <input type="hidden" name="dir_id" id="dir_id" value="619"> <a onclick="send_message_claim();" class="btn btn-primary full-width">Submit Claim</a>
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
<script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>
@endsection