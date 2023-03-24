@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card h-auto">
                <div class="card-header">
                    <h4 class="text-center card-title">Staff Information</h4></br>
                    <center><img  src="{{asset('images')}}/{{$user->image}}" alt="" width="100px" style="border-radius: 50%; " ></center>
                </div>  
                <div class="card-body">
                   <p class="h5"> Name: &nbsp; <span style="color: black;">{{ucfirst($user->name)}}</span></p></br>
                   <p class="h5"> Email: &nbsp; <span style="color: black;"> {{$user->email}}</span></p></br>
                   <p class="h5"> Phone Number: &nbsp; <span style="color: black;">{{$user->phone_number}}</span></p></br>
                   <p class="h5"> Education: &nbsp; <span style="color: black;">{{$user->education}}</span></p></br>
                   <p class="h5"> Department: &nbsp; <span style="color: black;">{{$user->department}}</span></p></br>
                   <p class="h5"> Service Details:</p><p style="text-align: center; color: black;">&nbsp;{{$services->description}}</p> </br>
                </div>
                
            </div>
            
        </div>
        <div class="col-md-8">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif
            
            
           
            <form action="{{route('booking.appointment')}}" method="post">@csrf

            <div class="card">
                <div class="card-header" style="border-bottom:0px;">
                <span>
                <h3>{{$services->name}}</h3>
                <p class="h5" style="color: black;">To book your apointment, select a time slot below and click "Book Appointment". For more information, scroll down to the <strong>Additional Information</strong> section below.</p></br>
                <h4> <span style="color:#450b5a;">Service Price range:</span><span style="color: black !important;"> {{$services->average_price}}<span></h4></span>
                <img  src="{{asset('images/services')}}/{{$services->image}}" alt="service" width="150px" style="border-radius: 15%; " >
                </span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                <h4 class="text-center card-title">Time</h4>
                <p class="h4">{{$date}}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($times as $time)
                        <div class="col-md-3">
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="time" value="{{$time->time}}">
                                <span style="font-size:17px;">{{$time->time}}
                                    </span>
                            </label>
                        </div>                            
                        
                        <input type="hidden" name="staffId" value="{{$staff_id}}">
                        <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                        <input type="hidden" name="date" value="{{$date}}">
                        <input type="hidden" name="services_id" value="{{$services->id}}">

                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card-footer">
                @if(Auth::check())
                <button type="submit" class="btn btn-success" style="width: 100%; font-weight:500; color:white; font-size:17px;">Book Appointment</button>
                @else 
                   <center> <p><h5>Please login to make an appointment</h5></p>
                    <a href="{{ route('register')}}" style='margin-right:50px;' class="btn btn-sm btn-info">Register</a>
            <a href="{{ url('login')}}" class="btn btn-sm btn-danger">Login</a> </center>
                @endif    
            </div>

            <div class="card">
                <div class="basic-list-group mx-auto" style="padding:50px;">
                    <ol class="list-group" style="text-align:left; font-size: 16px; font-weight:500 !important;">
                        <li class="list-group-item active" style="text-align:left; font-weight:500; color:white; font-size:18px;">Additional Information:</li>
                        <li class="list-group-item" style="font-size:17px;">- All Appointment Details will be forwarded to the email address provided in the Client Profile.</li>
                        <li class="list-group-item" style="font-size:17px;">- Only <span style="color:#e0333b">ONE</span> appointment can be made <span style="color:#e0333b">per day</span>. In the event two or more services are needed, fill out the form on the Contact Us page with your requirements or get in touch with us via our contacts.</li>
                        <li class="list-group-item" style="font-size:17px;">- Once the appointment has been booked, the staff associated with the service will contact you <span style="color:#e0333b">within 1 hour </span> and discuss all further details including pricing for the service.</li>
                        <li class="list-group-item" style="font-size:17px;">- Communication will be established with you via <span style="color:#e0333b">Phone or Email</span> provided in your Client Profile.</li>
                        <li class="list-group-item" style="font-size:17px;">- Services are priced based on <strong>Client specification</strong> and <strong>project complexity</strong>. <span style="color:#e0333b">Price range</span> per service offers a minimum and maximum price associated with the service.</li>
                        <li class="list-group-item" style="font-size:17px;">- Kindly keep your email address and phone number <span style="color:#e0333b">up-to-date</span> inorder to receive any updates regarding your appointment.</li>
                        <li class="list-group-item" style="font-size:17px;">- All communication will be initiated and carried out by a <span style="color:#e0333b">verified MombasaIT contact</span> ,that is, staff email or staff phone contact provided in the <strong>Staff Information</strong> section above.</li>
                    </ol>
                </div>
            </div>

        </form>
            
        </div>
    </div>
</div>
@endsection
