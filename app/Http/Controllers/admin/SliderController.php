<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    // public function slider(){
    //     return view('admin.slider');
    // }

    public function create(){
        return view ('admin.slider.form');
       }

       public function store(Request $request){

        //dd($request->all());
        // $imageName = time() . '.' . $request->file('image')->extension();
        // $request->image->move(public_path('slider'),$imageName);
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $slider = new Slider;
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        // $slider->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $slider->image = $filename;
        }
        $slider->save();
      // dd($slider);
      return redirect()->route('slider-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $slider = Slider::all();
            return view('admin.slider.index',compact('slider'));
        }  

        //========================update=====================
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        //$slider->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $slider->image = $filename;
        }
        // if ($request->hasFile('image')) {
        //     // Delete the old image
        //     Storage::delete('public/slider/' . $slider->image);
    
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/slider', $imageName);
    
        //     // Update the slider model with the new image path
        //     $slider->image = $imageName;
        // }
    
        $slider->update();
        return redirect()->route('slider-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back()->with('status','slider$slider Deleted Successfully');
    }
//=================End-delete=================
}