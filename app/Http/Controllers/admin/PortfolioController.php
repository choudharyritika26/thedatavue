<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Catagory;  
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;


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
               'slider_cropped_image_data' => 'required|array', // Ensure crop data is present
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
           if ($request->hasFile('slider_image')) {
               $filenames = [];
               $sliderImages = $request->file('slider_image');
               
               foreach ($sliderImages as $index => $file) {
                   // Get the cropped image data for this specific slider image
                   $croppedImageData = $request->input('slider_cropped_image_data.' . $index);
       
                   if ($croppedImageData) {
                       // Assuming $croppedImageData is an array with x, y, width, height
                       $x = intval($croppedImageData['x']);
                       $y = intval($croppedImageData['y']);
                       $width = intval($croppedImageData['width']);
                       $height = intval($croppedImageData['height']);
       
                       // Log the values for debugging
                       Log::info('Cropped Image Data', [
                           'x' => $x,
                           'y' => $y,
                           'width' => $width,
                           'height' => $height,
                       ]);
       
                       // Validate dimensions
                       if ($width <= 0 || $height <= 0) {
                           Log::error('Invalid crop dimensions for slider image', [
                               'index' => $index,
                               'width' => $width,
                               'height' => $height,
                           ]);
                           continue; // Skip this image or handle it as needed
                       }
       
                       // Process the image
                       $filename = time() . "_slider_{$index}.webp"; // Unique filename for each slider image
                       $path = public_path('storage/' . $filename);
       
                       // Crop and save the image
                       $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
                       $imageCrop->crop($width, $height, $x, $y);
                       $imageCrop->resize(1920, 1080, function ($constraint) {
                           $constraint->aspectRatio();
                           $constraint->upsize();
                       });
                       $imageCrop->save($path, 100, 'webp');
       
                       $filenames[] = $filename; // Add the filename to the array
                   } else {
                       Log::warning('No cropped data for slider image', ['index' => $index]);
                   }
               }
               
               // Save filenames as a comma-separated string
               if (!empty($filenames)) {
                   $portfolio->slider_image = implode(',', $filenames);
               } else {
                   Log::warning('No slider images were saved');
               }
           }    
       
           // Save the portfolio
           if ($portfolio->save()) {
               return response()->json([
                   'message' => 'Portfolio Added Successfully',
                   'redirect_url' => route('portfolio-index'),
               ]);
           } else {
               Log::error('Failed to save portfolio', ['portfolio' => $portfolio]);
               return response()->json(['message' => 'Failed to save portfolio'], 500);
           }
       }
                      
       public function storeOlddd(Request $request)         
{
    // Validate the input
    $validatedData = $request->validate([   
        'heading' => 'required',    
        'category' => 'required|array',
        'category.*' => 'string',
        'image' => 'required|image',    
        'startdate' => 'required',
        'slider_image' => 'required', // Ensure slider_image is an array
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
    if ($request->hasFile('slider_image')) {
        $filenames = [];
        $sliderImages = $request->file('slider_image');
        
        foreach ($sliderImages as $index => $file) {
            // Get the cropped image data for this specific slider image
            $croppedImageData = $request->input('slider_cropped_image_data.' . $index);

            if ($croppedImageData) {
                // Assuming $croppedImageData is an array with x, y, width, height
                $x = intval($croppedImageData['x']);
                $y = intval($croppedImageData['y']);
                $width = intval($croppedImageData['width']);
                $height = intval($croppedImageData['height']);

                // Log the values for debugging
                Log::info('Cropped Image Data', [
                    'x' => $x,
                    'y' => $y,
                    'width' => $width,
                    'height' => $height,
                ]);

                // Validate dimensions
                if ($width <= 0 || $height <= 0) {
                    Log::error('Invalid crop dimensions for slider image', [
                        'index' => $index,
                        'width' => $width,
                        'height' => $height,
                    ]);
                    continue; // Skip this image or handle it as needed
                }

                // Process the image
                $filename = time() . "_slider_{$index}.webp"; // Unique filename for each slider image
                $path = public_path('storage/' . $filename);

                // Crop and save the image
                $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
                $imageCrop->crop($width, $height, $x, $y);
                $imageCrop->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $imageCrop->save($path, 100, 'webp');

                $filenames[] = $filename; // Add the filename to the array
            } else {
                Log::warning('No cropped data for slider image', ['index' => $index]);
            }   
        }
        
        // Save filenames as a comma-separated string
        if (!empty($filenames)) {
            $portfolio->slider_image = implode(',', $filenames);
        } else {
            Log::warning('No slider images were saved');
        }
    }    

    // Save the portfolio
    if ($portfolio->save()) {
        return response()->json([
            'message' => 'Portfolio Added Successfully',
            'redirect_url' => route('portfolio-index'),
        ]);
    } else {
        Log::error('Failed to save portfolio', ['portfolio' => $portfolio]);
        return response()->json(['message' => 'Failed to save portfolio'], 500);
    }
}             
    //==============index page===================
        public function index(){
            $portfolio = Portfolio::where('is_active',1)->get();
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
            $filename = time() . rand(1, 9999) . '.webp';
            $path = public_path('storage/' . $filename);
    
            // Crop data from request
            $cropX = intval($request->input("cropDataX_$index"));
            $cropY = intval($request->input("cropDataY_$index"));
            $cropWidth = intval($request->input("cropDataWidth_$index"));
            $cropHeight = intval($request->input("cropDataHeight_$index"));
    
            \Log::info("Crop Data for Slider Image $index: X: $cropX, Y: $cropY, Width: $cropWidth, Height: $cropHeight");
    
            // Only crop if valid dimensions are provided
            if ($cropWidth > 0 && $cropHeight > 0) {
                $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
                $imageCrop->crop($cropWidth, $cropHeight, $cropX, $cropY);
    
                // Resize to maintain HD quality
                $imageCrop->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
    
                // Save as webp format
                $imageCrop->save($path, 90, 'webp');
    
                $filenames[] = $filename;
            } else {
                \Log::warning("Invalid crop dimensions for Slider Image $index");
            }
        }
    
        $portfolio->slider_image = implode(',', $filenames);
    }
    

    $portfolio->save(); // Save the portfolio with updated data

    return response()->json([
        'message' => 'Portfolio updated successfully',
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