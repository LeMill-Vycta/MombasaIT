@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Staff</h4>
                            <span>Appointment Slots</span>
                            
                        </div>
                    </div>
                    
                </div>
                <!--successful creating of time slot-->
                @if(Session::has('message'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        {{Session::get('message')}}
                    </div>
                @endif

                 <!--no appointment present for date-->
                 @if(Session::has('errmessage'))
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        {{Session::get('errmessage')}}
                    </div>
                @endif

                <!--form entry errors-->
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
                
            <!-- Check Datepicker -->
            <form action="{{route('appointment.check')}}" method="post">
                @csrf

                <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Choose Date</h4><br>
                
                                @if(isset($date))
                                    <span>Your timetable for:<h4>{{$date}}</h4></span>
                                @endif
                            </div>
                        <div class="card-body col-xl-3">
                            <input  name="date" class="datepicker-default form-control" id="datepicker" autocomplete="off"></br>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </div>
                    </div>
                </div>
                </form> 
                <style type="text/css">
                    .ui-corner-all{
                        font-size:16px;
                        font-color:#450b5a;
                        background:#fff;
                        border-color:transparent;
                    }
                    .ui-corner-all .ui-state-active{
                        background:#450b5a !important;
                        border-radius:50%;
                        
                    }
                    .ui-corner-all .ui-state-highlight{
                        background:#f6f6f6;
                    }
                    .ui-corner-all .ui-state-default{
                        border-color:transparent;
                        background:white;
                        font-size:15px;
                        text-align:center;
                    }
                    .ui-corner-all .ui-state-hover{
                        background:#ae1ce2;
                        color:#fff;
                        border-color:#ae1ce2;
                        border-radius:50%;

                        }
                </style>

                <!-- Edit Existing Appointment Slot -->
                @if(Route::is('appointment.check'))
                <form action="{{route('appointment.updateTime')}}" method="post">
                                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">Service</h4>
                                <span>Current selection:<h4 >{{$services->name ?? null ?: 'N/A'}}</h4></span>
                        </div>
                        <div class="card-body basic-dropdown">
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Select a Service</label>
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select name="service_id" class="mr-sm-2 form-control @error('service_id') is-invalid @enderror" id="inlineFormCustomSelect" value="{{$services}}">
                                    @foreach (App\Models\Service::all() as $service)
                                            <option value="{{$service->id ?? null ?: 'N/A'}}">{{$service->name ?? null ?: 'N/A'}}</option>
                                    @endforeach   
                                        </select>
                                    @error('service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Choose AM Time</h4></br>
                            <span>Select all

                             <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                            </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table primary-table-bordered">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th  scope="row" style="text-align:center" colspan="3">Time Slots</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <input type="hidden" name="appoinmentId" value="{{$appointmentId}}">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><input class="big-checkbox" type="checkbox" name="time[]"  value="8.00am" @if(isset($times)){{$times->contains('time','8.00am')?'checked':''}}@endif >  8.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="8.30am" @if(isset($times)){{$times->contains('time','8.30am')?'checked':''}}@endif>  8.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td><input type="checkbox" name="time[]"  value="9.00am" @if(isset($times)){{$times->contains('time','9.00am')?'checked':''}}@endif>  9.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="9.30am" @if(isset($times)){{$times->contains('time','9.30am')?'checked':''}}@endif>  9.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td><input type="checkbox" name="time[]"  value="10.00am" @if(isset($times)){{$times->contains('time','10.00am')?'checked':''}}@endif>  10.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="10.30am" @if(isset($times)){{$times->contains('time','10.30am')?'checked':''}}@endif>  10.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">4</th>
                                            <td><input type="checkbox" name="time[]"  value="11.00am" @if(isset($times)){{$times->contains('time','11.00am')?'checked':''}}@endif>  11.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="11.30am" @if(isset($times)){{$times->contains('time','11.30am')?'checked':''}}@endif>  11.30am</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Choose PM Time</h4></br>
                              </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table primary-table-bordered">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th  scope="row" style="text-align:center" colspan="3">Time Slots</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <th scope="row">5</th>
                                            <td><input type="checkbox" name="time[]"  value="12.00pm" @if(isset($times)){{$times->contains('time','12.00pm')?'checked':''}}@endif>  12.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="12.30pm" @if(isset($times)){{$times->contains('time','12.30pm')?'checked':''}}@endif>  12.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td><input type="checkbox" name="time[]"  value="1.00pm" @if(isset($times)){{$times->contains('time','1.00pm')?'checked':''}}@endif>  1.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="1.30pm" @if(isset($times)){{$times->contains('time','1.30pm')?'checked':''}}@endif>  1.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td><input type="checkbox" name="time[]"  value="2.00pm" @if(isset($times)){{$times->contains('time','2.00pm')?'checked':''}}@endif>  2.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="2.30pm" @if(isset($times)){{$times->contains('time','2.30pm')?'checked':''}}@endif>  2.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td><input type="checkbox" name="time[]"  value="3.00pm" @if(isset($times)){{$times->contains('time','3.00pm')?'checked':''}}@endif>  3.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="3.30pm" @if(isset($times)){{$times->contains('time','3.30pm')?'checked':''}}@endif>  3.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td><input type="checkbox" name="time[]"  value="4.00pm" @if(isset($times)){{$times->contains('time','4.00pm')?'checked':''}}@endif>  4.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="4.30pm" @if(isset($times)){{$times->contains('time','4.30pm')?'checked':''}}@endif>  4.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">10</th>
                                            <td><input type="checkbox" name="time[]"  value="5.00pm" @if(isset($times)){{$times->contains('time','5.00pm')?'checked':''}}@endif>  5.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="5.30pm" @if(isset($times)){{$times->contains('time','5.30pm')?'checked':''}}@endif>  5.30pm</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style type="text/css">
                      /*input[type=checkbox] {
                           transform: scale(1.0);
                        }*/
                      body{
                          font-size: 18px;
                      }
                    </style>
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"><span style="font-size:17px;">Update<span></button>
                        </div>
                        </div>
                    </div>
                </form>
                @else

                <!-- Table of Appointment Slots History -->
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Your Appointment Slots History:</h4></br> 
                                <span><h4>Total: {{$myappointments->count()}}</h4></span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-hover table-responsive-sm text-center">
                                        <thead>
                                            <tr>
                                                <th scope="row"></th>
                                                <th scope="row">Service</th>
                                                <th scope="row">Creator</th>
                                                <th scope="row">Date</th>
                                                <th scope="row">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($myappointments as $appointment)
                                            <tr>
                                                <th scope="row"></th>
                                                <td class="font4">{{$appointment->service->name ?? null ?: 'N/A'}}</td>
                                                <td class="font4">{{$appointment->staff->name ?? null ?: 'N/A'}}</td>
                                                <td class="font4">{{$appointment->date}}</td>
                                                <td>
                                                <form action="{{route('appointment.check')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="date" value="{{$appointment->date}}">
                                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                                </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>  
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                    </div>        
 @endsection