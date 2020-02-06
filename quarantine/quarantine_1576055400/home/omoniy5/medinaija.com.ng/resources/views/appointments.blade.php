@extends('layouts.dashboard_layout')

@section('page_title')
 <a class="navbar-brand" href="#pablo">Appointments</a>
 @endsection

@section('page_title')
   <style type="text/css">
        .sidebar[data-color="purple"] li.active>a {
   background-color: #e8940d;
}
@endsection

@section('appointment_content')

  <div class="content">
        <div class="container-fluid">
          <div class="row">
          
              @if (session()->has('success'))
                <h2 class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </h2>
              @endif

               @if (session()->has('bad'))
                <h2 class="alert alert-danger" role="alert">
                    {{ session('bad') }}
                  </h2>
              @endif
              @if (session()->has('booked'))
                <h2 class="alert alert-success" role="alert">
                    {{ session('booked') }}
                  </h2>
              @endif


            <div class="col-md-12">
            @if(Auth::user()->user == "user")
            @if (count($appointments_doc_info) > 0)
                        @foreach ($userprofile_data  as $userprofile_datas )
                            
                                @if($userprofile_datas->paid == 0)
                           <span style="font-size:20px;"> Your appointment can not be approved because you are not a subscriber. <a href="/payment_auth">Please click here to subsciribe</a></span>
                            @else
                            
                            @endif
                         @endforeach
                         @endif
           @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Appointment Details</h4>
                </div>

                 @if(Auth::user()->user == "doctor") 
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                         @if (count($appointments_doc_info) > 0)
                        <th>
                          Name of Patient
                        </th>
                        <th>
                          Title of appointment
                        </th>
                        <th>
                          Description of Patient
                        </th>
                        <th>
                          Date
                        </th>
                         <th>
                         Time
                        </th>
                        <th>
                         Approved
                        </th>
                        <th>
                         Cancel
                        </th>

                      </thead>
                      <tbody>
                  
                        @foreach ($appointments_doc_info  as $appointments_doc_infos )
                        <tr>

                          <td>
                            {{ $appointments_doc_infos->full_name }}
                          </td>
                          <td>
                              {{ $appointments_doc_infos->title }}
                          </td>
                          <td>
                          
                            {{ $appointments_doc_infos->description }}
                          </td>
                         
                          <td>
                            {{ $appointments_doc_infos->date }}
                          </td>
                          <td class="text-primary">
                            {{ $appointments_doc_infos->time }}
                          </td>
                           @if ($appointments_doc_infos->Accept_appointment ==  0)
                          <td class="text-primary">
                           <a href="/approveappointment/{{ $appointments_doc_infos->id }}" class="btn btn-primary btn-round">approve</a>
                          </td>
                           @else
                          <td>
                            Approved
                          </td>
                            @endif
                          <td class="text-primary">
                           <a href="/deleteappointment/{{ $appointments_doc_infos->id }}" class="btn btn-danger btn-round">Cancel</a>
                          </td>
                        </tr>
                       @endforeach
                    @else
                        No appointment
                    @endif
                      </tbody>
                    </table>
                  </div>
                </div>

              @elseif(Auth::user()->user == "user")
                     
                     <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                         @if (count($appointments_doc_info) > 0)
                        <th>
                          Name of Patient
                        </th>
                        <th>
                          Title of appointment
                        </th>
                       
                        <th>
                          Date
                        </th>
                         <th>
                         Time
                        </th>
                        <th>
                         Cancel
                        </th>
                       

                      </thead>
                      <tbody>
                  
                        @foreach ($appointments_doc_info  as $appointments_doc_infos )
                        
                        <tr>

                          <td>
                            {{ $appointments_doc_infos->full_name }}
                          </td>
                          <td>
                              {{ $appointments_doc_infos->title }}
                          </td>
                         
                          <td>
                            {{ $appointments_doc_infos->date }}
                          </td>
                          <td class="text-primary">
                            {{ $appointments_doc_infos->time }}
                          </td>
                         
                          <td class="text-primary">
                           <a href="/deleteappointment/{{ $appointments_doc_infos->id }}" class="btn btn-danger btn-round">Cancel</a>
                          </td>
                        </tr>
                       
                       @endforeach
                    @else
                        No appointment
                    @endif
                      </tbody>
                    </table>
                  </div>
                </div> 
                @else

                 
                       
                 @endif



              </div>
            </div>
          
          </div>
        </div>
      </div>
@endsection