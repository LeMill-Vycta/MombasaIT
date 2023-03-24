<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

class StaffInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Progress::latest()->where('staff_id',auth()->user()->id)->where('progress_of_work',100)->paginate(20);
        return view('staff.staffinvoices.index',compact('invoices'));
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
    public function show($id)
    {
        $invoice = Progress::find($id);
        $service = Service::where('name',$invoice->service)->first();
        $staff = User::where('id',$invoice->staff_id)->first();

         //handle deleted service or staff
         if(is_null($staff)){
            return redirect()->back()->with('errmessage','Staff associated with your appointment has changed. Fill out the form on the Contact page with Appointment Service and Time for more information.'); 
        }
        if(is_null($service)){
            return redirect()->back()->with('errmessage','Service associated with your appointment has changed.  Fill out the form on the Contact page with Appointment Service and Time for more information.'); 
        }
        return view('staff.staffinvoices.view',compact('invoice','service'));
    }


    public function updatePaid(Request $request,$id)
    {
        $invoice = Progress::find($id);
        $invoice->paid =! $invoice->paid;
        $invoice->save();
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $progress = Progress::find($id);
        $progress->update($data);
        return redirect()->route('progress.index')->with('message','Progress Report updated successfully');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy($id)
    {
        $progress = Progress::find($id);
        $progress->delete();
    
         return redirect()->route('progress.index')->with('message','Progress Report deleted successfully');
     }

    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'target_date'=>'nullable|date',
            'progress_of_work'=>'nullable|numeric',
            'completed_work'=>'nullable',
            'remaining_work'=>'nullable'
       ]);
    }
    */
}
