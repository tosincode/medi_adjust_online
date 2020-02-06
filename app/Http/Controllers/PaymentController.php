<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\User;
use App\Payment;
use App\User_profile;
use Mail;



class PaymentController extends Controller
{
      public function __construct()
   {
    $this->middleware('auth');
   }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */

     public function index()
    {


        return view("payment");
    }
    
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */

   

    public function handleGatewayCallback()
    {


        $paymentDetails = Paystack::getPaymentData();

        //dd($paymentDetails);

     $user = auth()->user();
       $getty = $paymentDetails['data'];

       $getcustomer = $getty['customer'];

       $getautorization = $getty['authorization'];

    // return  $getty['created_at']. ' '. $getty['paid_at']. ' '.$getty['ip_address']. ' '. $getcustomer['email']. ' '.$getty['transaction_date']. ' '.$getautorization['channel']. ' '.$getautorization['card_type']. ' '.$getautorization['brand'];

       $appointment = payment::create([

            'user_id' =>  $user->id,
           'payment_id'=>  $getty['id'],
            'email' => $getcustomer['email'],
            'ip_address' => $getty['ip_address'],
            'amount' => $getty['amount'],
            'paid_at' => $getty['paid_at'],
            'transaction_at' => $getty['created_at'],
            'channel' => $getautorization['channel'],
            'card_type' => $getautorization['card_type'],
            'bank' => $getautorization['bank'],
            'brand' => $getautorization['brand'],
           
            ]);
              
           $user_id = auth()->user()->id;
           $user_update = User::find($user_id);
           $user_update->paid = 1;
           $user_update->save();
           
           $user_profile_id = auth()->user()->id;
           $user_profile_update = User_profile::where("user_id",$user_profile_id)->first();
           $user_profile_update->paid = 1;
           $user_profile_update->save();
           
           
           
           
           
            $user_name = auth()->user()->full_name;
            $user_email = auth()->user()->email;
            $amount = $getty['amount'];
            $paymentdate = $getty['paid_at'];
             $paymentid = $getty['id'];


            $data = array('name'=>  $user_name, 'email' => $user_email,'amount' => $amount, 'paymentdate' =>$paymentdate,'paymentid' => $paymentid);
            Mail::send('paymentmessage', $data, function($message) {
          $user_email = auth()->user()->email;
          $user_name = auth()->user()->full_name;
          $message->to($user_email, $user_name)->subject
            ('Your Payment was successlly');
         $message->from('xyz@gmail.com','Medi Naija');

              });
      
           
        // return view("paymentsuccess");
       return redirect(url('/paymentsuccess'));

       // return  $user_name;

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}