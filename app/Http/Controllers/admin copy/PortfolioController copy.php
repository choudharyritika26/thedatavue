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
    $validatedData = $request->validate([
        'heading' => 'required',
        'category' => 'required|array',
        'category.*' => 'string',
        'sort_col' => 'required',
        'image' => 'required|image',
        'cropDataX' => 'required|numeric',
        'cropDataY' => 'required|numeric',
        'cropDataWidth' => 'required|numeric',
        'cropDataHeight' => 'required|numeric',
        'startdate' => 'required',
        'enddate' => 'required',
        'slider_image.*.cropDataX' => 'required|numeric',
        'slider_image.*.cropDataY' => 'required|numeric',
        'slider_image.*.cropDataWidth' => 'required|numeric',
        'slider_image.*.cropDataHeight' => 'required|numeric',
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
        'sort_col' => 'required',
        'image' => 'nullable|image',
        'startdate' => 'required',
        'enddate' => 'required',
        'slider_image.*.cropDataX' => 'required|numeric',
        'slider_image.*.cropDataY' => 'required|numeric',
        'slider_image.*.cropDataWidth' => 'required|numeric',
        'slider_image.*.cropDataHeight' => 'required|numeric',
        'slider_image.*' => 'nullable|image',
    ]);

    $portfolio = Portfolio::find($id);
    // ... (other fields)

    // Handle main image upload and cropping
    if ($request->hasFile('image')) {
        // ... (existing image handling code)
    }

    // Handle slider images
    if ($request->hasFile('slider_image')) {
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

        $portfolio->slider_image = implode(',', $filenames); // Save filenames as a comma-separated string
    }

    $portfolio->update();

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
