<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use Image;

class ServicesController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services  = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
    
      $image       = $request->file('image');
      $filename    = $image->getClientOriginalName();
      $image->move(public_path().'/images/services',$filename);

      $data['image'] = $filename;

      Service::create($data);

      return redirect()->back()->with('message','Service added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $service = Service::find($id);
        return view('admin.service.delete',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));    
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
        $service = Service::find($id);
        $name = $service->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
    		$name = time().'.'.$image->getClientOriginalExtension();
    		$destination = public_path('/images/services');
    		$image->move($destination,$name);
        }
        $data['image'] = $name;
         $service->update($data);
        return redirect()->route('service.index')->with('message','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $service = Service::find($id);
       $serviceDelete = $service->delete();
       if($serviceDelete){
        unlink(public_path('/images/services/'.$service->image));
       }
        return redirect()->route('service.index')->with('message','Service deleted successfully');
    }
    
    public function validateStore($request){
      return  $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif',
            'average_price'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required'            

        ]);

    }
    public function validateUpdate($request,$id){
        return  $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif',
            'average_price'=>'required',
        ]);
    }


    
}

