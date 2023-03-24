@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ asset('/images/banner/banner1.png') }}" alt="" class="img-fluid" style="width: 100% !important; height: auto;">

        </div>   
        <div class="col-sm-6">
            <h2>Create an account & Book your appointment</h2>
            <p> Welcome to Mombasa IT Company. Our goal is to provide solutions to your business and technology problems. We achieve this through our various service offerings rendered by our esteemed team of professional staff ready to assist you with any of your queries. </br></br>Through our robust platform, you can find and book appointments with any of our staff for FREE. Create an account below to get started.  </p>
            <div class="mt-5">
            <a href="{{ url('register')}}"><button style='margin-right:20px' class="btn btn-warning">Register as Client</button></a>
            <a href="{{ url('login')}}"><button class="btn btn-info" >Login</button></a>
        </div>
        </div>
        
    </div>
    <hr>
<form action="{{ url('/')}}" method="GET">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><h4 class="card-title">Find Staff</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control " id="datepicker"  name="date" placeholder="Select Date" autocomplete="off">
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary">Find Staff</button>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="card mt-1">
            <div class="card-header"><h4>Staff available today</h4></div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Service</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Department</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($staffs as $staff)
                        <tr>
                          <th scope="row"></th>
                          <td>{{ucfirst($staff->service->name)}}</td>
                          <td><img src="{{ asset('/images') }}/{{$staff->staff->image}}" alt="" width="80" style="border-radius: 50%;">
                          </td>
                          <td>{{ucfirst($staff->staff->name)}}</td>
                          <td>{{$staff->staff->department}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('create.appointment',[$staff->user_id,$staff->date])}}">Book Appointment</a>
                        </td>
                        </tr>
                        @empty
                        <td> No staff available today</td>
                        @endforelse 
    
                      </tbody>
                    </table>

                </div>    
                </div>
                
            </div>
        </div>
    </div>
</form>
   
</div>
 
@endsection
