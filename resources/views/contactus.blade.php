@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
    <div class="col-md-6"> 
      <div class="card h-766.3">   
        <div class="card-header" style="margin-top:20px; margin-bottom:15px;">
        <h3>Get in touch with us</h3>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <div class="card-body">
    <form action="" method="post" action="{{ route('contact.store') }}">
    @csrf
    <div class="form-group">
        <p>Name</p>
        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
        <!-- Error -->
        @if ($errors->has('name'))
        <div class="error">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <p>Email</p>
        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
        @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <p>Phone</p>
        <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
        @if ($errors->has('phone'))
        <div class="error">
            {{ $errors->first('phone') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <p>Subject</p>
        <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
            id="subject">
        @if ($errors->has('subject'))
        <div class="error">
            {{ $errors->first('subject') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <p>Message</p>
        <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
            rows="4"></textarea>
        @if ($errors->has('message'))
        <div class="error">
            {{ $errors->first('message') }}
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 50px;">
    <input type="submit" name="send" value="Submit" class="btn btn-sm btn-info">
</div>
</form>
        </div>
      </div>
    </div> 		
    <div class="col-md-6">
        <div class="card h-766.3 img-fluid" style="width:500px">
        <img class="card-img-top h-432" src="{{ asset ('/images/contactbackground.png') }}" alt="Card image" style="width:100%">
        <div class="card-img-overlay">
        </div>
            <div class="card-body">
            <h3>Contact Information</h3>
            <p style="color:black;">We're here to help and answer any question you might have. We look forward to hearing from you.</p>
            <span>
            <h4>Email</h4>
            <p style="color:black;">support@mombasait.co.ke</p>
            <h4>Phone</h4>
            <p style="color:black;">+254712 345 678</p></span>
            <div class="wrapper" style="background-color:white;">
  <a href="http://www.facebook.com/login" class="icon facebook">
    <div class="tooltip">Facebook</div>
    <span><i class="fa fa-facebook-square"></i></span>
  </a>
  <a href="http://www.twitter.com/login" class="icon twitter">
    <div class="tooltip">Twitter</div>
    <span><i class="fa fa-twitter"></i></span>
  </a>
  <a href="http://www.instagram.com/login" class="icon instagram">
    <div class="tooltip">Instagram</div>
    <span><i class="fa fa-instagram"></i></span>
  </a>
  <a href="http://www.whatsapp.com/login" class="icon github">
    <div class="tooltip">Whatsapp</div>
    <span><i class="fa fa-whatsapp"></i></span>
  </a>
  <a href="http://www.youtube.com/login" class="icon youtube">
    <div class="tooltip">Youtube</div>
    <span><i class="fa fa-youtube"></i></span>
  </a>
</div>            
            </div>
    </div>
</div>


@endsection