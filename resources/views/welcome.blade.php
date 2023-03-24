@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row"> 
  <div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center">
            <div style="padding-top:30px; padding-bottom: 10px;">
                <h3  style="font-weight:600; background: -webkit-linear-gradient(#e0333b, #450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; ">Welcome to MombasaIT Company </br> we provide various information and </br>technology services based on</br> FREE Appointments</h3>
            </div>
            <hr>
            @guest
            <div class="card-body"> 
                    <div class="basic-list-group mx-auto" style="width:80%; padding-top:60px;">
                        <ul class="list-group" style="text-align:left;">
                            <li class="list-group-item active" style="text-align:left; color:white; font-size:18px;">You are now a Guest at Mombasa IT. As a Guest you can:</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Become a <strong style="font-weight:600; font-size:18px; background: -webkit-linear-gradient(#450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; " style="padding:5px !important; font-size:17px;">Client</strong> using the <a href="{{url('register')}}" style="color:#1200ff !important;">Register</a> button and <strong>Make an Appointment with us for any services you need.</strong>.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- View all <a href="{{url('services')}}" style="color:#1200ff;">Our Services</a> in the menu links above.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- View a list of <a href="{{url('our-staff')}}" style="color:#1200ff">Our Staff</a> ready to assist you with your service requirements.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Find more information about us from our <a href="{{url('aboutus')}}" style="color:#1200ff">About us</a> page for more information about MombasaIT</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- View availablility of staff by clicking "Check" in <a href="{{url('our-staff')}}" style="color:#1200ff">Our staff</a> page.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- View our Appointment Schedule calendar to the left for a comprehensive look at our <span style="color:#e0333b">Monthly Appointment Schedule.</span></li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Use the <span style="color:#e0333b">Find Staff</span> tool below to get a list of staff available on any given day.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- By default,<strong style="font-weight:600; background: -webkit-linear-gradient(#e0333b, #450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; ">all staff available today</strong> should be visible in the <span style="color:#e0333b">Staff Available Results</span> section at the bottom of this page.</li>
                        </ul>
                    </div>
            </div>
            @elseif(auth()->check()&& auth()->user()->role->name === 'client')
            <div class="card-body"> 
                    <div class="basic-list-group mx-auto" style="width:80%;">
                        <ul class="list-group" style="text-align:left; font-size:16px !important;">
                            <li class="list-group-item active" style="text-align:left; color:white; font-size:18px;">You are now signed-in as a Client at Mombasa IT. As a Client you can:</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Use our <span style="color:#e0333b">Monthly Appointment Schedule</span> on the left or our <span style="color:#e0333b">Find Staff</span> tool below to get a access staff available on any given day.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- <strong style="font-weight:600; font-size:18px; background: -webkit-linear-gradient(#e0333b, #450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; ">Book an Appointment</strong> by clicking on an appointment on the calendar and selecting the relevant time based on the available time slots provided.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Click on your user icon in the top right corner to view the Client Menu.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- View availablility of staff by clicking "Check Now" in <a href="{{url('our-staff')}}" style="color:#1200ff">Our staff</a> page.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Use the <span style="color:#e0333b">Find Staff</span> tool below to get a list of staff available on any given day.</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- By default,<strong>all staff available today</strong> should be visible in the <span style="color:#e0333b">Staff Available Results</span> section at the bottom of this page.</li>
                        </ul>
                    </div>
            </div>
            @endif
            @if(auth()->check()&& auth()->user()->role->name === 'staff')
            <div class="card-body"> 
                    <div class="basic-list-group mx-auto" style="width:80%; padding-top:120px;">
                        <ul class="list-group" style="text-align:left; font-size:16px !important;">
                            <li class="list-group-item active" style="text-align:left; color:white; font-size:18px;">You are now signed-in as Staff at Mombasa IT. As a Staff you can:</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Click on your user icon in the top right corner to view the Staff Menu. Click on <a href="{{url('dashboard')}}" style="font-weight:600; font-size:18px; background: -webkit-linear-gradient(#e0333b, #450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; ">Dashboard</a> option to access the <strong>Staff Dashboard</strong>.</li>
                        </ul>
                    </div>
            </div>
            @endif
            @if(auth()->check()&& auth()->user()->role->name === 'admin')
            <div class="card-body"> 
                    <div class="basic-list-group mx-auto" style="width:80%; padding-top:120px;">
                        <ul class="list-group" style="text-align:left; font-size:16px !important;">
                            <li class="list-group-item active" style="text-align:left; color:white; font-size:18px;">You are now signed-in as an Admin at Mombasa IT. As an Admin you can:</li>
                            <li class="list-group-item" style="padding:5px !important; font-size:17px;">- Click on your user icon in the top right corner to view the Admin Menu. Click on <a href="{{url('dashboard')}}" style="font-weight:600; font-size:18px; background: -webkit-linear-gradient(#e0333b, #450b5a, #00cc99); -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; ">Dashboard</a> option to access the <strong>Admin Dashboard</strong>.</li>
                        </ul>
                    </div>
            </div>
            @endif
        </div>
        </div>
        <div class="col-lg-8">
                @if (session()->has('flash_notification.success')) 
                    <div class="ml-auto d-inline-flex alert alert-success">
                        {!! session('flash_notification.success') !!}
                        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>    
                    </div>
                @endif
                @if (session()->has('errmessage')) 
                    <div class="ml-auto d-inline-flex alert alert-danger">
                        {!! session('errmessage') !!}
                        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>    
                    </div>
                @endif
            <div class="card h-auto">
                <div class="card-header">
                    <span>
                    <h3 class="card-title">Monthly Appointment Schedule</h3>
                    </br>
                    <p>To find out more information or book an Appointment, <i><strong>Click</strong></i> on the listed Appointments in the calendar below to view their respective available time slots.</p></span>
                    </span>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                    <style>
                    .fc-scroller {
                                overflow-y: hidden !important;
                                }
                    </style>
                    @if (!Auth::check())
                    <div class="mt-5">
                        <strong>Ready to make an appointment? Sign in or Register to do create one</strong></br></br>
                        &nbsp;
                        &nbsp;
                        <a href="{{ url('register')}}"><button style='margin-right:20px' class="btn btn-sm btn-info">Register as Client</button></a>
                        <a href="{{ url('login')}}"><button class="btn btn-sm btn-danger">Login</button></a>
                    </div>
                    @endif
                </div> 
            </div>
        </div>
    </div>
 </div>
