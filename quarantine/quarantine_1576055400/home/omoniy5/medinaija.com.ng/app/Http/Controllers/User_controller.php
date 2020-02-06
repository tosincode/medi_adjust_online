<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_profile;
use App\User;


class user_controller extends Controller
{
    public function index()
    {
     return "yes";
    	//return User::find(1);
    	//return view("user_profile");
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

         return redirect('update_profile');

        //return view('user_profile')->with('data',$data);
}
}
