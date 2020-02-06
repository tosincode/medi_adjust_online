<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\User;



class Doctors extends Controller
{
    public function doctors()
    {
    	return view("doctors");
    }
        
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

    	$data = new Doctor();
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
        }else
        {
            return $request;
            $data->image = '';
        }

        $data->specialities = $request->input('specialities');
        $data->description = $request->input('description');
        
         $id = $request->input('user_id');

      $user = User::find($id);

       $user->avatar = $data->image;

        $user->save();


        $data->save();

        return redirect('update_profile');
}

public function display(){
        $doctors = Doctor::where('user','doctor')->paginate(1);
        return view('doctors')->with('doctors',$doctors);
     }



public function cardiologist(){
        $doctors = Doctor::where('specialities','Cardiologist')->paginate(1);
        return view('cardiologist')->with('doctors',$doctors);
     }

     public function endocrinologist(){
        $doctors = Doctor::where('specialities','Endocrinologist')->paginate(1);
        return view('endocrinologist')->with('doctors',$doctors);
     }

     public function general_medical(){
        $doctors = Doctor::where('specialities','General Medicals')->paginate(1);
        return view('general_medical')->with('doctors',$doctors);
     }

     public function general_practitioner(){
        $doctors = Doctor::where('specialities','General Practitioner')->paginate(1);
        return view('general_practitioner')->with('doctors',$doctors);
     }
      
      public function geriatrician(){
        $doctors = Doctor::where('specialities','Geriatrician')->paginate(1);
        return view('geriatrician')->with('doctors',$doctors);
     }
      public function laboratory_scientist(){
        $doctors = Doctor::where('specialities','Laboratory Scientist')->paginate(1);
        return view('laboratory_scientist')->with('doctors',$doctors);
     }
      public function nurse(){
        $doctors = Doctor::where('specialities','Nurse')->paginate(1);
        return view('nurse')->with('doctors',$doctors);
     }
      public function optician(){
        $doctors = Doctor::where('specialities','Optician')->paginate(1);
        return view('optician')->with('doctors',$doctors);
     }
      public function public_health_physician(){
        $doctors = Doctor::where('specialities','Public Health Physician')->paginate(1);
        return view('public_health_physician')->with('doctors',$doctors);
     }
      public function surgeon(){
        $doctors = Doctor::where('specialities','surgeons')->paginate(1);
        return view('surgeon')->with('doctors',$doctors);
     }





    //   public function search(Request $request){
    //   $doctors = Doctor::where('full_name',$request->keyword)
    //          ->orWhere('city',$request->city)
    //           ->orWhere('specialities',$request->hospital_category)
    //          // more orWhere Clause
    //          ->paginate(1);

    // return view('layouts.doctor_search')->with('doctors',$doctors);

    //  }
    
      public function search(Request $request, Doctor $doctor){
        $doctor = $doctor->newQuery();
        if($request->has('keyword') && !empty($request->get('keyword')) ) {
          $doctor->where('full_name','LIKE',"%{$request->get('keyword')}%");
        }
        if($request->has('doctor-category') && !empty($request->get('doctor-category')) ) {

          $doctor->where('specialities','LIKE',"%{$request->get('doctor-category')}%");
        }
        if($request->has('address') && !empty($request->get('address')) ) {

          $doctor->where('address',$request->get('address'));
        }
        if($request->has('city') && !empty($request->get('city')) ) {

          $doctor->where('city',$request->get('city'));
        }
       $doctors = $doctor->paginate(3);

        return view('layouts.doctor_search')->with('doctors',$doctors);

     }

}
