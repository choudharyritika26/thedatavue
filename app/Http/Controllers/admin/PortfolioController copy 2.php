<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Catagory;  
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PortfolioController extends Controller
{
    public function create(){
        $catagory = Catagory::where('is_active',1)->get();
        return view ('admin.portfolio.form',compact('catagory'));     
       }

       public function store(Request $request)
       {
           // Validate the input
           $validatedData = $request->validate([   
               'heading' => 'required',
               'category' => 'required|array',
               'category.*' => 'string',
               'image' => 'required|image',
               'startdate' => 'required',
               'slider_image' => 'required|array', // Ensure slider_image is an array
           ]);
       
           $portfolio = new Portfolio;
           $maxSortCol = Portfolio::max('sort_col');
              
           // Set the sort_col for the new record
           $portfolio->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
           $categories = $request->input('category', []); // Default to an empty array if 'category' is not set
           $portfolio->category = implode(',', $categories);
           $portfolio->heading = $request->input('heading');   
           $portfolio->description = $request->input('description');
           $portfolio->startdate = $request->input('startdate');
           $portfolio->project_url = $request->input('project_url');
           $portfolio->is_active = 1;
       
           // Handle the main image
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
       
               $portfolio->image = $filename;
           }
       
           // Handle slider images
           if ($request->hasfile('slider_image')) {
               $filenames = [];
               $sliderImages = $request->file('slider_image');
               
               foreach ($sliderImages as $index => $file) {
                   // Get the cropped image data for this specific slider image
                   $croppedImageData = $request->input('slider_cropped_image_data.' . $index); // Assuming you send an array of cropped data
       
                   if ($croppedImageData) {
                       $filename = time() . rand(1, 9999) . '.webp'; // Generate a unique filename
                       $path = public_path('storage/' . $filename);
                       
                       // Convert base64 to image and save
                       list($type, $croppedImageData) = explode(';', $croppedImageData);
                       list(, $croppedImageData) = explode(',', $croppedImageData);
                       $croppedImageData = base64_decode($croppedImageData);
                       file_put_contents($path, $croppedImageData);
                       
                       $filenames[] = $filename;    
                   }
               }
               
               $portfolio->slider_image = implode(',', $filenames);  // Save filenames as a comma-separated string
           }
       
           $portfolio->save();
        
           return response()->json([
               'message' => 'Portfolio Added Successfully',
               'redirect_url' => route('portfolio-index'),
           ]);
       }


public function storeold(Request $request)
{
    $validatedData = $request->validate([
        'heading' => 'required',
        'category' => 'required|array',
        'category.*' => 'string',
        // 'sort_col' => 'required',
        'image' => 'required|image',
        // 'cropDataX' => 'required|numeric',
        // 'cropDataY' => 'required|numeric',
        // 'cropDataWidth' => 'required|numeric',
        // 'cropDataHeight' => 'required|numeric',
        'startdate' => 'required',
        // 'project_url' => 'required|url',
        'slider_image.*' => 'required|image',
    ]);

    $portfolio = new Portfolio;    
    // ... (other fields)

    // Handle main image upload and cropping
    if ($request->hasFile('image')) {
        // ... (existing image handling code)
    }

    // Handle slider images
    if ($request->hasfile('slider_image')) {
        $files = $request->file('slider_image');
        $filenames = [];

        foreach ($files as $index => $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 9999) . '.' . $extension;
            $path = public_path('storage/' . $filename);

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
            $imageCrop->crop(
                intval($request->input("slider_image.$index.cropDataWidth")),
                intval($request->input("slider_image.$index.cropDataHeight")),
                intval($request->input("slider_image.$index.cropDataX")),
                intval($request->input("slider_image.$index.cropDataY"))
            );
            $imageCrop->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $filenames[] = $filename;
        }

        $portfolio->slider_image = implode(',', $filenames);  // Save filenames as a comma-separated string
    }

    $portfolio->save();

    return response()->json([
        'message' => 'Portfolio Add Successfully',    
        'redirect_url' => route('portfolio-index'),
    ]);
}
    //==============index page===================
        public function index(){
            $portfolio = Portfolio::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            //dd($portfolio);
            return view('admin.portfolio.index',compact('portfolio'));
        }  

// drag and drop
        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Portfolio::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

