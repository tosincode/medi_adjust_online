<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\User_profile;
use App\Hospital;
use App\Doctor;

class Account extends Controller
{
    public function account($value='')
    {
    	
    $user = auth()->user();

   if ($user->user == "hospital") {
      if ($hospitals_info = Hospital::where('user_id', '=', ($user->id))->first())
        {

             return view("account")->with('hospitals_info',$hospitals_info);
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
            return view("account")->with('doctors_info',$doctors_info);
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
            //return "yes this user information here";
            return view("account")->with('user_info',$user_info);
         }
      else
        {
        // return "no user information here" ;
            return view("user_profile");
        }
   }
  else{

  }
    }




  
     public function hospital_update(Request $request){


        //      $this->validate(request(), [
           
        //     'full_name'=>'required',
        //     'date_of_establishment' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'phonenumber' => 'required',
        //     'website' => 'required',
        //     'non_profit' => 'required',
        //     'cac_certified' => 'required',
        //     'accreditation' => 'required',
        //     'ownership_type' => 'required',
        //     'cost_perday' => 'required',
        //     'bed_size' => 'required',
        //     'length_of_stay' => 'required',
        //     'specialities' => 'required',
        //     'image' => 'required',



        // ]);

     	$id =  auth()->user()->id;

    

     	$data = Hospital::where("user_id",$id)->first();
        // $data->user_id = $request->input('user_id');
        $data->full_name = $request->input('full_name');
        $data->user = "hospital";       
        // $data->email = $request->input('email');                        
        $data->dob = $request->input('date_of_establishment');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->state = $request->input('state');
        $data->phonenumber = $request->input('phonenumber'); 
        $data->website = $request->input('website');              
        $data->non_profit = $request->input('non_profit');
        $data->cac_certified = $request->input('cac_certified');
        $data->accreditation = $request->input('accreditation');
        $data->ownership_type = $request->input('ownership_type');
        $data->average_cost =  $request->input('average_cost');;
        $data->bed_size = $request->input('bed_size');             
        $data->length_of_stay = $request->input('length_of_stay');
        $data->specialities = $request->input('specialities');
       //   $data->profile_picture = $request->input('profile_picture');

         if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.'. $extension;
        $file->move('uploads/images/', $filename);
        $data->image = $filename;
        }
        
         $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();
        
        $data->save();
  return redirect('account');
       // return view('account')->with('data',$data);

         // session()->flash('success', 'You have successfully updated your profile');

     }


     public function doctor_update(Request $request){

         $this->validate(request(), [
           
            'full_name'=>'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phonenumber' => 'required',
            'website' => 'required',
            'affiliation' => 'required',
            'certification' => 'required',
            'residency' => 'required',
            'fellowship' => 'required',
            'experience' => 'required',
            'internship' => 'required',
            'medical_school' => 'required',
            'image' => 'required',
            'medical_school' => 'required',
            'image' => 'required',


        ]);


            $id =  auth()->user()->id;

       $data = Doctor::where("user_id",$id)->first();
        // $data->user_id = $request->input('user_id');
        $data->full_name = $request->input('full_name');
        $data->user = "doctor";       
        $data->email = $request->input('email');                        
        $data->dob = $request->input('dob');
        $data->gender = $request->input('gender');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->state = $request->input('state');
        $data->phonenumber = $request->input('phonenumber'); 
        $data->website = $request->input('website');              
        $data->affiliation = $request->input('affiliation');
        $data->certification = $request->input('certification');
        $data->residency = $request->input('residency');
        $data->fellowship = $request->input('fellowship');
        $data->experience = $request->input('experience');
        $data->internship = $request->input('internship');             
        $data->medical_school = $request->input('medical_school');
       
       //   $data->profile_picture = $request->input('profile_picture');

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.'. $extension;
        $file->move('uploads/images/', $filename);
        $data->image = $filename;
        }

        $data->specialities = $request->input('specialities');
        $data->description = $request->input('description');

        $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();

        $data->save();

        return redirect('account');
}

    public function user_update(Request $request){
       
         $this->validate(request(), [
          
            'full_name'=>'required',
           
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

       $id =  auth()->user()->id;

       $data = User_profile::where("user_id",$id)->first();
        $data->full_name = $request->input('full_name');
        $data->user = "user";       
        $data->email = $request->input('email');                        
        $data->dob = $request->input('dob');
        $data->gender = $request->input('gender');
        $data->address = $request->input('address');
        $data->city = $request->input('city');
        $data->state = $request->input('state');
        $data->phonenumber = $request->input('phonenumber'); 
        $data->blood_group = $request->input('blood_group');              
        $data->genotype = $request->input('genotype');

        if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.'. $extension;
        $file->move('uploads/images/', $filename);
        $data->image = $filename;
        }

        $data->description = $request->input('description');

         $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();

        $data->save();

         return redirect('account');

        //return view('user_profile')->with('data',$data);
}

}
