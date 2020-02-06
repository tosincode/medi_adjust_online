<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class Dashboard extends Controller
{

   public function __construct()
   {
   	$this->middleware('auth');
   }
   
    public function dashboard()
    {

    	    $user = auth()->user()->user;
    	     $user_id = auth()->user()->id;

         


        if ($user == "hospital") {

         	 return view('dashboard');
    
               }
       elseif ($user == "doctor") {
	        $appointment = Appointment::where('doctor_id', $user_id);
	        $appointment_total = Appointment::where('doctor_id', $user_id)->where('Accept_appointment', 1);
	        return view('dashboard')->with('appointment', $appointment)->with('appointment_total', $appointment_total  );
     
   }
       elseif ($user == "user") {
    	
	        $appointment = Appointment::where('user_id', $user_id);
	        $appointment_total = Appointment::where('user_id', $user_id)->where('Accept_appointment', 1);
	        return view('dashboard')->with('appointment', $appointment)->with('appointment_total', $appointment_total  );
     
     }
      else{
          }       
    	
    }
}
