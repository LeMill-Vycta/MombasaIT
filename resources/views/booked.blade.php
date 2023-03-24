@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-12">
    @if(Session::has('message'))
                <div class="alert pgh3 text-center">
                    {{Session::get('message')}}
                </div>
    @endif
        <div class="card">
            <div class="card-header justify-content-center">
                <span class="text-center">
                <img  src="{{asset('images/services')}}/{{$book->service->image}}" alt="service" width="80px" style="border-radius: 15%; " >
                <h3>{{$book->service->name}} Appointment</h3>
                <p class="lead">Thank you for making an appointment with us!! We have forwarded the details below to you at <span style="color:#00cc99;">{{$book->user->email}}</span> for your future reference. For any assistance reach out to us via the contacts on our <a href="{{url('contactus')}}" style="color:#1200ff;">Contact Us</a> page.</p></span>
            </div>
            <div class="card-body pb-0" style="padding-left:300px; padding-right:300px;">
                
                <ul class="list-group">
                    <li class="list-group-item text-center">
                        <h4>Appointment Details</strong>
                    </li>
                    <li class="list-group-item">
                        <strong>Staff Name :</strong>
                        <span class="mb-0 font4b">{{ucfirst($book->staff->name)}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Email :</strong>
                        <span class="mb-0 font4b">{{$book->staff->email}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Phone Number :</strong>
                        <span class="mb-0 font4b">{{$book->staff->phone_number}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Date :</strong>
                        <span class="mb-0 font4b">{{$book->date}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Time :</strong>
                        <span class="mb-0 font4b">{{$book->time}}</span>
                    </li>
                <ul>
            </div>
            <div class="text-center" style="padding:30px;">
                <a class="btn btn-primary" href="{!! url('/'); !!}">Back to Home</a>
            </div>
        </div>    
    </div>
    </div>
</div>
@endsection

