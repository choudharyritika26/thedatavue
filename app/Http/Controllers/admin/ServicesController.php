<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function create(){
        return view ('admin.services.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $services = new Services;
        $services->heading = $request->input('heading');
        $services->description = $request->input('description');
        // $services->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $services->image = $filename;
        }
        $services->save();
      // dd($services);
      return redirect()->route('services-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $services = Services::all();
            return view('admin.services.index',compact('services'));
        }  

        //========================update=====================
    public function edit($id){
        $services = Services::find($id);
        return view('admin.services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $services = Services::find($id);
        $services->heading = $request->input('heading');
        $services->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $services->image = $filename;
        }

        $services->update();
        return redirect()->route('services-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();
        return redirect()->back()->with('status','services$services Deleted Successfully');
    }
//=================End-delete=================

}
