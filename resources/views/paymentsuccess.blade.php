@extends('layout')

@section('success_content')

<div class="blog-content pt60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-us-content">
                            <h5>Thank You!</h5>
                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-md-6 left-part">
                                        <div class="single-part">
                                     <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-12 col-md-offset-2">
           
                Your payment was successful, Kindly Continue to  enjoy everything our platform offers
          
          </div>
        </div>
</form>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-part">
                                            <div class="contact-form">
                                               
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