public function removeSliderImage(Request $request)
{
    $request->validate([
        'filename' => 'required|string',
        'portfolio_id' => 'required|integer|exists:portfolios,id',
    ]);

    $portfolio = Portfolio::find($request->portfolio_id);
    $imageFilenames = explode(',', $portfolio->slider_image);

    // Remove the filename from the array
    $imageFilenames = array_filter($imageFilenames, function($filename) use ($request) {
        return $filename !== $request->filename;
    });

    // Update the portfolio with the new image list
    $portfolio->slider_image = implode(',', $imageFilenames);
    $portfolio->save();

    return response()->json(['message' => 'Image removed successfully.']);
}

        //========================update=====================
    public function edit($id){
        $catagory = Catagory::where('is_active',1)->get();
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio','catagory'));
    }
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'heading' => 'required',
        'category' => 'required|array',
        'category.*' => 'string',
        // 'sort_col' => 'required',
        'image'=> 'nullable|image',
        'startdate' => 'required',
        // 'project_url' => 'required|url',
    ]);

    $portfolio = Portfolio::find($id);
    $portfolio->sort_col = $request->input('sort_col');
    $categories = $request->input('category', []);
    $portfolio->category = implode(',', $categories);
    $portfolio->heading = $request->input('heading');
    $portfolio->description = $request->input('description');
    $portfolio->startdate = $request->input('startdate');   
    $portfolio->project_url = $request->input('project_url');

    // Handle the main image upload
    // if ($request->hasFile('image')) {
    //     $file = $request->file('image');
    //     $extension = $file->getClientOriginalExtension();
    //     $filename = time() . '.' . $extension;
    //     $path = public_path('storage/' . $filename);   

    //     // Crop the image
    //     $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());

    //     $cropWidth = intval($request->input('cropDataWidth'));
    //     $cropHeight = intval($request->input('cropDataHeight'));
    //     $cropX = intval($request->input('cropDataX'));
    //     $cropY = intval($request->input('cropDataY'));

    //     // Validate crop dimensions
    //     if ($cropWidth > 0 && $cropHeight > 0) {
    //         $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY);
    //     } else {
    //         // Handle the case where crop dimensions are invalid
    //         // You can log an error or set default values
    //         // For example, you might skip cropping or use the original image
    //     }

    //     $imageCrop->resize(1920, 1080, function ($constraint) {
    //         $constraint->aspectRatio();
    //         $constraint->upsize();
    //     });
    //     $imageCrop->save($path);
    //     $portfolio->image = $filename;  
    // }

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.webp';
        $path = public_path('storage/' . $filename);

        // Crop the image
        $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
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

        // Delete old image (optional)
        if ($portfolio->image && file_exists(public_path('storage/' . $portfolio->image))) {
            unlink(public_path('storage/' . $portfolio->image));
        }

        $portfolio->image = $filename;
    }


    // Handle slider images
    if ($request->hasFile('slider_image')) {
        $files = $request->file('slider_image');
        $filenames = explode(',', $portfolio->slider_image); // Get existing filenames

        foreach ($files as $index => $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 9999) . '.' . $extension;
            $path = public_path('storage/' . $filename);

            // Crop the slider image using the corresponding crop data
            $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());

            $cropWidth = intval($request->input("cropDataWidth_$index"));
            $cropHeight = intval($request->input("cropDataHeight_$index"));
            $cropX = intval($request->input("cropDataX_$index"));
            $cropY = intval($request->input("cropDataY_$index"));

            // Validate crop dimensions
            if ($cropWidth > 0 && $cropHeight > 0) {
                $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY);
            } else {
                // Handle the case where crop dimensions are invalid
                // You can log an error or set default values
            }

            $imageCrop->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $filenames[] = $filename; // Append new filenames to the existing array
        }

        $portfolio->slider_image = implode(',', $filenames); // Save updated filenames as a comma-separated string
    }

    $portfolio->save(); // Save the portfolio with updated data

    return response()->json([
        'message' => 'Portfolio updated successfully',
        'redirect_url' => route('portfolio-index'),
    ]);
}

    public function updateold(Request $request, $id)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'category' => 'required|array', // Validate that category is an array
            'category.*' => 'string', // Validate each category value
            // 'sort_col' => 'required',
            'image'=> 'nullable|image',
            'startdate' => 'required',
            // 'project_url' => 'required|url',
           
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->sort_col = $request->input('sort_col');
       // $portfolio->catagory = $request->input('catagory');
      // $portfolio->catagory = implode(',', $request->input('catagory')); // Save as a comma-separated string
        $categories = $request->input('category', []); // Default to an empty array if 'category' is not set
        $portfolio->category = implode(',', $categories);
        $portfolio->heading = $request->input('heading');
        $portfolio->description = $request->input('description');
        $portfolio->startdate = $request->input('startdate');   
        $portfolio->project_url = $request->input('project_url');
        //$portfolio->image = $request->input('image');
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
            $portfolio->image = $filename;  

        }
// multi image
    // Handle file upload
    if ($request->hasFile('slider_image')) {
        $files = $request->file('slider_image');
        $filenames = [];

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 9999) . '.' . $extension;
            $file->move('storage/', $filename);
            $filenames[] = $filename;
        }

        $portfolio->slider_image = implode(',', $filenames); // Save filenames as a comma-separated string
    }
    
    
    
        $portfolio->update();
       // return redirect()->route('portfolio-index');
       return response()->json([
        'message' => 'Portfolio Edit Successfully',
        'redirect_url' => route('portfolio-index'),
    ]);
    }   
        
        //=================delete=================
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        // $portfolio->delete();
        // return redirect()->back()->with('status','portfolio$portfolio Deleted Successfully');
        $portfolio->is_active = 0; // Set is_active to 0, but don't delete the document
        $portfolio->save(); // Save the changes
        return redirect()->back()->with('status', 'port$portfolio ' . $portfolio->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}