@extends('layout')


@section('contact_content')

<div class="blog-content pt60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-us-content">
                            <h5>Contact Information @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
         @endif</h5>
                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-md-6 left-part">
                                        <div class="single-part">
                                            <h6>Find Us On Map</h6>
                                            <p>&nbsp;</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Address Details</h6>
                                                    <div class="address-single"><i class="fa fa-map-marker"></i>
                                                        <br /> Victoria Garden city,</div>
                                                    <div>Victoria island. Lagos State Nigeria</div>
                                                    <div class="address-single"><i class="fa fa-phone"></i>
                                                        <br /> <b>Phone: 014625844</b></div>
                                                    <div class="address-single"><i class="fa fa-envelope-o"></i>
                                                        <br /> <b>Email:</b><a href="#">info@medinaija.com.ng</a>
                                                        <br /> <b>Website:<a href="#">www.medinaija.com.ng</a></b></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Opening Hours</h6>
                                                    <div class="address-single"><i class="fa fa-clock-o"></i>The gospel truth is we do not go offline
                                                        <br /> <b>Mo-Fri:</b> 24/7
                                                        <br /> <b>Saturday:24/7</b>
                                                        <br /> <b>Sunday:24/7</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-part">
                                            <div class="contact-form">
                                                <div class="form-field">
                                                    <h6>Send Us a Message</h6>
                                                    <p>In case you had any questions or you needed any information about our activities, feel free to send us an email. We will respond quickly.</p>
                                                    <form method="POST" action="{{route('contactus')}}" name="contactus" id="contactus" class="form-horizontal" role="form">
                                                        {{csrf_field()}}
                                                        <div class="form-group row">
                                                            <div class="col-md-7">
                                                                <input type="text" name="contact_name" id="contact_name" data-validation="required" data-validation-error-msg="Your Name" class="form-control ctrl-textbox" placeholder="Enter your name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-7">
                                                                <input type="email" name="contact_email" id="contact_email" data-validation="email" class="form-control ctrl-textbox" placeholder="Your email" data-validation-error-msg="Please enter a valid email address ">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-7">
                                                                <input type="text" name="contact_subject" class="form-control ctrl-textbox" placeholder="Subject">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea id="contact_content" name="contact_content" class="form-control" placeholder="Message" data-validation="required"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 text-left">
                                                                <button type="submit" class="btn-new btn-custom full-width"> Send Message</button>
                                                                <div id="update_message"></div>
                                                            </div>
                                                        </div>
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
            </div>
        </div>
         <script type="text/javascript" defer src="{{asset('js/autoptimize_237807f1b818d068f63a7d83eb52108c.js')}}"></script>
@endsection