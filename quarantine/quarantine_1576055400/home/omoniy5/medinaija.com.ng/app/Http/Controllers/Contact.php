<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class Contact extends Controller
{
   public function contact()
   {
   	return view("contact");
   }

    // public function store(Request $request)
    // {
    //     $rules = [
    //         'contact_name' => 'required|string',
    //         'contact_email' => 'required|email',
    //         'contact_subject' =>  'required|string',
    //         'contact_content' => 'required'
    //     ];

    //     $this->validate($request, $rules);

    //     $data = $request->all();

    //     $contact = Contact::create($data);

    //      return redirect('/contact')->with('success', 'Thank You For Contacting Us');
    // }

}
