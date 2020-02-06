<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Doctor_modal_controller extends Controller
{
    public function index()
    {
    	return view('doctor_modal');

    	// return "yes". $id;
    }
}
