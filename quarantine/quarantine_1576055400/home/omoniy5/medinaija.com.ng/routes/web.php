<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',"Index@index");
Route::get('/about_us',"About@About");
Route::get('/contact',"Contact@Contact");
Route::get('/hospitals',"Hospitals@display");
Route::get('/doctors',"Doctors@display");
// Route::get('/register',"register@register");
Route::get('/listed_hospital/{id}', "Listed_hospital@Listed_hospital");
Route::get('/listed_doctor/{id}',"Listed_doctor@Listed_doctor");
Route::get('/dashboard',"Dashboard@dashboard");
Route::get('/update_profile',"user_profile_controller@index");
Route::get('gallery',"Picture@picture");
Route::get('appointments',"Appointments@appointments");
Route::get('notification',"Appointments@index");
Route::get('account',"Account@account");
// Route::get('chat',"Chat@chat");
Route::get('profile',"Profile_controller@index");

Route::post('post_hospital',"Hospitals@store")->name('post_hospital');
Route::post('post_doctor',"Doctors@store")->name('post_doctor');
Route::post('post_user',"User_controller@store")->name('post_user');

Route::get('appointments/{doctorId}/create', 'Appointments@appointments');
Route::get('deleteappointment/{appointmentId}', 'Appointments@destroy');
Route::get('approveappointment/{appointmentId}', 'Appointments@update');
Route::resource('make_appointment', 'Appointments');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

Route::get('chatss', 'Appointments@chat');  

Route::get('/hospitals_search', 'Hospitals@search');
Route::get('/doctors_search', 'Doctors@search');

Route::get('/general_hospitals', 'Hospitals@general_hospital');
Route::get('/general_medicine_hospital', 'Hospitals@general_medicine');
Route::get('/pharmacy', 'Hospitals@pharmacy_hospital');
Route::get('/private_hospitals', 'Hospitals@private_hospital');
Route::get('/specialist_hospitals', 'Hospitals@specialist_hospital');


Route::get('/cardiologists', 'Doctors@cardiologist');
Route::get('/endocrinologists', 'Doctors@endocrinologist');
Route::get('/general_medicals', 'Doctors@general_medical');
Route::get('/general_practitioners', 'Doctors@general_practitioner');
Route::get('/geriatricians', 'Doctors@geriatrician');
Route::get('/laboratory_scientists', 'Doctors@laboratory_scientist');
Route::get('/nurses', 'Doctors@nurse');
Route::get('/opticians', 'Doctors@optician');
Route::get('/public_health_physicians', 'Doctors@public_health_physician');
Route::get('/surgeons', 'Doctors@surgeon');

Route::post('hospital_update',"Account@hospital_update")->name('hospital_update');

Route::post('doctor_update',"Account@doctor_update")->name('doctor_update');
Route::post('user_update',"Account@user_update")->name('user_update');




Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');


Route::get('/testing',"Test@index");

Route::post('contactus',"Contact_us@store")->name('contactus');
Route::get('/payment_paystack',"PaymentController@index");

// Auth::routes();

Route::get('/chat', 'Chat@index');
Route::get('/message/{id}', 'Chat@getMessage')->name('message');
Route::post('message', 'Chat@sendMessage');


Route::get('/rating', function () {
    return view('rating');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@googleredirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@googlehandleProviderCallback');

Route::get('/completesignup', 'CompletesignupController@display')->name('completesignup');


Route::get('/paymentsuccess', 'Paymentsuccess@index');
Route::get('/general_search', 'Hospitals@general_search');

Route::get('/payment_auth', 'PaymentController@index');
         











