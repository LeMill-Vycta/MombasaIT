@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Service Form</h4>
                            <span>Update Service</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">
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
                                <h4 class="card-title">Service Form</h4><br/>
                                <img  src="{{asset('/images/services')}}/{{$service->image}}" width="100px" style="border-radius: 15%;" >
                            </div>
                        <div class="card-body">
                        <div class="basic-form">
                        <form action="{{route('service.update',[$service->id])}}" method="post" enctype="multipart/form-data">@csrf 
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Service Name" value="{{$service->name}}" autocomplete="off">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Average Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="average_price" class="form-control @error('average_price') is-invalid @enderror" placeholder="Average Price" value="{{$service->average_price}}">
                                @error('average_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-lg-6">
                                               <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" id="comment" placeholder="Service details">{{$service->description}}
                                               </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Option 1</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_1" class="form-control @error('option_1') is-invalid @enderror" placeholder="Feature 1" value="{{$service->option_1}}">
                                @error('option_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Option 2</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_2" class="form-control @error('option_2') is-invalid @enderror" placeholder="Feature 2" value="{{$service->option_2}}">
                                @error('option_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Option 3</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_3" class="form-control @error('option_3') is-invalid @enderror" placeholder="Feature 3" value="{{$service->option_3}}">
                                @error('option_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row basic-form custom_file_input">
                                    <label class="col-sm-3 col-form-label">Image Upload</label>
                                            <div class="col-sm-3 input-group custom-file">
                                                <input  type="file" name="image" id="file" onchange="loadFile(event)"  class="custom-file-input @error('image') is-invalid @enderror">
                                                <label for="file-upload" class="custom-file-label">Choose file</label>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                                            </div>	
                                            <img class="image-id" id="output" width="200"/>
                                            <script>
                                                    var loadFile=function(event) {
                                                        var image= document.getElementById('output');
                                                        image.src= URL.createObjectURL(event.target.files[0]);
                                                    };
                                            </script>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                    </div>
                        </form>
                        </div>                                    
                        </div>
                    </div>               
                </div>
</div>   
@endsection


