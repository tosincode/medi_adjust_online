@extends('layouts.dashboard_layout')


@section('booking_content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">BOOKING</h4>
                  <p class="card-category">Once doctor ** accepts your booking you will be able to chat with him</p>
                </div>        
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
                   
                    <div class="row" >
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Number</label>
                          <input type="number" name="phonenumber" value="{{ Auth::user()->phonenumber }}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">Health status</label>
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>
                      </div>
                       <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Health Concern</label>
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>                    
                    </div>
             
                    <button type="submit" class="btn btn-primary pull-right">Book</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
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


