<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Mail\AppointmentMail;
use App\Models\Service;
use Carbon\Carbon;
use App\Models\Progress;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Response;


class FrontendController extends Controller
{
    public function index(Request $request)
    {
       //Check appointment By Date
        date_default_timezone_set('Africa/Nairobi');
        $appointmennt = Appointment::where('date',date('Y-m-d'))->first();
        if(request('date')){
        $staffs = $this->findStaffBasedOnDate(request('date'));
        return view('welcome',compact('staffs'));
        }


        $staffs = Appointment::where('date',date('Y-m-d'))->orderBy('date','asc')->get();
        if (is_null($appointmennt)) {
            return view('welcome',compact('staffs'));
        }
        else {
            $service= Service::where('id',$appointmennt->services_id)->first();

        }
        return view('welcome',compact('staffs','service'));
       
    }

    public function calEvents()
    {
        //Cal
        $appointments = Appointment::all();
        $agenda = array();
            if($appointments->count())
            {
                foreach ($appointments as $ap) {
                    $e = array();
                    $e['title'] = $ap->service->name ?? null ?: 'N/A';
                    $e['start'] = $ap->date;
                    $e['end'] = $ap->date.'+1 day';
                    $e['url'] = route('create.appointment', [$ap->user_id ,$ap->date]);
                    $e['name'] = $ap->staff->name  ?? null ?: 'N/A';
                    $e['option1'] = $ap->service->option_1  ?? null ?: 'N/A';
                    $e['option2'] = $ap->service->option_2  ?? null ?: 'N/A';
                    $e['option3'] = $ap->service->option_3  ?? null ?: 'N/A';

        
                    array_push($agenda, $e);
                  } 
            }
        return \Response::json($agenda);
    }
    

    public function show($staffId,$date)
    {
        $appointment = Appointment::where('user_id',$staffId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $services = Service::where('id',$appointment->services_id)->first();
        $user = User::where('id',$staffId)->first();
        $staff_id = $staffId;

    //show appointment to guest
        if(auth()->guest()){
        return view('appointment',compact('times','date','user','staff_id','services'));
        }
    // hide appointment from staff and admin
        if(auth()->user()->role->name === 'staff' || auth()->user()->role->name === 'admin' ){
            return redirect()->back()->with('errmessage', 'Only Clients can make an appointment');
        }
    //  show clients appointment (route middleware)
        return view('appointment',compact('times','date','user','staff_id','services'));

    }
    public function findStaffBasedOnDate($date)
    {
        $staffs = Appointment::where('date',$date)->get();
        return $staffs;

    }
   
    public function store(Request $request)
    {
        date_default_timezone_set('Africa/Nairobi');
       
        $request->validate(['time'=>'required']);
        $date = today()->format('Y-m-d');
        $oldDate = $request->date < $date;
        $notAgain = $this->checkBookingTimeInterval();
        if($oldDate){
            return redirect()->back()->with('errmessage','Appointment date EXPIRED. Please select a valid date.');
        }
        if($notAgain){
            return redirect()->back()->with('errmessage','You already made an appointment. Please wait to make next appointment');
        }
        
        

        //add to Bookings table
        Booking::create([
            'user_id'=> auth()->user()->id,
            'staff_id'=>$request->staffId,
            'services_id'=>$request->services_id,
            'time' =>$request->time,
            'date' =>$request->date,
            'status'=>0,
            'cancel'=>0
        ]);

        //add to Times table
        Time::where('appointment_id', $request->appointmentId)
             ->where('time',$request->time)
             ->update(['status'=>1]);
        
        //add Progress Report
         $service = Service::where('id',$request->services_id)->first();
        Progress::create([
            'service'=>$service->name,
            'user_id'=> auth()->user()->id,
            'staff_id'=>$request->staffId,
            'date_started'=>$request->date,
            'cancel'=>0
        ]);
        
        //add to Google calendar
        // $startTime = Carbon::parse($request->input('date').' ' .$request->input('time'));
        // $endTime = (clone $startTime)->addHour();
        // $service = Service::where('id',$request->services_id)->first();

        // Event::create([
        //     'name'=>$service->name,
        //     'startDateTime'=>$startTime,
        //     'endDateTime'=>$endTime
        // ]);
        
        //send email notification
        $staffName = User::where('id',$request->staffId)->first();
        $defaultMail = $staffName->email;
        $currentMail = auth()->user()->email;
        $emails = array($defaultMail ,$currentMail);
        $appointment = Appointment::where('user_id',$staffName->id)->where('date',$request->date)->first();
        $services = Service::where('id',$appointment->services_id)->first();

        $mailData = [
            'name'=>auth()->user()->name,
            'phone'=>auth()->user()->phone_number,
            'email'=>auth()->user()->email,
            'time'=>$request->time,
            'date'=>$request->date,
            'staffName' => $staffName->name,
            'staffEmail' => $staffName->email,
            'staffPhone' => $staffName->phone_number,
            'serviceName' =>$services->name,
            'serviceImage' =>$services->image

        ];
        try{
            \Mail::to($emails)
            ->send(new AppointmentMail($mailData));
        }catch(\Exception $e){ }
            return redirect()->route('success')->with('message','Your Apppointment was Booked Successfully!!'); 
    }

    public function success()
    {
       $book = Booking::where('user_id', auth()->user()->id)->latest('created_at')->first();
       return view('booked', compact('book'));
    }

    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at',date('Y-m-d'))
            ->exists();
    }

    //My Appointments
    public function myAppointments(Request $request)
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index', compact('appointments'));
    } 

    public function bookprogress($id)
    {
        $appointment = Booking::find($id);
        $progress = Progress::where('user_id',auth()->user()->id)->where('date_started',$appointment->date)->first();
        $service = Service::where('name',$progress->service)->first();
        $staff = User::where('id',$progress->staff_id)->first();
       //hide progress for cancelled appointment
        if($progress->cancel==1){
            return redirect()->back()->with('errmessage','No progress report available for the appointment'); 
        }
        //handle deleted service or staff
        if(is_null($staff)){
            return redirect()->back()->with('errmessage','Staff associated with your appointment has changed. Fill out the form on the Contact page with Appointment Service and Time for more information.'); 
        }
        if(is_null($service)){
            return redirect()->back()->with('errmessage','Service associated with your appointment has changed.  Fill out the form on the Contact page with Appointment Service and Time for more information.'); 
        }
        return view('booking.view',compact('appointment','progress','service','staff'));

    }

    public function showCancel($id)
    {
        $appointment = Booking::find($id);
        return view('booking.cancel',compact('appointment'));     
    }
     
    //cancel appointments
    public function cancel(Request $request,$id)
    {
        $appointment = Booking::find($id);
        $progress = Progress::where('user_id',auth()->user()->id)->where('date_started',$appointment->date)->first();
        $data = ['date_completed'=> date('Y-m-d'),'cancel'=>1];
        $data2 = ['cancel'=>1];
        $appointment->update($data2);
        $progress->update($data);
        return redirect()->route('my.appointment')->with('message','Appointment cancelled successfully!');
    }

}
