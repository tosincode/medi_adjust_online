@extends('layouts.dashboard_layout')


@section('appointment_content')

 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
             <div class="content">
        <div class="container-fluid">
          <div class="card">
            
            <div class="card-header card-header-primary">
              <h3 class="card-title">You are booking an appointment with Dr. {{$doctors->full_name}} </h3>
             
            </div>
            <div class="card card-default">
      
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
      <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">

            @if ($user = auth()->user())
        <form action="{{route('make_appointment.store')}}" method="POST">
          @csrf

         <p>
        <input type="hidden" value="{{$user->id}}" name="user_id">
        <input type="hidden" value="{{$doctors->user_id}}" name="doctor_id">
        <label for="name">Title</label>
         <input type="text" class="form-control" name="title" placeholder="Treatment you are looking for..." >
         </p>
         <p>
         <label for="description">Description</label>
         <textarea name="description" id="" cols="10" rows="15" class="form-control" placeholder="Medical Concerns & Questions..." style="font-size:1.6rem;"></textarea>
         </p>
         <p>
         <label for="name" class="mt-2">Date</label>
         <input type="date" class="form-control"  id="date"   name="date" placeholder="Date of appointment">
         </p>
         <p>
         <label for="name" class="mt-2">Time</label>
         <input type="time" class="form-control" id="time"  name="time" placeholder="Time of appointment">
         </p>

         <button type="submit"  class="btn btn-primary btn-round"  style="width: 100px;font-size: 12px;padding: 12px 30px;
    margin: 0.3125rem 1px;
    font-size: 1.2rem;
    font-weight: 900;
    line-height: 1.428571;">Submit</button>

        </form>
    </div>
</div>
</div>
</div>
        @endif
            <div class="col-md-12">
              <div class="places-buttons">
                <div class="row">
                  
                </div>
                <div class="row">
                  
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('uploads/images/'.$doctors->image)}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"></h6>
                  <h4 class="card-title">Dr. {{$doctors->full_name}}</h4>
                 
                  <a href="/listed_doctor/{{ $doctors->user_id}}" class="btn btn-primary btn-round" style="width: 100px;font-size: 12px;padding: 12px 30px;
    margin: 0.3125rem 1px;
    font-size: 1.2rem;
    font-weight: 900;
    line-height: 1.428571;">View</a>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('script')

<script type="text/javascript" src="trix.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

      <script src="{{ asset('js/app.js') }}" defer></script>

<script>


flatpickr('#date', {

    enableTime:false
})

</script>

<script>

 flatpickr('#time',{
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    // time_24hr: true
})

</script>

@endsection


@section('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="trix.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection