@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Services</h4>
                            <span>List of all services</span>
                        </div>
                    </div>
                </div>
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Image</th> 
                                                <th>Name</th>
                                                <th>Average Price</th>
                                                <th>Description</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th class="nosort">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($services)>0)
                                        @foreach($services as $service)
                                            <tr>
                                                <td><img class="rounded-circle" width="35" src="{{asset('images/services')}}/{{$service->image}}" alt=""></td> 
                                                <td class="font4">{{$service->name}}</td>
                                                <td class="font4">{{$service->average_price}}</td>
                                                <td class="font4">{{$service->description}}</td>
                                                <td><a type="button" class="btn btn-primary btn-sm sharp mr-1 " data-toggle="modal" data-target="#exampleModalCenter{{$service->id}}"><i class="fa fa-info" style="color:white;"></i></a></td>
                                                <td><a href="{{route('service.edit',[$service->id])}}" class="btn btn-info shadow btn-sm sharp mr-1"><i class="fa fa-pencil"></i></a></td>
                                                <td><a href="{{route('service.show',[$service->id])}}" class="btn btn-danger outline btn-sm sharp"><i class="fa fa-minus-circle"></i></a></td>												
                                            </tr>

                                        @include('admin.service.model')

                                    
                                        @endforeach
                                        @else
                                        <td class="font4" scope="row">No service to display</td>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
</div>
@endsection