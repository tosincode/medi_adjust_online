@extends('layouts.dashboard_layout')





@section('appointment_content')

  <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Appointment Details</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                    
                      <tbody>
                  
                        
                        <tr>

                          <td>
                           
                          </td>
                          <td>
                             
                          </td>
                          <td>
                          
                            
                          </td>
                         
                          <td>
                            
                          </td>
                          <td class="text-primary">
                            
                          </td>
                          
                          <td class="text-primary">
                              
                               @if(Auth::user()->user == "user") 
                             @if($user_appointment)
                             <a href="/chat" class="btn btn-primary btn-round">Start Chat</a>
                             
                             @else
                               <a href="#" class="">You do not have any chat now</a>
                             @endif
                             
                              @elseif(Auth::user()->user == "doctor")
                              
                               @if($doctor_appointment)
                             <a href="/chat" class="btn btn-primary btn-round">Start Chat</a>
                             
                             @else
                               <a href="#" class="">You do not have any chat now</a>
                             @endif
                             
                             @endif
                           
                          </td>
                           </td>
                          <td>
                        </tr>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
@endsection