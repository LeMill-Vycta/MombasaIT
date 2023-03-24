<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminProfileController extends Controller
{
    public function index()
    {
      return view('admin.profile.index');
    }
    public function store(Request $request)
    {
        $this->validateUpdate($request);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        $userPassword = $user->password;

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }
         $user->update($data);
        
        return redirect()->back()->with('message','Profile Updated');
    }
    public function profilePic(Request $request)
    {
        $this->validate($request,['image'=>'required|image|mimes:jpeg,jpg,png,gif']);
        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$name = time().'.'.$image->getClientOriginalExtension();
    		$destination = public_path('/images');
    		$image->move($destination,$name);
    		
    		$user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
    		
    		return redirect()->back()->with('message2','Image Updated');


    	}


    }
    public function validateUpdate($request){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required|numeric',
            'address'=>'required',
            'department'=>'required',
            'education'=>'required',
            'description'=>'required'

       ]);
    }
}
