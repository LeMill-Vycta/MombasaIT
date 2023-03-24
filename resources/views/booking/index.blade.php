@extends('layouts.app')

@section('content')
<div class="container">
        @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
        @endif
        @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
        @endif
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Your Appointment time list:</h4></br> 
                  <span><h4>Total: {{$appointments->count()}}</h4></span>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Service</th>
                          <th scope="col">Staff</th>
                          <th scope="col">Appointment Time</th>
                          <th scope="col">Appointment Date</th>
                          <th scope="col">Created on</th>
                          <th scope="col">Appointment Status</th>
                          <th scope="col">View Progress report</th>
                          <th scope="col">Cancel Appointment</th>
                          <th scope="col">Cancel Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                          <th scope="row"></th>
                          <td class="font4">{{ucfirst($appointment->service->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{ucfirst($appointment->staff->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{$appointment->time}}</td>
                          <td class="font4">{{$appointment->date}}</td>
                          <td class="font4">{{$appointment->created_at}}</td>
                          <td>
                              @if($appointment->status==0)
                              <span class="font4">Pending</span>
                              @else 
                              <span class="font4">Approved</span>
                              @endif
                          </td>
                          <td>
                            <div class="text-center">
                                <a href="{{route('bookprogress.view',[$appointment->id])}}" class="btn btn-info shadow btn-sm sharp mr-1"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg></a>
                            </div>
                          </td>
                          <td>
                          @if($appointment->cancel==0)
                            <div class="text-center">
                                <a href="{{route('booking.showcancel',[$appointment->id])}}" class="btn btn-danger shadow btn-sm sharp mr-1">
                                <i class="fa fa-times"></i>
                                </a>
                            </div>
                          @else
                          <div class="text-center">
                                <a href="" class="btn btn-light shadow btn-sm sharp mr-1">
                                <i class="fa fa-times"></i>
                                </a>
                            </div>
                          @endif
                          </td>
                          <td>
                            @if($appointment->cancel==0)
                            <span class="font4">NO</span>
                            @else
                            <span class="font4">YES</span>
                            @endif
                          </td>
                        </tr>
                        @empty
                        <td class="font4" scope="row">You have no any appointments</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
