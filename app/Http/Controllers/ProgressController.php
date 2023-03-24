<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Booking;


class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        date_default_timezone_set('Africa/Nairobi');
    	if($request->date){
    		$progresss = Progress::latest()->where('date_started',$request->date)->get();
    		return view('staff.progress.index',compact('progresss'));
    	}
        $progresss = Progress::latest()->where('staff_id',auth()->user()->id)->paginate(20);
        return view('staff.progress.index',compact('progresss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //happens in frontendcontroller after client books to automatically create report
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progress = Progress::find($id);
        return view('staff.progress.edit',compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $done = ['date_completed'=> date('Y-m-d')];
        $progress = Progress::find($id);
        $progressFull = Progress::where('progress_of_work',100)->first();
        $progress->update($data);
        $progress->update($done);
        return redirect()->route('progress.index')->with('message','Progress Report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'target_date'=>'nullable|date',
            'progress_of_work'=>'nullable|numeric',
            'completed_work'=>'nullable',
            'remaining_work'=>'nullable'
       ]);
    }

    public function updateCancel(Request $request,$id)
    {
        $progress = Progress::find($id);
        $booking = Booking::where('staff_id',$progress->staff_id)->where('date',$progress->date_started)->first();
        $booking->cancel =! $booking->cancel;
        $progress->cancel =! $progress->cancel;
        $booking->save();
        $progress->save();
        return redirect()->back();

    }
}
