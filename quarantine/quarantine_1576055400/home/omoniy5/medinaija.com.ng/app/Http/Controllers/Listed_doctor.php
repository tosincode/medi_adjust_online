<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class Listed_doctor extends Controller
{
  public function listed_doctor($user_id)
  {
  	 $doctor_details = Doctor::findOrFail($user_id);

         return view("listed_doctor",compact('doctor_details'));
  }
}
