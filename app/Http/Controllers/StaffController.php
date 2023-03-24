<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::where('role_id','!=',3)->get();
        return view('admin.staff.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validateStore($request);
      $data = $request->all();
      $name = (new User)->userAvatar($request);
    

      $data['image'] = $name;
      $data['password'] = bcrypt($request->password);
      User::create($data);

      return redirect()->back()->with('message','Staff added successfully');


    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user = User::find($id);
        return view('admin.staff.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.staff.edit',compact('user'));    
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
        return redirect()->route('staff.index')->with('message','Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            return redirect()->back()->with('message','Admin cannot delete their own account!');
       }
       $user = User::find($id);
       $userDelete = $user->delete();
       if($userDelete){
        unlink(public_path('images/'.$user->image));
       }
        return redirect()->route('staff.index')->with('message','Staff deleted successfully');
    }
    
    public function validateStore($request){
      return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:25',
            'phone_number'=>'required|numeric',
            'address'=>'required',
            'department'=>'required',
            'education'=>'required',
            'description'=>'required',
            'role_id'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif'
        ]);

    }
    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            
            'phone_number'=>'required|numeric',
            'address'=>'required',
            'department'=>'required',
            'education'=>'required',
            'description'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif'
       ]);
    }


    
}

