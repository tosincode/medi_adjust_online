@extends('layouts.dashboard_layout')

   



@section('profile_content')

 @if(Auth::user()->user == "hospital") 

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PROFILE</h4>
                  <!-- <p class="card-category">Once hospital ** accepts your booking you will be able to chat with him</p> -->
                </div>        
                <!--   Hospital div -->
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold"> Hospital Name: </span> {{ $hospitals_info->full_name }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Email: </span>{{ $hospitals_info->email }}</h3>
                      </div>
                    </div>
                     <div class="row">
                      
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Date of Establishment: </span>{{ $hospitals_info->dob}}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Address: </span> {{ $hospitals_info->address }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Phone Number: </span>{{ $hospitals_info->phonenumber }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Organization :</span>{{ $hospitals_info->non_profit }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Certification: </span>{{ $hospitals_info->cac_certified }}</h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Accreditation: </span> {{ $hospitals_info->accreditation }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Ownership Type: </span>{{ $hospitals_info->ownership_type }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Average Cost per day: </span> {{ $hospitals_info->average_cost }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Bed size: </span>{{ $hospitals_info->bed_size }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Length of stay: </span> {{ $hospitals_info->length_of_stay }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Specialities: </span>{{ $hospitals_info->specialities }}</h3>
                      </div>
                    </div>
                   
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$hospitals_info->image)}}" alt="" />
                  </a>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-category text-gray">xxxxxxxxxxxx</h6>
                  <h4 class="card-title">xxxxxxxxxxxx</h4> -->
                  <p class="card-description">
                   
                  </p>
                  <a href="/account" class="btn btn-primary btn-round">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @elseif(Auth::user()->user == "doctor")
     
       

        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PROFILE</h4>
                 <!--  <p class="card-category">Once doctor ** accepts your booking you will be able to chat with him</p> -->
                </div>        
                <!--   DOCTOR FORM -->
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold"> Name: </span> {{ $doctors_info->full_name }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Email: </span> {{ $doctors_info->email }} </h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Gender: </span>{{ $doctors_info->gender }} </h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Date of birth: </span>{{ $doctors_info->dob }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Address: </span> {{ $doctors_info->address }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Phone Number: </span>{{ $doctors_info->phonenumber }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Website: </span> {{ $doctors_info->website }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Certification: </span> {{$doctors_info->certification}} </h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Affiliation: </span> {{ $doctors_info->affiliation }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Residence: </span> {{ $doctors_info->residency }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Fellowship: </span> {{ $doctors_info->fellowship }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Experience: </span>{{ $doctors_info->experience }} years</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Internship: </span> {{ $doctors_info->internship }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Medical school: </span>{{ $doctors_info->medical_school }}</h3>
                      </div>
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Specialities: </span>{{ $doctors_info->specialities }}</h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Description:</span> {{ $doctors_info->description }}</h3>
                      </div>
                      
                    </div>
                </div>
              </div>
            </div>

             <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$doctors_info->image)}}" alt="" />
                  </a>
                </div>
                <div class="card-body">
                
                  <h4 class="card-title">{{ $doctors_info->full_name }}</h4>
                  
                  <a href="/account" class="btn btn-primary btn-round">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

       @elseif(Auth::user()->user == "user")
          

        <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PROFILE</h4>
                 <!--  <p class="card-category">Once doctor ** accepts your booking you will be able to chat with him</p> -->
                </div>        
                <!--   DOCTOR FORM -->
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold"> Full Name:</span> {{ $user_info->full_name }} </h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Email: </span> {{ $user_info->email }}</h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Gender:</span>  {{ $user_info->gender }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Date of birth: </span> {{ $user_info->dob }}</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Address:</span> {{ $user_info->address }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Phone Number: </span>{{ $user_info->phonenumber }}</h3>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Blood Group:</span> {{ $user_info->blood_group }}</h3>
                      </div>
                       
                      <div class="col-md-6">
                        <h3><span style="font-weight: bold">Geno Type: </span>{{ $user_info->genotype }}</h3>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <h3> <span style="font-weight: bold">Description:</span> {{ $user_info->description }}</h3>
                      </div>
                      
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$user_info->image)}}" alt="" />
                  </a>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-category text-gray">xxxxxxxxxxxx</h6> -->
                  <h4 class="card-title"> {{ $user_info->full_name }}</h4>
                  
                  <a href="/account" class="btn btn-primary btn-round">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

       @else
          YOU MUST LOGIN IN FIRST             
     @endif
@endsection


