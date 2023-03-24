@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-lg-12">
  @if (session()->has('errmessage')) 
                    <div class="ml-auto d-inline-flex alert alert-danger">
                        {!! session('errmessage') !!}
                        <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>    
                    </div>
  @endif
<div class="card mt-1">
            <div class="card-header">
            <h4 class="text-center card-title">Staff available for:</h4>
            <h3>{{$service->name}}</h3>
            </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm">
                      <thead>
                        <tr class="text-center">
                          <th scope="col"></th>
                          <th scope="col">Service</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Department</th>
                          <th scope="col">Date</th>
                          <th scope="col">Booking</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($staffs as $staff)
                        <tr class="text-center">
                          <th scope="row"></th>
                          <td class="font4">{{ucfirst($staff->service->name)}}</td>
                          <td><img src="{{ asset('/images') }}/{{$staff->staff->image}}" alt="" width="80" style="border-radius: 50%;"></td>
                          <td class="font4">{{ucfirst($staff->staff->name)}}</td>
                          <td class="font4">{{$staff->staff->department}}</td>
                          <td class="font4">{{$staff->date}}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('create.appointment',[$staff->user_id,$staff->date])}}">Book Appointment</a>
                        </td>
                        </tr>
                        @empty
                        <td> No staff available at this period. Please try again later.</td>
                        @endforelse 
    
                      </tbody>
                    </table>

                </div>    
                </div>
              </div>
            </div>
@endsection