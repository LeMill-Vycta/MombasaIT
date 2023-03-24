@extends('layouts.app')

@section('content')
<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h3 class="text-center mb-4">{{ __('Register') }}</h3>
                                    <form method="POST" action="{{ route('register') }}">
									     @csrf
										 
                                        <div class="form-group">
                                            <label class="mb-1"><strong>{{ __('Name') }}</strong></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                     @error('name')
                                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
										</div>
										
                                        <div class="form-group">
                                            <label  for="email" class="mb-1"><strong>{{ __('E-Mail Address') }}</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
										</div>
										
                                        <div class="form-group">
                                            <label  for="phone_number" class="mb-1"><strong>{{ __('Phone Number') }}</strong></label>
                                            <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                     @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
										</div>

                                        <div class="form-group">
                                            <label for="password" class="mb-1"><strong>{{ __('Password') }}</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                        </div>
										
										<div class="form-group">
                                            <label for="password-confirm" class="mb-1"><strong>{{ __('Confirm Password') }}</strong></label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-info btn-block" style="font-size:20px; ">{{strtoupper('Register') }}</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login')}}"><span style="font-size:20px; color:#f72b50 !important;">LOGIN</span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection