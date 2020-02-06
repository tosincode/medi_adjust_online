<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Hospital;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' =>'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
       	 $doctors = Doctor::where('user','doctor')->take(4)->get();
   

        $hospitals = Hospital::where('user','hospital')->take(4)->get();
        

    	return view("index")->with('doctors',$doctors)->with('hospitals',$hospitals);
          //return view('home');
    }
}
