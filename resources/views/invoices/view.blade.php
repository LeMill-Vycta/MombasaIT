@extends('layouts.app')

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
                <div class="row">
                        <div class="col-lg-6 mx-auto text-center" style="padding-bottom:40px;">
                            <div class="col-auto"> <img src="{{ asset('images\mpesa.png')}}" class="img-fluid mb-3" style="max-height: 150px;" alt=""><br>
                            
                            @if ($invoice->progress_of_work === 100)
                                <span><p class="pgh2">Your Bill is: <h3 style="color:black !important;">Ksh. {{$invoice->service_cost}}</h3></p><br>
                            @endif
                                    <h4>Pay Using MPESA:</h4>
                                    <div class="font2a">1. Go to the M-pesa Menu</div>
                                    <div class="font2a">2. Select Pay Bill</div>
                                    <div class="font2a">3. Enter Business No. <span style="font-size:19px !important; color:#1200ff !important;">1234567</span></div>
                                    <div class="font2a">4. Enter Account No. <strong>MombasaIT@XXXXX</strong> (Where XXXXX is your Client account name)</div>
                                    <div class="font2a">5. Enter the Amount </div>
                                    <div class="font2a">6. Enter your M-Pesa PIN then send</div></span>
                                <small class="text-muted">Normal Mpesa rates may apply.</small>
                            </div>
                        </div>
                </div>
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
                                    <td class="left"><strong style="color:#450b5a!important;">Date Completed</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->date_completed}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Completed Work</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->completed_work}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Service Progress</strong></td>
                                    <td class="right"><strong style="color:black !important;">{{$invoice->progress_of_work}}%</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a!important;">Total Cost</strong></td>
                                    <td class="right"><strong style="color:black !important;">Ksh. {{$invoice->service_cost}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong style="color:#450b5a !important; font-size:20px !important;">Invoice Amount</strong></td>
                                    <td class="right"><strong style="color:black !important; font-size:20px !important;">Ksh. {{$invoice->service_cost}}</strong><br>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                        <div class="basic-list-group mx-auto" style="padding:50px;">
                            <ol class="list-group" style="text-align:left; font-size: 16px; font-weight:500 !important;">
                                <li class="list-group-item active" style="text-align:left; color:white; font-size:17px;">Additional Information:</li>
                                <li class="list-group-item">- Payment can be made in person while reviewing service results.</li>
                                <li class="list-group-item">- Payment has to be received in order for any product/result of a service to be released to the client.</li>
                                <li class="list-group-item">- If payment made on MPESA before collection day for the product/result, present the MPESA message on the collection day.</li>
                                <li class="list-group-item">- Payments are made to our MPESA Paybill No. 1234567 using the procedure above.</li>
                            </ol>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
