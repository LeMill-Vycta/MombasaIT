@extends('layouts.app')

@section('content')
<div class="container">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Cancel Appointment</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><span class="font3">BACK</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#450b5e" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>    
                           </a>
                        </li>
                        </ol>
                    </div>
                </div> 
                <div class="col-xl-6 col-lg-12">
                 @if(Session::has('message'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        {{Session::get('message')}}
                    </div>
                @endif
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Confirm cancellation</h4>
                            </div>
                        <div class="card-body">
                        <div class="basic-form">
                            <h3>Appointment Details:</h3></br>
                            <h4>Service:</h4><p>{{$appointment->service->name ?? null ?: 'N/A'}}</p></br>
                            <h4>Staff Name:</h4><p>{{$appointment->staff->name ?? null ?: 'N/A'}}</p></br>
                            <h4>Date:</h4><p>{{$appointment->date}}</p></br>
                            <h4>Time:</h4><p>{{$appointment->time}}</p></br>          
                    <form action="{{route('booking.cancel',[$appointment->id])}}" method="post">@csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger">Cancel Appointment</button>
                                <a href="{{ route('my.appointment') }}" class="btn btn-light">Discard</a>
                            </div>
                        </div>
                    </form>                           
                        </div>                                    
                        </div>
                    </div>               
                </div>
</div>   
@endsection