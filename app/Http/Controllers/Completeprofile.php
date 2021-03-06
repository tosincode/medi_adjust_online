<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_profile;
use App\User;

class Completeprofile extends Controller
{
    public function __construct()
   {
   	$this->middleware('auth');
   }
   
          public function index()
    {
   

    $user = auth()->user();

   if ($user->user == "hospital") {
      if ($hospitals_info = Hospital::where('user_id', '=', ($user->id))->first())
        {

             return view("profile")->with('hospitals_info',$hospitals_info);
            //return "yes this hospital information here";
         }
      else
        {
        // return "no hospital information here" ;
            return view("user_profile");
        }
   }
   elseif ($user->user == "doctor") {
       if ($doctors_info = Doctor::where('user_id', '=', ($user->id))->first())
        {
            //return "yes this doctor information here";
            return view("profile")->with('doctors_info',$doctors_info);
         }
      else
        {
        // return "no doctor information here" ;
            return view("user_profile");
        }
   }
   elseif ($user->user == "user") {
       if ($user_info = User_profile::where('user_id', '=', ($user->id))->first())
        {
            //return "yes this doctor information here";
            return view("completeprofile")->with('user_info',$user_info);
         }
      else
        {
        // return "no doctor information here" ;
           return view("user_profile");
        }
   }
  else{

  }

//return view("user_profile");
       
    }
    
    // function user_profile_input(Request $request)
    // {
    // 	$data = new \App\User_profile;
    // 	$data->user_id = $request['user_id'];
    // 	$data->company_name = $request['company_name'];  							
    // 	$data->dob = $request['dob'];
    // 	$data->gender = $request['gender'];
    // 	$data->address = $request['address'];
    // 	$data->website = $request['website'];
    // 	$data->city = $request['city'];
    // 	$data->country = $request['country'];
    // 	$data->phonenumber = $request['phonenumber'];				
    // 	$data->non_profit = $request['non_profit'];
    // 	$data->cac_certified = $request['cac_certified'];
    // 	$data->accreditation = $request['accreditation'];
    // 	$data->ownership_type = $request['ownership_type'];
    // 	$data->average_cost = $request['cost_perday'];
    // 	$data->bed_size = $request['bed_size']; 			
    // 	$data->length_of_stay = $request['length_of_stay'];
    // 	$data->profile_picture = $request['profile_picture'];
    // 	$data->specialities = $request['specialities'];

    	//  // return $data;
    	//  $data->save();
    	// // print_r($request->input());
    	//  return redirect('update_profile');


    // }

  public function store(Request $request){


          $this->validate(request(), [
            
            'full_name'=>'required',
            'user'=>'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phonenumber' => 'required',
            'blood_group' => 'required',
            'genotype' => 'required',
            'image' => 'required',
             'description' => 'required',



        ]);

        $data = new User_profile();
        $data->user_id = $request->input('user_id');
        $data->full_name = $request->input('full_name');
        $data->user = $request->input('user');       
        $data->email = $request->input('email');                        
        $data->dob = $request->input('dob');
        $data->gender = $request->input('gender');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->state = $request->input('state');
        $data->phonenumber = $request->input('phonenumber'); 
        $data->blood_group = $request->input('blood_group');              
        $data->genotype = $request->input('genotype');
      
       
       //   $data->profile_picture = $request->input('profile_picture');

        if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.'. $extension;
        $file->move('uploads/images/', $filename);
        $data->image = $filename;
        }else
        {
            return $request;
            $data->image = '';
        }

        $data->description = $request->input('description');
        
           $id = $request->input('user_id');
 
       $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();

        $data->save();

        
        
        // This is doctor details is passed from the form submitted
        $doctors = $request->input('doctor_sent_id');
       
        
        return view('layouts.create')->with('doctors', $doctors);
}

     public function display(){
        $hospitals = User_profile::where('user','hospital')->get();
        return view('hospitals')->with('hospitals',$hospitals);
     }
}
