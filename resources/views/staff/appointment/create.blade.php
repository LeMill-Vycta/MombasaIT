@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Staff</h4>
                            <span>Appointment Slot</span>
                        </div>
                    </div>
                    
                </div>
                <!--successful creating of time slot-->
                @if(Session::has('message'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        {{Session::get('message')}}
                    </div>
                @endif
                <!--form entry errors-->
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
                 
            <form action="{{ route('appointment.store') }}" method="post">
                @csrf

                <div class="col-lg-12">
                    <div class="card">                           
                         <div class="card-header">
                                <h4 class="card-title">Choose Date</h4>
                            </div>
                        <div class="card-body col-xl-3">
                            <input  name="date" class="form-control" id="datepicker" autocomplete="off">
                        </div>
                    </div>
                </div>
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
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">Service</h4>
                        </div>
                        <div class="card-body basic-dropdown">
                            <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Select a Service</label>
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select name="services_id" class="mr-sm-2 form-control @error('services_id') is-invalid @enderror" id="inlineFormCustomSelect">
                                    @foreach (App\Models\Service::all() as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach   
                                        </select>
                                    @error('services_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
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
                                                <th style="text-align:center" colspan="3">Time Slots</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><input type="checkbox" name="time[]"  value="8.00am">  8.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="8.30am">  8.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td><input type="checkbox" name="time[]"  value="9.00am">  9.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="9.30am">  9.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td><input type="checkbox" name="time[]"  value="10.00am">  10.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="10.30am">  10.30am</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">4</th>
                                            <td><input type="checkbox" name="time[]"  value="11.00am">  11.00am</td>
                                            <td><input type="checkbox" name="time[]"  value="11.30am">  11.30am</td>
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
                                                <th style="text-align:center" colspan="3">Time Slots</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <th scope="row">5</th>
                                            <td><input type="checkbox" name="time[]"  value="12.00pm">  12.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="12.30pm">  12.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td><input type="checkbox" name="time[]"  value="1.00pm">  1.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="1.30pm">  1.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td><input type="checkbox" name="time[]"  value="2.00pm">  2.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="2.30pm">  2.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td><input type="checkbox" name="time[]"  value="3.00pm">  3.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="3.30pm">  3.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td><input type="checkbox" name="time[]"  value="4.00pm">  4.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="4.30pm">  4.30pm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">10</th>
                                            <td><input type="checkbox" name="time[]"  value="5.00pm">  5.00pm</td>
                                            <td><input type="checkbox" name="time[]"  value="5.30pm">  5.30pm</td>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </div>
            </form> 
                    </div>
 @endsection