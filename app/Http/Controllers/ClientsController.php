<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class ClientsController extends Controller
{
    public function index()
    {
        $users  = User::where('role_id','=',3)->get();
        return view('admin.clients.index', compact('users'));
    }


    public function show($id)
    {
         $user = User::find($id);
        return view('admin.clients.delete',compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.clients.edit',compact('user'));    
    }

    public function update(Request $request, $id)
    {
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName =(new User)->userAvatar($request);
            unlink(public_path('images/'.$user->image));
        }
        $data['image'] = $imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }
         $user->update($data);
        return redirect()->route('clients.index')->with('message','Client updated successfully');
    }

    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            abort(401);
       }
       $user = User::find($id);
       $userDelete = $user->delete();
    
        return redirect()->route('clients.index')->with('message','Client deleted successfully');
    }

    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            
            'phone_number'=>'required|numeric',
            'address'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif'
       ]);
    }

}
