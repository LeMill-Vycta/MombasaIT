@extends('admin.layouts.master')

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
                  <h4 class="card-title">Completed Services Invoice List:</h4></br> 
                  <span>
                  <p class="lead">Total: {{$invoices->count()}}</p>
                  </span>
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
                        .form-control{
                          height:35px;
                        }
                        .txl{
                          padding:10px;
                        }
                </style>
                <div class="card-body">
                  <div class="table-responsive text-center">
                    <table class="table header-border table-hover verticle-middle ">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col">User</th>
                          <th scope="col">Service</th>
                          <th scope="col">Progress</th>
                          <th scope="col">Date Started</th>
                          <th scope="col">Date Completed</th>
                          <th scope="col">Invoice Amount</th>
                          <th scope="col">View Invoice</th>
                          <th scope="col">Edit Progress Report</th>
                          <th scope="col">Payment Received</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($invoices as $invoice)
                        <tr>
                          <th scope="row"></th>
                          <td class="font4"><img src="{{ asset('\images')}}\{{$invoice->user->image ?? null ?: 'N/A'}}" alt="" width="60px" height="60px" style="border-radius:15%;"></td>
                          <td class="font4">{{ucfirst($invoice->user->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{ucfirst($invoice->service ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{$invoice->progress_of_work}}%</td>
                          <td class="font4">{{$invoice->date_started}}</td>
                          <td class="font4">{{$invoice->date_completed}}</td>
                          <td class="font4">Ksh. {{$invoice->service_cost}}</td>
                          <td>
                          <div class="text-center">
                                <a href="{{route('staff-invoices.show',[$invoice->id])}}" class="btn btn-success shadow btn-sm sharp mr-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg>
                                </a>
                            </div>
                          </td>
                          <td>
                          <div class="text-center">
                                <a href="{{route('progress.edit',[$invoice->id])}}" class="btn btn-primary shadow btn-sm sharp mr-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="15" height="15"><path d="M23.821,11.181v0C22.943,9.261,19.5,3,12,3S1.057,9.261.179,11.181a1.969,1.969,0,0,0,0,1.64C1.057,14.739,4.5,21,12,21s10.943-6.261,11.821-8.181A1.968,1.968,0,0,0,23.821,11.181ZM12,18a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,18Z"/><circle cx="12" cy="12" r="4"/></svg>
                                </a>
                            </div>
                          </td>
                          <td>
                            @if($invoice->paid==0)
                            <a href="{{route('change.paid',[$invoice->id])}}"><button class="btn btn-xs btn-danger font2"> NO</button></a>
                            @else
                            <a href="{{route('change.paid',[$invoice->id])}}"><button class="btn btn-xs btn-info font2"> YES</button></a>
                            @endif
                          </td>
                        </tr>
                        @empty
                        <td class="font4" scope="row">There are no invoices</td>
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
