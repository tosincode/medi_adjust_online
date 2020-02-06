@extends('layouts.dashboard_layout')


@section('account_content')
@if(Auth::user()->user == "hospital") 
<div class="content" style="">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>


                <div class="card-body">
                  <form method="POST" action="{{route('hospital_update')}}" enctype="multipart/form-data">
                     @csrf
                     <!-- {{ method_field('PUT') }} -->
                    <div class="row">
                      <div class="col-md-6">
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company name</label>
                          <input type="text" class="form-control" name="full_name" value="{{ $hospitals_info->full_name }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email" value="{{ $hospitals_info->email }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Establishment</label>
                          <input type="text" class="form-control" name="date_of_establishment" value="{{ $hospitals_info->dob }}">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" value="{{ $hospitals_info->address }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website</label>
                          <input type="text" class="form-control" name="website" value="{{ $hospitals_info->website }}">
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city" value="{{ $hospitals_info->city }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" class="form-control" name="state" value="{{ $hospitals_info->state }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <input type="number" class="form-control" name="phonenumber" value="{{ $hospitals_info->phonenumber }}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Are you a non-profit Organization</label>
                           <select name="non_profit" class="form-control">
                            <option value="">{{ $hospitals_info->non_profit }}</option>
                            <option value="Non-profit organisation">Yes</option>
                              <option value="Business Venture">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Are you certified by CAC</label>
                          <select name="cac_certified" class="form-control">
                            <option value="{{ $hospitals_info->cac_certified }}">{{ $hospitals_info->cac_certified }}</option>
                            <option value="CAC">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Accreditation</label>
                           <input type="" class="form-control" name="accreditation" value="{{ $hospitals_info->accreditation }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ownership Type</label>
                          <select name="ownership_type" class="form-control">
                            <option value="{{ $hospitals_info->ownership_type }}">{{ $hospitals_info->ownership_type }}</option>
                            <option value="private">Private</option>
                            <option value="Public">Public</option>
                          </select>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">What is your average cost per day</label>
                          <input type="" class="form-control" name="average_cost" value="{{ $hospitals_info->average_cost }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">What is the size of your hospital bed</label>
                           <input type="number" class="form-control" name="bed_size" value="{{ $hospitals_info->bed_size }}">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Length of stay</label>
                          <input type="" class="form-control" name="length_of_stay" value="{{ $hospitals_info->length_of_stay }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Specialities</label>
                          <input type="" class="form-control" name="specialities" value="{{ $hospitals_info->specialities }}">
                        </div>
                      </div>
                       <div class="col-md-6">
                            <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                          <div class="fileUpload btn btn-primary">
                           <span>Change Picture</span>
                         <input id="uploadBtn" type="file" class="upload" name="image" />
                          </div>
                        </div>
                    </div>
                     
 <button type="submit" class="btn btn-primary account">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>





              </div>
            </div>
             <div class="col-md-4">
              <div class="card card-profile">
                <div class="" style="">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$hospitals_info->image)}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"></h6>
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                    
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Update</a>
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
               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>


                <div class="card-body">
                  <form method="POST" action="{{route('doctor_update')}}" enctype="multipart/form-data">
                      @csrf
                     <input type="hidden" name="user_id"  value="{{ Auth::user()->id }}" class="form-control">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="full_name" value="{{ $doctors_info->full_name }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" class="form-control" value="{{ $doctors_info->email }}"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          <input type="text" class="form-control" name="dob" value="{{ $doctors_info->dob }}">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">{{ $doctors_info->gender }}</label>
                          <select name="gender" class="form-control">
                            <option value="">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website</label>
                          <input type="text" class="form-control" name="website" value="{{ $doctors_info->website }}">
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="address" value="{{ $doctors_info->address }}">
                        </div>
                      </div>
                    </div>
                   
                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city" value="{{ $doctors_info->city }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" class="form-control" name="state" value="{{ $doctors_info->state }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <input type="number" class="form-control" name="phonenumber" value="{{ $doctors_info->phonenumber }}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Affiliation</label>
                           <input type="" class="form-control" name="affiliation" value="{{ $doctors_info->affiliation }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Certification</label>
                           <input type="" class="form-control" name="certification" value="{{ $doctors_info->certification }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Residency</label>
                           <input type="" class="form-control" name="residency" value="{{ $doctors_info->residency }}">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fellowship</label>
                           <input type="" class="form-control" name="fellowship" value="{{ $doctors_info->fellowship }}">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Experience</label>
                          <input type="number" class="form-control" name="experience" value="{{ $doctors_info->experience }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Internship </label>
                           <input type="" class="form-control" name="internship" value="{{ $doctors_info->internship }}">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medical school</label>
                          <input type="" class="form-control" name="medical_school" value="{{ $doctors_info->medical_school }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Specialities</label>
                          <input type="" class="form-control" name="specialities" value="{{ $doctors_info->specialities }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                            <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                          <div class="fileUpload btn btn-primary">
                           <span>Change Picture</span>
                         <input id="uploadBtn" type="file" class="upload" name="image" />
                          </div>
                        </div>
                    </div>
                     


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating"> Description </label>
                            <textarea class="form-control" name="description" rows="5" style="border: 1px solid #ccc; border-radius: 5px;">
                              {{ $doctors_info->description }}
                            </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
 <button type="submit" class="btn btn-primary account">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>





              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$doctors_info->image)}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"></h6>
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                    
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Update</a>
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
               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>


                <div class="card-body">
                  <form method="POST" action="{{route('user_update')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="row">
                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Name</label>
                          <input type="text" name="full_name" class="form-control" value="{{ Auth::user()->full_name }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <!-- <label class="bmd-label-floating">Email address</label> -->
                          <input type="hidden" name="email" class="form-control" value="{{ Auth::user()->email }}"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          <input type="text" name="dob" class="form-control" value="{{ $user_info->dob }}">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">{{ $user_info->gender }}</label>
                          <select name="gender" class="form-control">
                            <option value="">Change Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control" value="{{ $user_info->address }}">
                        </div>
                      </div>
                    </div>
                    
                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control" value="{{ $user_info->city }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" name="state" class="form-control" value="{{ $user_info->state }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <input type="number" name="phonenumber" class="form-control" value="{{ $user_info->phonenumber }}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Blood Group</label>
                          <input type="text" name="blood_group" class="form-control" value="{{ $user_info->blood_group }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Genotype</label>
                          <input type="text" name="genotype" class="form-control" value="{{ $user_info->genotype }}">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row"> 
                      <div class="col-md-12">
                            <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
                          <div class="fileUpload btn btn-primary">
                           <span>Change Picture</span>
                         <input id="uploadBtn" type="file" class="upload" name="image" />
                          </div>
                        </div>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> update what yourself profile</label>
                            <textarea class="form-control" name="description" rows="5" style="border: 1px solid #ccc; border-radius: 5px;"
                              placeholder="" >
                                {{ $user_info->description }}
                              </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                        <button type="submit" class="btn btn-primary account">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$user_info->image)}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"></h6>
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                    
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Update</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

   @else

                 
                       
    @endif

@endsection



@section('css')


@endsection