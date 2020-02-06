<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Appointment;
use Carbon\Carbon;
use App\User;
use App\User_profile;

class Appointments extends Controller
{

	 public function __construct()
   {
   	$this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   $user = auth()->user();


 if ($user->user == "hospital") {

 	return;
    
   }
   elseif ($user->user == "doctor") {
        
    	$appointments_doc_info = DB::table('user_profiles')
         ->join('appointments', 'appointments.user_id', "=", 'user_profiles.user_id')
         ->where('appointments.doctor_id', auth()->id())
         ->where('user_profiles.paid', 1)
         ->get()
    	->toArray();

    	//return $appointments_doc_info;

    	return view('appointments')->with('appointments_doc_info', $appointments_doc_info);
     
   }
   elseif ($user->user == "user") {
       
    	
          $appointments_doc_info = DB::table('doctors')
         ->join('appointments', 'appointments.doctor_id', "=", 'doctors.user_id')
         ->where('appointments.user_id', auth()->id())
         ->get()
    	->toArray();
    	
    	
    	  $appointments_approved = DB::table('doctors')
         ->join('appointments', 'appointments.doctor_id', "=", 'doctors.user_id')
         ->where('appointments.user_id', auth()->id())
         ->where('appointments.Accept_appointment', 1)
         ->get()
    	->toArray();
    
    	
    	  $userprofile_id = auth()->user()->id;
         
          $userprofile_data = User_profile::where('user_id',$userprofile_id)->get();
    	
    	return view('appointments')->with('appointments_doc_info', $appointments_doc_info)->with('userprofile_data', $userprofile_data)->with('appointments_approved',$appointments_approved);
     
   }
  else{

  }        
    
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {



        $this->validate(request(), [
            'title'=> 'required',
            'description'=>'required',
            'date'=>'required',
            'time' => 'required'


        ]);
          
          // $checkpatientappointment_id = auth()->user()->id;
          // $checkpatientappointment_id;
          // $checkdoctorappointment_id = $request->doctor_id;
          // $checkappointments = Appointment::where('user_id', $checkpatientappointment_id,'doctor_id',$checkdoctorappointment_id )->get();
          // if($checkappointments) {
          //   session()->flash('booked', " Sorry you have an appointment with this doctor already");
          // }


         $currentDate = date('Y-m-d');
         $currentTime = time();

    if ($request->date < $currentDate) {
        session()->flash('bad', " Sorry your appointment was not submitted Successfully due to invalid  date of   " . $request->date.  '   kindly make the appointment again');

    } 
     $getappointmentsdetails = Appointment::where('user_id', '=', auth()->user()->id)->where('doctor_id','=', $request->doctor_id )->first();
     if ($getappointmentsdetails){
          session()->flash('bad', 'Booking already exist with this doctor');
     }
    elseif($request->date >= $currentDate){
        $appointment = Appointment::create([
            'title' =>  $request['title'],
           'description'=>   $request['description'],
            'date' => $request['date'],
            'time' => $request['time'],
            'user_id' => $request->user_id,
            'doctor_id' => $request->doctor_id,
           'completed' => false,
           'Accept_appointment' =>false]
            );
        session()->flash('success', 'Your booking has been submitted succesfully, we get back to you soon');
     }

      $user = auth()->user();
         if ($user->paid == 0) {

            return view('payment');
    
         }

         else{
            return redirect(url('/notification'));

         }

    }


    //show notification
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function notification(){
        $data = auth()->user()->id;
          $data;
          $appointments = Appointment::where('user_id', $data)->get();
          $confirmation = Appointment::where('user_id', $data)->where('doctor_id', 1)->where('Accept_appointment', 1)->get();
          $doctor = Doctor::where('id', 'LIKE',1);
            $appointments = Appointment::where('doctor_id', 'LIKE', $doctor );
         return view('naijamads.notification', compact('confirmation'))->with('appointments', $appointments);
     }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $profile)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($appointmentId)
    {


    	 $appointment = Appointment::find($appointmentId);

    	 $appointment->Accept_appointment = 1;
           $appointment->save();
           session()->flash('success', 'Appointment has been approved successfully');
           return redirect('notification');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $appointmentId){

           $appointment = Appointment::where( 'id', $appointmentId);
           $appointment->delete();
           session()->flash('success', 'Appointment has been cancelled successfully');
           return redirect('notification');
    }


    public function appointments($doctorId){
        
             $doctors = Doctor::find($doctorId);
        return view('layouts.create')->with('doctors', $doctors);

    }

       public function isSep(){
        $data = Appointment::all();
        $user = auth()->user();
        $doctorId = Doctor::all();
        $data->where('user_id', $user->id)->where('doctor_id', $doctorId );

       }

        public function chat(){
           


   $appointments_doc_info = DB::table('users')
         ->join('appointments', 'appointments.user_id', "=", 'users.id')
         ->where('appointments.doctor_id', auth()->id())
         
         ->get();
             foreach ($appointments_doc_info as $appointments_doc_infos) {
    // 
         $appointments_doc_infos->user_id;

        }
        $contacts = User::where('id', '=', $appointments_doc_infos->user_id)->get();

       return response()->json($contacts);
   }
    	
}
 