<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Doctor;
use App\User;

class Hospitals extends Controller
{
   public function hospitals()
   {
   	return view("hospitals");
   }

   

   
    public function store(Request $request){


             $this->validate(request(), [
           
            'full_name'=>'required',
            'user'=>'required',
            'date_of_establishment' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phonenumber' => 'required',
            'website' => 'required',
            'non_profit' => 'required',
            'cac_certified' => 'required',
            'accreditation' => 'required',
            'ownership_type' => 'required',
            'cost_perday' => 'required',
            'bed_size' => 'required',
            'length_of_stay' => 'required',
            'specialities' => 'required',
            'image' => 'required',



        ]);

    	$data = new Hospital();
        $data->user_id = $request->input('user_id');
        $data->full_name = $request->input('full_name');
        $data->user = $request->input('user');       
        $data->email = $request->input('email');                        
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
        $data->average_cost = $request->input('cost_perday');
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
        }else
        {
            return $request;
            $data->image = '';
        }
        
         $id = $request->input('user_id');

      $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();

        $data->save();
         return redirect('update_profile');
        
}

     public function display(){
        $hospitals = Hospital::where('user','hospital')->paginate(2);
        return view('hospitals')->with('hospitals',$hospitals);
     }


     public function general_hospital(){
        $hospitals = Hospital::where('specialities','General Hospital')->paginate(1);
        return view('general_hospital')->with('hospitals',$hospitals);
     }

     public function general_medicine(){
        $hospitals = Hospital::where('specialities','General Medicine')->paginate(1);
        return view('general_medicine')->with('hospitals',$hospitals);
     }

     public function pharmacy_hospital(){
        $hospitals = Hospital::where('specialities','Pharmacy')->paginate(1);
        return view('pharmacy')->with('hospitals',$hospitals);
     }

     public function private_hospital(){
        $hospitals = Hospital::where('specialities','Private Hospital')->paginate(1);
        return view('private_hospital')->with('hospitals',$hospitals);
     }
      
      public function specialist_hospital(){
        $hospitals = Hospital::where('specialities','Specialist Hospital')->paginate(1);
        return view('specialist_hospital')->with('hospitals',$hospitals);
     }



    // public function search(Request $request){
    //   $hospital_search = Hospital::where('full_name',$request->keyword)
    //          ->orWhere('city',$request->city)
    //           ->orWhere('specialities',$request->hospital_category)
    //          // more orWhere Clause
    //          ->paginate(1);

    // return view('hospital_search')->with('hospital_search',$hospital_search);

    //  }
     public function search(Request $request, Hospital $hospital){
          $hospital = $hospital->newQuery();
        if($request->has('keyword') && !empty($request->get('keyword')) ) {
          $hospital->where('full_name','LIKE',"%{$request->get('keyword')}%");
        }
        if($request->has('hospital_category') && !empty($request->get('hospital_category'))) {

          $hospital->where('specialities','LIKE',"%{$request->get('hospital_category')}%");
        }
        if($request->has('address') && !empty($request->get('address')) ) {

          $hospital->where('address',$request->get('address'));
        }
        if($request->has('city') && !empty($request->get('city'))) {

          $hospital->where('city',$request->get('city'));
        }
       $hospitals = $hospital->paginate(3);

     return view('hospital_search')->with('hospitals',$hospitals);

     }

           public function general_search(Request $request, Hospital $hospital,Doctor $doctor){
        // return $request->get('search_category');
         if($request->get('search_category') == 'Hospital'){

            $hospital = $hospital->newQuery();
            if($request->has('keyword') && !empty($request->get('keyword')) ) {
            $hospital->where('full_name','LIKE',"%{$request->get('keyword')}%");
            }
            if($request->has('category') && !empty($request->get('category'))) {

            $hospital->where('specialities','LIKE',"%{$request->get('category')}%");
            }
            if($request->has('address') && !empty($request->get('address')) ) {

            $hospital->where('address',$request->get('address'));
            }
            if($request->has('city') && !empty($request->get('city'))) {

            $hospital->where('city',$request->get('city'));
            }
            $hospitals = $hospital->paginate(4);


            return view('hospital_search')->with('hospitals',$hospitals);
        }else {
            $doctor = $doctor->newQuery();
            if($request->has('keyword') && !empty($request->get('keyword')) ) {
            $doctor->where('full_name','LIKE',"%{$request->get('keyword')}%");
            }
            if($request->has('category') && !empty($request->get('category')) ) {
            $doctor->where('specialities','LIKE',"%{$request->get('category')}%");
            }
            if($request->has('address') && !empty($request->get('address')) ) {

            $doctor->where('address',$request->get('address'));
            }
            if($request->has('city') && !empty($request->get('city')) ) {

            $doctor->where('city',$request->get('city'));
            }
            $doctors = $doctor->paginate(4);

            return view('layouts.doctor_search')->with('doctors',$doctors);
            }
        

     }
}
