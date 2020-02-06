@extends('layout')

@section('content')

<div class="blog-content pt60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-us-content">
                            <h5>Make payment to book an appointment</h5>
                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-md-6 left-part">
                                        <div class="single-part">
                                     <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    
                   Kindly Subscribe to enjoy unlimited appointments and Chats with Our Doctors
                </div>
            </p>
            <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
            <input type="hidden" name="first_name" value="{{ Auth::user()->full_name }}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


            <p>

              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>
                                        </div>
                                        <h6>100% privacy guaranteed</h6>
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
