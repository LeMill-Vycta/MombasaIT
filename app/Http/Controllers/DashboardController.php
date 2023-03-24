<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Booking;
use App\Models\User;
use App\Models\Appointment;
use App\Http\Controllers\FrontendController;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Response;
use App\Models\Progress;



class DashboardController extends Controller
{
    public function index()
    {     
        // Dashboaard 
            $totalStaff = User::where('role_id',1)->get();
            $totalClients = User::where('role_id',3)->get();
            
        //Staff Dashboard Stats
            $newappstaff = Booking::where('staff_id',auth()->user()->id)->where('status',0)->get();
            $staffRevenue = Progress::where('staff_id',auth()->user()->id)->where('progress_of_work',100)->sum('service_cost');
            
        //Admin Dashboard Stats
            $newappall = Booking::where('status',0)->get();
            $adminRevenue = Progress::where('progress_of_work',100)->sum('service_cost');

            return view('dashboard',compact('newappall','newappstaff','totalStaff','totalClients','staffRevenue','adminRevenue'));

    
    }

    public function calEvents(Request $request)
    {
        //Staff Cal
        if(auth()->check() && auth()->user()->role->name === 'staff'){
        $appointments = Appointment::where('user_id', auth()->user()->id)->get();
        $agenda = array();
            if($appointments->count())
            {
                foreach ($appointments as $ap) {
                    $e = array();
                    $e['title'] = $ap->service->name ?? null ?: 'N/A';
                    $e['start'] = $ap->date;
                    $e['end'] = $ap->date.'+1 day';
                    array_push($agenda, $e);
                  } 
            }
        return \Response::json($agenda);
        }

        // Admin Cal
        if(auth()->check() && auth()->user()->role->name === 'admin'){
            $appointments = Appointment::all();
            $agenda = array();
                if($appointments->count())
                {
                    foreach ($appointments as $ap) {
                        $e = array();
                        $e['title'] = $ap->service->name ?? null ?: 'N/A';
                        $e['start'] = $ap->date;
                        $e['end'] = $ap->date.'+1 day';
            
                        array_push($agenda, $e);
                      } 
                }
            return \Response::json($agenda);
            }
    }
}