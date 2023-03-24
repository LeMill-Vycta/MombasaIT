@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Our Staff</h4>
                <span style="color: #450b5a;">
                    <a href="{{route('ourstaff')}}"><span class="font4">Back</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#450b5e" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>    
                           </a>
                </span>
            </div>
            <form action="{{route('ourstaff')}}" method="GET">
            <div class="card-header">
                     <h4>Search staff:</h4>
                     <br/>
                    <div class="row justify-content-end">
                       <div class="col-sm-6">
                     <input  name="name" class="form-control " id="name"  autocomplete="off">
                       </div>
                       <div class="col-md-3">  
                     <button type="submit" class="btn btn-md btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 15 15">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                     </button>                       
                    </div>
                    </div>
            </div>
            </form>
            <div class="card-body">
            <div class="table-responsive">
            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif
                <table class="table patient-activity">
                @foreach($staffs as $staff)
                <tr href="">
                    <td>
                        <div class="media align-items-center">
                            <img class="mr-3 img-fluid rounded" width="78" src="{{asset('images')}}/{{$staff->image}}" alt="Staff Photo">
                            <div class="media-body">
                                <h5 class="font">{{$staff->name}}</h5>
                                <p class="pgt">{{$staff->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5 class="font">Contact</h5>
                        <p class="pgt">{{$staff->phone_number}}</p>
                    </td>
                    <td>
                        <h5 class="font">Department</h5>
                        <p class="pgt">{{$staff->department}}</p>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="font text-center">Availablility</h5>
                                <a class="btn btn-sm btn-danger" href="{{route('ourstaff-appointment.show',[$staff->id])}}">Check Now</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </table>
            </div>
            </div>
        </div>
    
</div>
</div>
@endsection
