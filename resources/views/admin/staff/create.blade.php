@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Account Form</h4>
                            <span>New Admin or Staff Account</span>
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
                                <h4 class="card-title">Admin/Staff Form</h4>
                            </div>
                        <div class="card-body">
                        <div class="basic-form">
                        <form action="{{route('staff.store')}}" method="post" enctype="multipart/form-data">@csrf
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{old('email')}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Password</label>
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
                                            <label class="col-sm-3 col-form-label font4">Phone Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{old('address')}}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Department</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" placeholder="Company department" value="{{old('department')}}">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Education</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Certification level" value="{{old('education')}}">
                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Description</label>
                                            <div class="col-lg-6">
                                               <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" id="comment" placeholder="About me">{{old('description')}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font4">Role Select</label>
                                        <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                <select name="role_id" class="mr-sm-2 strong form-control @error('role_id') is-invalid @enderror" id="inlineFormCustomSelect" placeholder="Please select role">
                                            @foreach (App\Models\Role::where('name','!=','client')->get() as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach   
                                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                                            </div>
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
                                                <button type="submit" class="btn btn-sm btn-primary">Create Account</button>
                                            </div>
                                    </div>
                        </form>
                        </div>                                    
                        </div>
                    </div>               
                </div>
</div>   
@endsection