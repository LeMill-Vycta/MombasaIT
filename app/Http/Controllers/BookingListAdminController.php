<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Progress;

class BookingListAdminController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Africa/Nairobi');
    	if($request->date){
    		$bookings = Booking::latest()->where('date',$request->date)->get();
    		return view('admin.booklist.index',compact('bookings'));
    	}
    	$bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
    	return view('admin.booklist.index',compact('bookings'));
    }

    public function updateStatus(Request $request,$id)
    {
        $booking  = Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();

    }

    public function allTimeAppointment()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.booklist.index',compact('bookings'));
    }

    public function cancelledApp()
    {
        $bookings = Booking::latest()->where('cancel',1)->paginate(20);
        return view('admin.booklist.index',compact('bookings'));
    }

}
