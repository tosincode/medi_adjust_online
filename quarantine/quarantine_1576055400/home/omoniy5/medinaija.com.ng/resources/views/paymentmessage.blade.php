@extends('payment_html')


@section('payment_sent')

<div class="card">
  <div class="card-header" style="background: #4fad35;color: white;padding-top:30px;padding-bottom:30px;padding-left:30px">
   PAYMENT DETAILS
  </div>
 
</div>

<h3>Hi, {{ $name }}</h3>

<p>Thank you for choosing MediNaija. Here's a summary of your payment. </p>

Payment Date: {{ $paymentdate }} <br>
Transaction ID: {{ $paymentid }} <br>
Amount: {{ $amount }}  Naira<br>
 
	 

<img src="{{asset('images/medinaija_logo.png')}}">

<p>From Medi Naija.</p>


@endsection