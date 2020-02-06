<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\Events\NewMessage;


class ContactsController extends Controller
{
    public function get()
    {
    	
    	  $user = auth()->user();


 if ($user->user == "hospital") {

    return;
    
   }
   elseif ($user->user == "doctor") {
 $appointments_doc_info = DB::table('users')
         ->join('appointments', 'appointments.user_id', "=", 'users.id')
         ->where('appointments.doctor_id', auth()->id())
         
         ->get();
             foreach ($appointments_doc_info as $appointments_doc_infos) {
    // 
         $appointments_doc_infos->user_id;

        }
        $contacts = User::where('id', '=', $appointments_doc_infos->user_id)->get();


        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds){
           $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
           $contact->unread =  $contactUnread ?  $contactUnread->messages_count : 0;

           return $contact;

        });
        return response()->json($contacts);
     
   }
          
   elseif ($user->user == "user") {
        
  $appointments_doc_info = DB::table('users')
         ->join('appointments', 'appointments.user_id', "=", 'users.id')
         ->where('appointments.user_id', auth()->id())
         
         ->get();
             foreach ($appointments_doc_info as $appointments_doc_infos) {
    // 
         $appointments_doc_infos->doctor_id;

        }
        $contacts = User::where('id', '=', $appointments_doc_infos->doctor_id)->get();


        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds){
           $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
           $contact->unread =  $contactUnread ?  $contactUnread->messages_count : 0;

           return $contact;

        });
        return response()->json($contacts);
     
   }
  else
  {

  }

    }

    public function getMessagesFor($id)
    {
    	// $messages = Message::where('from', $id)->orWhere('to',$id)->get();


    	$messages = Message::where(function($q) use ($id){

        $q->where('from', auth()->id());
        $q->where('to', $id);

    	})->orWhere(function($q) use ($id) {

        $q->where('from', $id);
        $q->where('to', auth()->id());
    	})
    	->get();

    	return response()->json($messages);
    }
    

    public function send(Request $request)
    {
    	 $message = Message::create([
    	 	'from' => auth()->id(),
    	 	'to' => $request->contact_id,
    	 	'text' => $request->text
    	 ]);

    	 broadcast(new NewMessage($message));
    	return response()->json($message);
    }
}
