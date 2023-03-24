@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="text-primary mb-0">Appointments list:</h4> 
                  <span><p class="lead">Total: {{$bookings->count()}}</p>
                  <a href="{{ url()->previous() }}"><span class="font4">Back</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#450b5e" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg>    
                           </a></span>
                </div>
                <form action="{{route('client.list')}}" method="GET">

                 <div class="card-header">
                     Filter by Date Started:
                     <br/>
                    <div class="row justify-content-end">
                       <div class="col-sm-6">
                     <input  name="date" class="datepicker-default form-control " id="datepicker" autocomplete="off">
                       </div>
                       <div class="col-md-3">  
                     <button type="submit" class="btn btn-xs btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 15 15">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                     </button>
                       </div>
                    </div>
                </div>
                </form>
                <style type="text/css">
                    .ui-corner-all{
                        font-size:16px;
                        font-color:#450b5a;
                        background:#fff;
                        border-color:transparent;
                    }
                    .ui-corner-all .ui-state-active{
                        background:#450b5a !important;
                        border-radius:50%;
                        
                    }
                    .ui-corner-all .ui-state-highlight{
                        background:#f6f6f6;
                    }
                    .ui-corner-all .ui-state-default{
                        border-color:transparent;
                        background:white;
                        font-size:15px;
                        text-align:center;
                    }
                    .ui-corner-all .ui-state-hover{
                        background:#ae1ce2;
                        color:#fff;
                        border-color:#ae1ce2;
                        border-radius:50%;

                        }
                        .form-control{
                          height:35px;
                        }
                        .txl{
                          padding:10px;
                        }
                </style>
                <div class="card-body">
                  <div class="table-responsive text-center">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Client</th>
                          <th scope="col"></th>
                          <th scope="col">Staff</th>
                          <th scope="col"></th>
                          <th scope="col">Service</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Cancelled</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                          <th scope="row"></th>
                          <td><img src="{{ asset('\images')}}\{{$booking->user->image ?? null ?: 'N/A'}}" alt="" width="60px" height="60px" style="border-radius:15%;"></td>
                          <td class="font4">{{ucfirst($booking->user->name ?? null ?: 'N/A')}}</td>
                          <td><img src="{{ asset('\images')}}\{{$booking->staff->image ?? null ?: 'N/A'}}" alt="" width="60px" height="60px" style="border-radius:15%; "></td>
                          <td class="font4">{{ucfirst($booking->staff->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{ucfirst($booking->service->name ?? null ?: 'N/A')}}</td>
                          <td class="font4">{{$booking->time}}</td>
                          <td class="font4">{{$booking->date}}</td>
                          <td>
                          @if($booking->status==0)
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-sm btn-primary"> Pending</button></a>
                              @else 
                               <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-sm btn-success"> Approved</button></a>
                              @endif
                          </td>
                          <td>
                          @if($booking->cancel==0)
                            <span  class="font4">No</span>
                            @else
                            <span  class="font4">Yes</span>
                          @endif
                          </td>
                        </tr>
                        @empty
                        <td class="font4" scope="row">There are no appointments today</td>
                        @endforelse 
                       
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
