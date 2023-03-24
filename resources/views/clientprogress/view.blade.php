@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <span class="text-center">
                <img  src="{{asset('images/services')}}/{{$service->image}}" alt="service" width="80px" style="border-radius: 15%; " >
                <h3>{{$progress->service}} Service</h3>
                <p style="font-size:20px;">Progress Report</p></span>
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
\                <div class="col-lg-9 mx-auto">
                <ul class="list-group" style="padding-bottom:30px;">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Staff :</strong>
                        <p class="mb-0">{{ucfirst($progress->staff->name)}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Date Started :</strong>
                        <p class="mb-0">{{$progress->date_started}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Service Cost :</strong>
                        <p class="mb-0">{{$progress->service_cost}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Target Date :</strong>
                        <p class="mb-0">{{$progress->target_date}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Date Completed :</strong>
                        <p class="mb-0">{{$progress->date_completed}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Service Specifications :</strong>
                        <p class="mb-0">{{$progress->remaining_work}}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Work Completed :</strong>
                        <p>{{$progress->completed_work}}</p>
                    </li>
                    <li class="list-group-item justify-content-between">
                        <strong>Work Progress :</strong>
                        <br/>
                        <div class="progress" style="margin-top:30px; margin-bottom:10px;">
                            <div class="progress-bar bg-info progress-bar-striped text-center"  aria-valuemin="0" aria-valuemax="100" style="width: {{$progress->progress_of_work}}%;" role="progressbar">
                            <style>.progress {height: 20px;}</style>
                            </div>                            
                        </div> 
                        <p class="lead" style="font-size:16px; text-align:center; margin-bottom:30px;"><strong>{{$progress->progress_of_work}}%</strong> Complete</p>                   
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
