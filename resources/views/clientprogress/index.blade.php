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
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-header">
                  <h4 class="card-title">Your Progress Reports List:</h4></br> 
                  <span>
                  <p class="lead">Total: {{$progresss->count()}}</p>
                  </span>
                </div>
                <form action="{{route('clientprogress.index')}}" method="GET">
                 <div class="card-header">
                     <span class="font4">Filter by Date Started:</span>
                     <br/>
                    <div class="row justify-content-end">
                       <div class="col-sm-6">
                       <input  name="date" class="datepicker-default form-control " id="datepicker" autocomplete="off">
                       </div>
                       <div class="col-md-3">  
                       <button type="submit" class="btn btn-md btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 15 15">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                     </button>  
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
                        .form-control{
                          height:35px;
                        }
                        .txl{
                          padding:10px;
                        }
                </style>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table header-border table-hover verticle-middle text-center">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col">Staff</th>
                          <th scope="col">Service</th>
                          <th scope="col">Service Cost</th>
                          <th scope="col">Date Started</th>
                          <th scope="col">Target Date</th>
                          <th scope="col">Progress</th>
                          <th scope="col">Date Completed</th>
                          <th scope="col">View Progress Report</th>
                          <th scope="col">View Invoice</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($progresss as $progress)
                        <tr>
                          <th scope="row"></th>
                          <td class="font4"><img src="{{ asset('\images')}}\{{$progress->staff->image ?? null ?: 'N/A'}}" alt="" width="60px" height="60px" style="border-radius:15%;"></td>
                          <td class="font4">{{ucfirst($progress->staff->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{ucfirst($progress->service ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{$progress->service_cost}}</td>
                          <td class="font4">{{$progress->date_started}}</td>
                          <td class="font4">{{$progress->target_date}}</td>
                          <td class="font4">{{$progress->progress_of_work}}%</td>
                          <td class="font4">{{$progress->date_completed}}</td>
                          <td>
                            <div class="tex-center">
                                <a href="{{route('clientprogress.show',[$progress->id])}}" class="btn btn-info shadow btn-sm sharp mr-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg>
                                </a>
                            </div>
                          </td>
                          <td>
                            @if($progress->progress_of_work == 100)
                            <div class="text-center">
                                <a href="{{route('invoices.show',[$progress->id])}}" class="btn btn-success shadow btn-sm sharp mr-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg>
                                </a>
                            </div>
                            @else
                            <div class="text-center">
                                <a href="" class="btn btn-light shadow btn-sm sharp mr-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg>
                                </a>
                            </div>
                            @endif
                          </td>
                        </tr>
                        @empty
                        <td class="font4" scope="row">There are no progress reports</td>
                        @endforelse 
                       
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
