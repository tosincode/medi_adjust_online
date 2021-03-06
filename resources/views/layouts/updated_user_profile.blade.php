@extends('layouts.dashboard_layout')


@section('user_content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>     
               @if(Auth::user()->user == "hospital")       
              <!--  HOSPITAL FORM -->
                <div class="card-body">
                  <form method="POST" action="{{route('post_hospital')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company name</label>
                           <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                          <input type="text" name="full_name" class="form-control" value="{{ Auth::user()->full_name }}">
                        </div>
                      </div>
                       <input type="hidden" name="user" value="{{ Auth::user()->user }}" class="form-control">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          <input type="date" name="dob" class="form-control">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
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
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control">
                        </div>
                      </div>                    
                    </div>
                    <div class="row" >
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control">
                        </div>
                      </div>
                       <div class="col-md-6">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                              
                                <select class="form-control" name="state">
                                    <option value="Abia">Abia</option>  
                                    <option value="Adamawa">Adamawa</option>    
                                    <option value="Akwa-Ibom">Akwa-Ibom</option>
                                    <option value="Anambra">Anambra</option>    
                                    <option value="Bauchi">Bauchi</option>  
                                    <option class="Bayelsa">Bayelsa</option>    
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>    
                                    <option value="Cross-River">Cross-River</option>    
                                    <option value="Delta">Delta</option>    
                                    <option value="Ebonyi">Ebonyi</option>      
                                    <option value="Edo">Edo</option>    
                                    <option value="Ekiti">Ekiti</option>    
                                    <option value="Enugu">Enugu</option>    
                                    <option value="Gombe">Gombe</option>    
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>  
                                    <option value="Kaduna">Kaduna</option>  
                                    <option value="Kano">Kano</option>  
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>    
                                    <option value="Kogi">Kogi</option>  
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>    
                                    <option value="Nasarawa">Nasarawa</option>  
                                    <option value="Niger">Niger</option>    
                                    <option value="Ogun">Ogun</option>  
                                    <option value="Ondo">Ondo</option>  
                                    <option value="Osun">Osun</option>  
                                    <option value="Oyo">Oyo</option>    
                                    <option value="Plateau">Plateau</option>    
                                    <option value="Rivers">Rivers</option>  
                                    <option value="Sokoto">Sokoto</option>  
                                    <option value="Taraba">Taraba</option>  
                                    <option value="Yobe">Yobe</option>  
                                    <option value="Zamfara">Zamfara</option>    
                                    <option value="FCT">FCT</option>    
                                </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website</label>
                          <input type="text" name="website" class="form-control">
                        </div>
                      </div>
                    </div>              
                     <input type="number" name="phonenumber" value="{{ Auth::user()->phonenumber }}" class="form-control">
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Are you a non-profit Organization</label>
                           <select name="non_profit" class="form-control">
                            <option value="">Select</option>
                            <option value="profit">Yes</option>
                            <option value="nonprofit">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Are you certified by CAC</label>
                          <select name="cac_certified" class="form-control">
                            <option value="">Select</option>
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
                           <input type="" name="accreditation" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ownership Type</label>
                          <select name="ownership_type" class="form-control">
                            <option value="">Select</option>
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
                          <input type="" name="cost_perday" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">What is the size of your hospital bed</label>
                           <input type="" name="bed_size" class="form-control">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Length of stay</label>
                          <input type="" name="length_of_stay" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="">
                          <label class="bmd-label-floating">Add a profile picture</label>
                        <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Specialities</label>
                          <select name="specialities" class="form-control">
                            <option value="">Select your speciality</option>
                            <option value="General Hospital">General Hospital</option>
                            <option value="General Medicine">General Medicine</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Specialist Hospital">Specialist Hospital</option>
                          </select>
                        </div>
                        <!-- <div class="form-group">
                          <label>Specialities</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Pls, write your specialization</label>
                            <textarea class="form-control" name="specialities" rows="5"></textarea>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              @elseif(Auth::user()->user == "doctor")
               
                <!--   DOCTOR FORM -->
                <div class="card-body">
                  <form method="POST" action="{{route('post_doctor')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company name</label>
                           <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                          <input type="text" name="full_name" class="form-control" value="{{ Auth::user()->full_name }}">

                        </div>
                      </div>
                       <input type="hidden" name="user" value="{{ Auth::user()->user }}" class="form-control">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          <input type="date" name="dob" class="form-control">
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
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
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control">
                        </div>
                      </div>                    
                    </div>
                    <div class="row" >
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control">
                        </div>
                      </div>
                       <div class="col-md-6">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                              
                                <select class="form-control" name="state">
                                    <option value="Abia">Abia</option>  
                                    <option value="Adamawa">Adamawa</option>    
                                    <option value="Akwa-Ibom">Akwa-Ibom</option>
                                    <option value="Anambra">Anambra</option>    
                                    <option value="Bauchi">Bauchi</option>  
                                    <option class="Bayelsa">Bayelsa</option>    
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>    
                                    <option value="Cross-River">Cross-River</option>    
                                    <option value="Delta">Delta</option>    
                                    <option value="Ebonyi">Ebonyi</option>      
                                    <option value="Edo">Edo</option>    
                                    <option value="Ekiti">Ekiti</option>    
                                    <option value="Enugu">Enugu</option>    
                                    <option value="Gombe">Gombe</option>    
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>  
                                    <option value="Kaduna">Kaduna</option>  
                                    <option value="Kano">Kano</option>  
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>    
                                    <option value="Kogi">Kogi</option>  
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>    
                                    <option value="Nasarawa">Nasarawa</option>  
                                    <option value="Niger">Niger</option>    
                                    <option value="Ogun">Ogun</option>  
                                    <option value="Ondo">Ondo</option>  
                                    <option value="Osun">Osun</option>  
                                    <option value="Oyo">Oyo</option>    
                                    <option value="Plateau">Plateau</option>    
                                    <option value="Rivers">Rivers</option>  
                                    <option value="Sokoto">Sokoto</option>  
                                    <option value="Taraba">Taraba</option>  
                                    <option value="Yobe">Yobe</option>  
                                    <option value="Zamfara">Zamfara</option>    
                                    <option value="FCT">FCT</option>    
                                </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website</label>
                          <input type="text" name="website" class="form-control">
                        </div>
                      </div>
                    </div>
                   
                    
                     <input type="number" name="phonenumber" value="{{ Auth::user()->phonenumber }}" class="form-control">
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Hospital Affiliations</label>
                           <input type="" name="affiliations" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Certification</label>
                           <input type="" name="certification" class="form-control">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Residency</label>
                           <input type="" name="residency" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fellowship</label>
                           <input type="" name="fellowship" class="form-control">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Experience/Training</label>
                          <input type="" name="experience" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Any internship program</label>
                           <input type="" name="internship" class="form-control">
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Medical School</label>
                          <input type="" name="medical_school" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="">
                          <label class="bmd-label-floating">Add a profile picture</label>
                        <input type="file" name="image" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Specialities</label>
                          <select name="specialities" class="form-control">
                            <option value="">Select your speciality</option>
                            <option value="General Hospital">General Hospital</option>
                            <option value="General Medicine">General Medicine</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Specialist Hospital">Specialist Hospital</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                          <label>Profile description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Describe yourself in few words</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
                          </div>
                           </div> 
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              @else
                     
               @endif
            
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">xxxxxxxxxxxx</h6>
                  <h4 class="card-title">xxxxxxxxxxxx</h4>
                  <p class="card-description">
                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


