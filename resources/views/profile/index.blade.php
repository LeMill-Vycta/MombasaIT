@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
        <div class="col-md-3">
            <div class="card h-auto">
                <div class="card-header">
                    <h4>Client Profile</h4>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> &nbsp;{{ucfirst(auth()->user()->name)}}</p>
                    <p><strong>Email:</strong> &nbsp;{{auth()->user()->email}}</p>
                    <p><strong>Phone Number:</strong> &nbsp;{{auth()->user()->phone_number}}</p>
                    <p><strong>Address:</strong> &nbsp;{{ucfirst(auth()->user()->address)}}</p>
                    <p><strong>Bio:</strong> &nbsp;{{ucfirst(auth()->user()->description)}}</p>
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
                    <p class="pgh">Update Profile</p>
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
            <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                                            <label class="col-sm-3 col-form-label"><strong>Bio</strong></label>
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
                <img class="img-fluid" alt="" src="{{asset('/images')}}/{{auth()->user()->image}}" >
                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf
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
                                        <img class="img-fluid" alt="" id="output"/>
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
