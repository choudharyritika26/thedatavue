<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    
    public function create(){
        return view ('admin.about.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $about = new About;
        $about->heading = $request->input('heading');
        $about->description = $request->input('description');
        $about->is_active = 1;

        // $about->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $about->image = $filename;
        }
        $about->save();
      // dd($about);
      return redirect()->route('about-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $about = About::where('is_active',1)->get();
            return view('admin.about.index',compact('about'));
        } 

        //========================update=====================
    public function edit($id){
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $about->heading = $request->input('heading');
        $about->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $about->image = $filename;
        }

        $about->update();
        return redirect()->route('about-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $about = About::find($id);
        $about->is_active = 0; // Set is_active to 0, but don't delete the document
        $about->save(); // Save the changes
        return redirect()->back()->with('status', 'About ' . $about->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
