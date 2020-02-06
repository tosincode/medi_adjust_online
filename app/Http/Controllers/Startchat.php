<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Appointment;


class Startchat extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

     public function startchat()
    {
           $user = auth()->user();
           if ($user->user == "user") {
          
                 $user_appointment = Appointment::where('user_id', '=', $user->id)->where('Accept_appointment', '=', 1)->first();
                  return view('startchat')->with('user_appointment', $user_appointment);
                
          }
           elseif ($user->user == "doctor") {
               
                $doctor_appointment = Appointment::where('doctor_id', '=',$user->id)->where('Accept_appointment', '=', 1)->first();
                  return view('startchat')->with('doctor_appointment', $doctor_appointment);
           }
           else
           {
               
           }
    }
}
