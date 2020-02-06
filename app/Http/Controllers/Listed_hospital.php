<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\User_profile;
use Illuminate\Http\Request;

class Listed_hospital extends Controller
{
    public function listed_hospital($id)
    {   

        $hospital_details = Hospital::findOrFail($id);

         return view("listed_hospital",compact('hospital_details'));
    }
}
