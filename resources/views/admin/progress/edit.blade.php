@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card h-auto">
                <div class="card-header">
                    <h4 class="text-center card-title">Progress Report</h4></br>
                    <center><img  src="{{asset('images')}}/{{$progress->user->image ?? null ?: 'N/A'}}" alt="" width="100px" style="border-radius: 50%; " ></center>
                </div>  
                <div class="card-body">
                   <h5> Client Name: &nbsp; {{ucfirst($progress->user->name ?? null ?: 'N/A')}}</h5></br>
                   <h5> Phone: &nbsp; {{$progress->user->phone_number ?? null ?: 'N/A'}}</h5></br>
                   <h5> Email: &nbsp; {{$progress->user->email ?? null ?: 'N/A'}}</h5></br>
                   <h5> Service: &nbsp; {{$progress->service ?? null ?: 'N/A'}}</h5></br>
                   <h5> Date Started: &nbsp; {{$progress->date_started}}</h5></br>
                   <h5> Date Completed: &nbsp; {{$progress->date_completed}}</h5></br>

                </div>
                
            </div>
            
        </div>
        <div class="col-md-8">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif
            
            
            <form action="{{route('adminprogress.update',[$progress->id])}}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">
                <h4 class="text-center card-title">Update Report</h4>
                <a href="{{ url()->previous() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#450b5e" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>    
                </a>             
                </div>
                <div class="card-body">
                    <div class="basic-form">
                    <div class="form-group row">
                            <h5 class="col-sm-3 col-form-label">Price (Ksh.)</h5>
                            <div class="col-sm-3">
                                <input type="text" name="service_cost" class="form-control @error('price') is-invalid @enderror" placeholder="Amount" value="{{$progress->service_cost}}">
                            </div>
                    </div>
                    <div class="form-group row">
                            <h5 class="col-sm-3 col-form-label">Target Date</h5>
                            <div class="col-sm-3">
                                <input type="text" name="target_date" id="datepicker" class="datepicker-default form-control @error('target_date') is-invalid @enderror" placeholder="" value="{{$progress->target_date}}">
                            </div>
                    </div>
                    <div class="form-group row">
                            <h5 class="col-sm-3 col-form-label">Remaining Work</h5>
                            <div class="col-sm-9">
                                <textarea name="remaining_work" class="form-control @error('remaining_work') is-invalid @enderror" rows="4" placeholder="Client Specifications">{{$progress->remaining_work}}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                            <h5 class="col-sm-3 col-form-label">Completed Work</h5>
                            <div class="col-sm-9">
                                <textarea name="completed_work" class="form-control @error('completed_work') is-invalid @enderror" rows="4" placeholder="Work already completed">{{$progress->completed_work}}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                            <h5 class="col-sm-3 col-form-label">Work Progress</h5>
                        <div class="input-group col-sm-3">
                        <input type="text" name="progress_of_work" class="form-control @error('progress_of_work') is-invalid @enderror" placeholder="0-100" value="{{$progress->progress_of_work}}">
                        <div class="input-group-append">
                        <span class="input-group-text"><h3>%</h3></span>
                        </div>
                        </div>                          
                    </div>
                        <input type="hidden" name="service" value="{{$progress->service ?? null ?: 'N/A'}}">
                        <input type="hidden" name="user_id" value
                        ="{{$progress->user_id ?? null ?: 'N/A'}}">
                        <input type="hidden" name="date_started" value
                        ="{{$progress->date_started}}">
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

            <div class="card-footer">
                <button type="submit" class="btn btn-success" style="width: 100%; margin-bottom: 50px;">Update Report</button>   
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
