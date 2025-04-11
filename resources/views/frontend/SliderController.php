<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller       
{
    // public function slider(){
    //     return view('admin.slider');
    // }

    public function create(){
        return view ('admin.slider.form');            
       }

       public function store(Request $request){

        $validatedData = $request->validate([    
            // 'heading' => 'required',
            // 'description' => 'required',
            'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $slider = new Slider;   
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        $slider->is_active = 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/' . $filename);

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($image->getRealPath());
            $imageCrop->crop(
                intval($request->input('cropDataWidth')),
                intval($request->input('cropDataHeight')),
                intval($request->input('cropDataX')),
                intval($request->input('cropDataY'))
            );
            $imageCrop->resize(2287, 980, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $slider->image = $filename;
        }
          $slider->save();   
      // dd($slider);
      //return redirect()->route('slider-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Slider Add Successfully',
            'redirect_url' => route('slider-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $slider = Slider::where('is_active',1)->get();
           //$slider = Slider::all();
            return view('admin.slider.index',compact('slider'));
        }  

        //========================update=====================
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([    
            // 'heading' => 'required',
            // 'description' => 'required',
            // 'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);

        $slider = Slider::find($id);
        
        // Update the heading and description
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
    
        // Check if a new image file has been uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('storage/' . $filename);

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
            $imageCrop->crop(
                intval($request->input('cropDataWidth')),
                intval($request->input('cropDataHeight')),
                intval($request->input('cropDataX')),
                intval($request->input('cropDataY'))
            );
            $imageCrop->resize(2287, 980, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $slider->image = $filename;    
        }    
    
        // Save the changes to the database
        $slider->save(); // This will save the updated heading, description, and image
    
        return response()->json([
            'message' => 'Slider Edit Successfully',
            'redirect_url' => route('slider-index'),
        ]);
    }
        
        
        //=================delete=================
    // public function destroy($id)
    // {
    //     $slider = Slider::find($id);
    //     $slider->delete();
    //     return redirect()->back()->with('status','slider$slider Deleted Successfully');
    // }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        // $slider->delete();
        // return redirect()->back()->with('status','slider$slider Deleted Successfully');
        $slider->is_active = 0; // Set is_active to 0, but don't delete the document
        $slider->save(); // Save the changes
        return redirect()->back()->with('status', 'slider ' . $slider->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}