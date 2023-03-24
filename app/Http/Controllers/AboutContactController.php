<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;


class AboutContactController extends Controller
{
    public function about()
    {
       return view ('aboutus');
    }
    public function contact(Request $request)
    {
       return view ('contactus');
    }
    public function contactStore(Request $request) {
      // Form validation
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
          'subject'=>'required',
          'message' => 'required'
       ]);
      //  Store data in database
      Contact::create($request->all());
      //  Send mail to admin
      \Mail::send('email.contact', array(
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'phone' => $request->get('phone'),
         'subject' => $request->get('subject'),
         'user_query' => $request->get('message'),
     ), function($message) use ($request){
         $message->from($request->email);
         $message->to('support@mombasait.co.ke', 'Admin')->subject($request->get('subject'));
     });
      
      return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
  }
}
