<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Hospital;

class Test extends Controller
{
    public function index()
    {


    	 $doctors = Doctor::where('user','doctor')->take(6)->get();
   

        $hospitals = Hospital::where('user','hospital')->take(4)->get();
        

    	return view("test")->with('doctors',$doctors)->with('hospitals',$hospitals);
    }
}
