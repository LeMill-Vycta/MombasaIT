@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Service Form</h4>
                            <span>New Service</span>
                        </div>
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
                                <h4 class="card-title">Service Form</h4>
                            </div>
                        <div class="card-body">
                        <div class="basic-form">
                        <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">@csrf
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Service Name" value="{{old('name')}}" autocomplete="off">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Average Price</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="average_price" class="form-control @error('average_price') is-invalid @enderror" placeholder="Average Price" value="{{old('average_price')}}">
                                @error('average_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Description</label>
                                            <div class="col-lg-6">
                                               <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" id="comment" placeholder="Service details">{{old('description')}}
                                               </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Option 1</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_1" class="form-control @error('option_1') is-invalid @enderror" placeholder="Feature 1" value="{{old('option_1')}}">
                                @error('option_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Option 2</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_2" class="form-control @error('option_2') is-invalid @enderror" placeholder="Feature 2" value="{{old('option_2')}}">
                                @error('option_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Option 3</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="option_3" class="form-control @error('option_3') is-invalid @enderror" placeholder="Feature 3" value="{{old('option_3')}}">
                                @error('option_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row basic-form custom_file_input">
                                    <label class="col-sm-3 col-form-label font4">Image Upload</label>
                                            <div class="col-sm-3 input-group custom-file">
                                                <input  type="file" name="image" id="file" onchange="loadFile(event)"  class="custom-file-input @error('image') is-invalid @enderror">
                                                <label for="file-upload" class="custom-file-label">Choose file</label>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                                            </div>	
                                            <img class="image-id" alt="" id="output" width="200"/>
                                            <script>
                                                    var loadFile=function(event) {
                                                        var image= document.getElementById('output');
                                                        image.src= URL.createObjectURL(event.target.files[0]);
                                                    };
                                            </script>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                    </div>
                        </form>
                        </div>                                    
                        </div>
                    </div>               
                </div>
</div>   
@endsection