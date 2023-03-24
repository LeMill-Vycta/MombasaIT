@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <span class="text-center">
                <img  src="{{asset('images/services')}}/{{$service->image}}" alt="service" width="80px" style="border-radius: 15%;s">
                <h3>{{$invoice->service}} Service</h3>
                <h3 style=" color:black !important;">Invoice</h3></span>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><span class="font3">BACK</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" background="white" fill="#450b5e" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>    
                        </a>
                    </li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row mb-0">
                    <div class="col-lg-12 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Staff</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{ucfirst($invoice->staff->name)}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Date Started</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->date_started}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Target Date</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->target_date}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Date Completed</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->date_completed}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Completed Work</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->completed_work}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Work Done</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->progress_of_work}}%</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Total Cost</strong></td>
                                    <td class="right"><strong style="color:black !important;">Ksh. {{$invoice->service_cost}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a !important; font-size:20px !important;">Invoice Amount</strong></td>
                                    @if ($invoice->progress_of_work === 100)
                                    <td class="right"><strong style="color:black !important; font-size:20px !important;">Ksh. {{$invoice->service_cost}}</strong><br>
                                    @endif
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <style>
                    table tr:first-child td{
                    border-top: none;
                    }
                </style>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
