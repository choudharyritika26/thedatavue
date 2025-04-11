<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\ImageManager;
//use Intervention\Image\ImageManagerStatic as ImageManager;
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
            'sort_col' => 'required|integer',
            'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $slider = new Slider; 
        $slider->sort_col = $request->input('sort_col');  
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
            $imageCrop->resize(1920, 1080, function ($constraint) {
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
            $slider = Slider::where('is_active',1)->orderBy('sort_col', 'asc')->get();
           //$slider = Slider::all();
            return view('admin.slider.index',compact('slider'));
        } 
        
//         public function updateOrder(Request $request)
// {
//     $ids = $request->input('ids');

//     foreach ($ids as $index => $id) {
//         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
//     }

//     return response()->json(['success' => 'Order updated successfully.']);
// }

public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Slider::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
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
            'image'=> 'nullable|image',
            'sort_col' => 'required|integer',
        ]);
    
        $slider = Slider::find($id);
        
        // Update the heading and description
        $slider->sort_col = $request->input('sort_col');
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
            $imageCrop->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path, 90); // Save with 90% quality
            $slider->image = $filename;  
        } 
    
        // Save the changes to the database
        $slider->save(); // This will save the updated heading, description, and image
    
        return response()->json([
            'message' => 'Slider Edit Successfully',
            'redirect_url' => route('slider-index'),
        ]);
    }      

    public function updateold(Request $request, $id)   
    {
        $validatedData = $request->validate([    
            // 'heading' => 'required',
            // 'description' => 'required',
            // 'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);

        $slider = Slider::find($id);
        
        // Update the heading and description
        $slider->sort_col = $request->input('sort_col');
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
            $imageCrop->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $slider->image = $filename;     
        } 
        // Save the changes to the database
        $slider->update(); // This will save the updated heading, description, and image
    
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


// <?php

// namespace App\Http\Controllers\admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Slider;
// use Intervention\Image\ImageManager;
// //use Intervention\Image\ImageManagerStatic as ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;

// class SliderController extends Controller   
// {
//     // public function slider(){
//     //     return view('admin.slider');
//     // }

//     public function create(){
//         return view ('admin.slider.form');    
//        }

//        public function store(Request $request)
//        {
//            $validatedData = $request->validate([
//                'sort_col' => 'required|integer',
//                'image' => 'required|image|dimensions:width=1920,height=1080',
//                'cropDataX' => 'required|numeric',
//                'cropDataY' => 'required|numeric',
//                'cropDataWidth' => 'required|numeric',
//                'cropDataHeight' => 'required|numeric',
//            ], [
//                'image.dimensions' => 'The image field has invalid image dimensions (1920x1080).'  // Custom error message
//            ]);
       
//            $slider = new Slider;
//            $slider->sort_col = $request->input('sort_col');
//            $slider->heading = $request->input('heading');
//            $slider->description = $request->input('description');
//            $slider->is_active = 1;
       
//            if ($request->hasFile('image')) {
//                $image = $request->file('image');
//                $filename = time() . '.' . $image->getClientOriginalExtension();
//                $path = public_path('storage/' . $filename);
       
//                // Crop the image
//                $imageCrop = (new ImageManager(Driver::class))->read($image->getRealPath());
//                $imageCrop->crop(
//                    intval($request->input('cropDataWidth')),
//                    intval($request->input('cropDataHeight')),
//                    intval($request->input('cropDataX')),
//                    intval($request->input('cropDataY'))
//                );
//                $imageCrop->resize(1920, 1080, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
//                $imageCrop->save($path);
       
//                $slider->image = $filename;
//            }
//            $slider->save();
       
//            return response()->json([
//                'message' => 'Slider Added Successfully',
//                'redirect_url' => route('slider-index'),
//            ]);
//        }
       

       

//     //==============index page===================
//         public function index(){
//             $slider = Slider::where('is_active',1)->orderBy('sort_col', 'asc')->get();
//            //$slider = Slider::all();
//             return view('admin.slider.index',compact('slider'));
//         } 
        
// //         public function updateOrder(Request $request)
// // {
// //     $ids = $request->input('ids');

// //     foreach ($ids as $index => $id) {
// //         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
// //     }

// //     return response()->json(['success' => 'Order updated successfully.']);
// // }

// public function updateOrder(Request $request)
// {
//     $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

//     foreach ($ids as $index => $id) {
//         // Update the sort_col field for each slider based on the new index
//         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
//     }

//     return response()->json(['success' => 'Order updated successfully.']);
// }


//         //========================update=====================
//     public function edit($id){
//         $slider = Slider::find($id);
//         return view('admin.slider.edit', compact('slider'));
//     }

//     public function update(Request $request, $id)
// {
//     $validatedData = $request->validate([
//         //'image'=> 'nullable|image',
//         'image' => 'nullable|image|dimensions:width=1920,height=1080',  // Custom validation rule

//         'sort_col' => 'required|integer',
//     ]);

//     $slider = Slider::find($id);

//     // Update the heading and description
//     $slider->sort_col = $request->input('sort_col');
//     $slider->heading = $request->input('heading');
//     $slider->description = $request->input('description');

//     // Check if a new image file has been uploaded
//     if ($request->hasFile('image')) {
//         $file = $request->file('image');
//         $extension = $file->getClientOriginalExtension();
//         $filename = time() . '.' . $extension;
//         $path = public_path('storage/' . $filename);   

//         // Check image dimensions (width and height)
//         $imageDimensions = getimagesize($file);
//         $width = $imageDimensions[0];
//         $height = $imageDimensions[1];

//         // Ensure the image size is exactly 1920x1080
//         if ($width != 1920 || $height != 1080) {
//             return response()->json([
//                 'message' => 'Image size must be 1920x1080 pixels.',
//                 'error' => true,  // Indicate an error
//             ], 400);  // Returning 400 as a Bad Request
//         }

//         // Crop the image
//         $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
//         $imageCrop->crop(
//             intval($request->input('cropDataWidth')),
//             intval($request->input('cropDataHeight')),
//             intval($request->input('cropDataX')),
//             intval($request->input('cropDataY'))
//         );
//         $imageCrop->resize(1920, 1080, function ($constraint) {
//             $constraint->aspectRatio();
//             $constraint->upsize();
//         });
//         $imageCrop->save($path, 90); // Save with 90% quality
//         $slider->image = $filename;  
//     } 

//     // Save the changes to the database
//     $slider->save(); 

//     return response()->json([
//         'message' => 'Slider Edited Successfully',
//         'redirect_url' => route('slider-index'),
//         'error' => false,  // Indicate success
//     ]);
// }
   
        
//         //=================delete=================
//     // public function destroy($id)
//     // {
//     //     $slider = Slider::find($id);
//     //     $slider->delete();
//     //     return redirect()->back()->with('status','slider$slider Deleted Successfully');
//     // }
//     public function destroy($id)
//     {
//         $slider = Slider::find($id);
//         // $slider->delete();
//         // return redirect()->back()->with('status','slider$slider Deleted Successfully');
//         $slider->is_active = 0; // Set is_active to 0, but don't delete the document
//         $slider->save(); // Save the changes
//         return redirect()->back()->with('status', 'slider ' . $slider->name . ' Deactivated Successfully');
//     }
// //=================End-delete=================
// }