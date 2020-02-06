<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Picture extends Controller
{
     public function __construct()
   {
   	$this->middleware('auth');
   }
   
   public function picture()
   {
   	return view('picture');
   }
}