</div>
</div>
</div> 
    <hr>
<div class="container">
<form action="{{ url('/')}}" method="GET">
    <div class="col-lg-12">
    <div class="h3" style="text-align: center; color: #450b5a; padding-bottom: 25px;"> <span>Find Staff ready to assist you on your Date of Choice</span> </div>
    <div class="row justify-content-center">       
            <div class="col-lg-12">
            <div class="card">
            <div class="card-header"><h4 class="card-title">Select Date</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control " id="datepicker"  name="date" placeholder="Pick a Day" autocomplete="off">
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-sm btn-primary">Find Staff</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="card col-lg-12 mt-1">
            <div class="card-header"><h4>Staff Available Results</h4></div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm text-center">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th class="pgh" scope="col">Service</th>
                          <th class="pgh" scope="col">Photo</th>
                          <th class="pgh" scope="col">Name</th>
                          <th class="pgh" scope="col">Department</th>
                          <th class="pgh" scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($staffs as $staff)
                        <tr>
                          <th scope="row"></th>
                          <td class="pgt" >{{ucfirst($staff->service->name ?? null ?: 'N/A')}}</td>
                          <td><img src="{{ asset('/images') }}/{{$staff->staff->image ?? null ?: 'N/A'}}" alt="" width="80" style="border-radius: 50%;">
                          </td>
                          <td class="pgt" >{{ucfirst($staff->staff->name ?? null ?: 'N/A')}}</td>
                          <td class="pgt" >{{$staff->staff->department ?? null ?: 'N/A'}}</td>
                          <td class="pgt" >{{$staff->date}}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('create.appointment',[$staff->user_id,$staff->date])}}">Book Appointment</a>
                        </td>
                        </tr>
                        @empty
                        <td class="pgt" > No staff available on this day. Try again later.</td>
                        @endforelse 
    
                      </tbody>
                    </table>

                </div>    
            </div>
                
            </div>
        </div>
    </form>
</div>

   
 
@endsection

