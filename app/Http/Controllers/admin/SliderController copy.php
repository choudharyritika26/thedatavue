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

       public function store(Request $request)
       {
           $validatedData = $request->validate([    
               'image' => 'required|image',
           ]);
           
           $slider = new Slider; 
       
           // Get the maximum sort_col value from the existing records
           $maxSortCol = Slider::max('sort_col');
       
           // Set the sort_col for the new record
           $slider->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
       
           $slider->heading = $request->input('heading');
           $slider->description = $request->input('description');
           $slider->is_active = 1;
       
           if ($request->hasFile('image')) {
               $image = $request->file('image');
               $filename = time() . '.webp';
               $path = public_path('storage/' . $filename);
       
               // Initialize Image Manager
               $imageManager = new ImageManager(new Driver());
               $imageCrop = $imageManager->read($image->getRealPath());
       
               // Crop values from user input (if available)
               $cropX = intval($request->input('cropDataX', 0));
               $cropY = intval($request->input('cropDataY', 0));
               $cropWidth = intval($request->input('cropDataWidth', $imageCrop->width())); 
               $cropHeight = intval($request->input('cropDataHeight', $imageCrop->height())); 
       
               // Crop and resize while maintaining HD quality
               $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY)
                         ->resize(1920, 1080, function ($constraint) {
                             $constraint->aspectRatio(); // Keep aspect ratio
                             $constraint->upsize(); // Prevent upscaling
                         });
       
               // Save image in WebP format with high quality
               $imageCrop->save($path, 100, 'webp');
       
               $slider->image = $filename;
           }
       
           $slider->save(); 
       
           return response()->json([
               'message' => 'Slider Add Successfully',
               'redirect_url' => route('slider-index'),
           ]);
       }

         public function storenew(Request $request){   

            $validatedData = $request->validate([    
                // 'heading' => 'required',
                // 'description' => 'required',
                // 'sort_col' => 'required|integer',
                'image' => 'required|image',
                // 'cropDataX' => 'required|numeric',
                // 'cropDataY' => 'required|numeric',
                // 'cropDataWidth' => 'required|numeric',
                // 'cropDataHeight' => 'required|numeric',
               
            ]);
            
            $slider = new Slider; 
            // $slider->sort_col = $request->input('sort_col');
            if ($request->has('sort_col')) {
                $slider->sort_col = $request->input('sort_col');
            }  
            $slider->heading = $request->input('heading');
            $slider->description = $request->input('description');
            $slider->is_active = 1;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.webp';
                $path = public_path('storage/' . $filename);
        
                // Initialize Image Manager
                $imageManager = new ImageManager(new Driver());
                $imageCrop = $imageManager->read($image->getRealPath());
        
                // Crop values from user input (if available)
                $cropX = intval($request->input('cropDataX', 0));
                $cropY = intval($request->input('cropDataY', 0));
                $cropWidth = intval($request->input('cropDataWidth', $imageCrop->width())); 
                $cropHeight = intval($request->input('cropDataHeight', $imageCrop->height())); 
        
                // Crop and resize while maintaining HD quality
                $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY)
                          ->resize(1920, 1080, function ($constraint) {
                              $constraint->aspectRatio(); // Keep aspect ratio
                              $constraint->upsize(); // Prevent upscaling
                          });
        
                // Save image in WebP format with high quality
                $imageCrop->save($path, 100, 'webp');
        
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
            // 'sort_col' => 'required|integer',
        ]);
    
        $slider = Slider::find($id);
        
        // Update the heading and description
        if ($request->has('sort_col')) {
            $slider->sort_col = $request->input('sort_col');
        } 
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.webp';
            $path = public_path('storage/' . $filename);

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($image->getRealPath());
            $imageCrop->crop(
                intval($request->input('cropDataWidth')),
                intval($request->input('cropDataHeight')),
                intval($request->input('cropDataX')),
                intval($request->input('cropDataY'))
            );

            // Resize while maintaining HD quality
            $imageCrop->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save as WebP format
            $imageCrop->save($path, 100, 'webp');

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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.webp';
            $path = public_path('storage/' . $filename);
    
            // Initialize Image Manager
            $imageManager = new ImageManager(new Driver());
            $imageCrop = $imageManager->read($image->getRealPath());
    
            // Crop values from user input (or use default)
            $cropX = intval($request->input('cropDataX', 0));
            $cropY = intval($request->input('cropDataY', 0));
            $cropWidth = intval($request->input('cropDataWidth', $imageCrop->width())); 
            $cropHeight = intval($request->input('cropDataHeight', $imageCrop->height())); 
    
            // Crop and resize while maintaining HD quality
            $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY)
                      ->resize(1920, 1080, function ($constraint) {
                          $constraint->aspectRatio();
                          $constraint->upsize();
                      });
    
            // Save as WebP format with 100% quality
            $imageCrop->save($path, 100, 'webp');
    
            // Delete old image if exists
            if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
                unlink(public_path('storage/' . $slider->image));
            }
    
            $slider->image = $filename;
        }
    

        // Save the changes to the database
        $slider->update(); // This will save the updated heading, description, and image
    
        return response()->json([
            'message' => 'Slider Edit Successfully',
            'redirect_url' => route('slider-index'),
        ]);
    }
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


