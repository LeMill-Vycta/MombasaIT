@extends('layouts.app')

@section('content')
<div class="container mt-3 mb-3">
    <div class="d-flex flex-row align-items-center"></div>
    <div class="h3" style="text-align: center; color: #450b5a;"> <span>Our Services</span> </div>
    <div class="h3" style="text-align: center; color: #450b5a; padding-bottom: 25px; font-weight:600; background: -webkit-linear-gradient(#e0333b, #1200ff); -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;"> <span>Select a Service by clicking on it to Get Started with your Appointment</span> </div>
    <div class="row mt-1 g-1">
    @foreach($services as $service)
        <div class="col-md-4">
            <a href="{{route('service-appointment.show',[$service->id])}}">
            <div class="card p-4"><style>.card:hover {transform: scale(1.1);}</style>
                <div class="p-1 px-4 text-center"><img src="{{asset('images/services')}}/{{$service->image}}" alt="" height="50" width="50" /></div>
                <div class="email mt-1 text-center" style="padding-bottom: 10px;"> <span class="pgh2">{{$service->name}}</span></div>
                <div class="dummytext mt-1 text-center" style="padding-bottom: 20px;"> <span class="pgt">{{$service->description}}</span> </div>
                <div><span class="pgh2">Features :</span></div>
                <div class="d-flex flex row mr-2 mt-2">
                <ul>
                    <li><div class="icons5"> <i class="fa fa-check-circle" style="color:#fed843 !important;"></i> <span class="pgh">{{$service->option_1}}</span> </div></li>
                    <li><div class="icons5"> <i class="fa fa-check-circle" style="color:#3b97d3 !important;"></i> <span class="pgh">{{$service->option_2}}</span> </div></li>
                    <li><div class="icons5"> <i class="fa fa-check-circle" style="color:#fd4755 !important;"></i> <span class="pgh">{{$service->option_3}}</span> </div></li>
                </ul>
                </div>
            </div>
            </a>
        </div>
    @endforeach
    </div>
</div>

@endsection
