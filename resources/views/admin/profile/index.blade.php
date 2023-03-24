@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
        <div class="col-md-3">
            <div class="card h-auto">
                <div class="card-header">
                    <h4>Administrator Profile</h4>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> &nbsp;{{ucfirst(auth()->user()->name)}}</p>
                    <p><strong>Email:</strong> &nbsp;{{auth()->user()->email}}</p>
                    <p><strong>Phone Number:</strong> &nbsp;{{auth()->user()->phone_number}}</p>
                    <p><strong>Address:</strong> &nbsp;{{ucfirst(auth()->user()->address)}}</p>
                    <p><strong>About Me:</strong> &nbsp;{{ucfirst(auth()->user()->description)}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        @if(Session::has('message'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        {{Session::get('message')}}
                    </div>
         @endif 
            <div class="card h-auto">
            <div class="card-header">
                    <h4>Update Profile</h4>
                </div>                
            <div class="card-body">
            <form action="{{route('staffprofile.store')}}" method="post" enctype="multipart/form-data">@csrf
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Name</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ucfirst(auth()->user()->name)}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Email</strong></label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{auth()->user()->email}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Password</strong></label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Phone Number</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone number" value="{{auth()->user()->phone_number}}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Address</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{ucfirst(auth()->user()->address)}}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Department</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" placeholder="Department" value="{{ucfirst(auth()->user()->department)}}">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>Education</strong></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Education" value="{{ucfirst(auth()->user()->education)}}">
                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><strong>About Me</strong></label>
                                            <div class="col-lg-6">
                                               <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" id="comment" placeholder="About me">{{auth()->user()->description}}
                                               </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                                            </div>
                                    </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        @if(Session::has('message2'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        {{Session::get('message2')}}
                    </div>
         @endif 
            <div class="card h-auto">
            <div class="card-header">
                    <h4>Update Image</h4>
                </div>
            <div class="card-body">
                <img class="img-fluid" src="{{asset('/images')}}/{{auth()->user()->image}}" >
                <form action="{{route('staffprofile.pic')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group row basic-form custom_file_input">
                                    <label class="col-auto col-form-label"><strong>Image Upload</strong></label>
                                        <div class="col-auto input-group custom-file">
                                            <input  type="file" name="image" id="file" onchange="loadFile(event)"  class="custom-file-input @error('image') is-invalid @enderror">
                                            <label for="file-upload" class="custom-file-label">Choose file</label>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                    </div>
                                        <img class="img-fluid" id="output"/>
                                        <script>
                                                var loadFile=function(event) {
                                                    var image= document.getElementById('output');
                                                    image.src= URL.createObjectURL(event.target.files[0]);
                                                };
                                        </script>
                                        </div>
                        <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection
