<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingListStaffController extends Controller
{
    public function today(Request $request)
    {
        date_default_timezone_set('Africa/Nairobi');
    	if($request->date){
    		$bookings = Booking::latest()->where('date',$request->date)->where('staff_id',auth()->user()->id)->get();
    		return view('staff.bookinglist.index',compact('bookings'));
    	}
    	$bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
    	return view('staff.bookinglist.index',compact('bookings'));
    }

    public function changeStatus(Request $request,$id)
    {
        $booking  = Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();

    }

    public function allDays()
    {
        $bookings = Booking::latest()->where('staff_id',auth()->user()->id)->paginate(20);
        return view('staff.bookinglist.index',compact('bookings'));
    }

    public function cancelledApp()
    {
        $bookings = Booking::latest()->where('cancel',1)->where('staff_id',auth()->user()->id)->paginate(20);
        return view('staff.bookinglist.index',compact('bookings'));
    }
}
