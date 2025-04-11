<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainingtype;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TrainingtypeController extends Controller
{
    public function create(){
        return view ('admin.trainingtype.form');    
       }

       public function store(Request $request){

        //dd($request->all());
        // $imageName = time() . '.' . $request->file('image')->extension();
        // $request->image->move(public_path('trainingtype'),$imageName);
        //dd($imageName);

        $validatedData = $request->validate([    
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
           'duration'=> 'required',
           
        ]);
        
        $trainingtype = new Trainingtype;   
        $maxSortCol = trainingtype::max('sort_col');
       
        // Set the sort_col for the new record
        $trainingtype->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $trainingtype->heading = $request->input('heading');
        $trainingtype->description = $request->input('description');
        $trainingtype->duration = $request->input('duration');
        $trainingtype->is_active = 1;

        // $trainingtype->image = $request->input('image');
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

            $trainingtype->image = $filename;
        }
        
        $trainingtype->save();   
      
        return response()->json([
            'message' => 'Training Type Add Successfully',
            'redirect_url' => route('trainingtype-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $trainingtype = Trainingtype::where('is_active',1)->orderBy('sort_col', 'asc')->get();
           //$trainingtype = Trainingtype::all();
            return view('admin.trainingtype.index',compact('trainingtype'));
        }  


        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Trainingtype::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}
        //========================update=====================
    public function edit($id){
        $trainingtype = Trainingtype::find($id);
        return view('admin.trainingtype.edit', compact('trainingtype'));
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([    
    //         'heading' => 'required',
    //         'description' => 'required',
    //         'image' => 'nullable|image', // Change 'null' to 'nullable'
    //         'duration' => 'required',    
    //     ]);
    //     $trainingtype = Trainingtype::find($id);
        
    //     // Update the heading and description
    //     if ($request->has('sort_col')) {
    //         $trainingtype->sort_col = $request->input('sort_col');
    //     }
    //     $trainingtype->heading = $request->input('heading');
    //     $trainingtype->description = $request->input('description');
    //     $trainingtype->duration = $request->input('duration');
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $filename = time() . '.webp';
    //         $path = public_path('storage/' . $filename);

    //         // Crop the image
    //         $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
    //         $imageCrop->crop(
    //             intval($request->input('cropDataWidth')),
    //             intval($request->input('cropDataHeight')),
    //             intval($request->input('cropDataX')),
    //             intval($request->input('cropDataY'))
    //         );

    //         // Resize while maintaining HD quality
    //         $imageCrop->resize(1920, 1080, function ($constraint) {
    //             $constraint->aspectRatio();
    //             $constraint->upsize();
    //         });

    //         // Save as WebP format
    //         $imageCrop->save($path, 100, 'webp');

    //         // Delete old image (optional)
    //         if ($trainingtype->image && file_exists(public_path('storage/' . $trainingtype->image))) {
    //             unlink(public_path('storage/' . $trainingtype->image));
    //         }

    //         $trainingtype->image = $filename;
    //     }

    
    //     // Save the changes to the database
    //     $trainingtype->save(); // This will save the updated heading, description, and image
    
    //     return response()->json([
    //         'message' => 'Trainingtype Edit Successfully',
    //         'redirect_url' => route('trainingtype-index'),
    //     ]);
    // }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([    
        'heading' => 'required',
        'description' => 'required',
        'image' => 'nullable|image', // Corrected validation rule
        'duration' => 'required',    
    ]);
    
    $trainingtype = Trainingtype::find($id);
    
    // Update the heading and description
    if ($request->has('sort_col')) {
        $trainingtype->sort_col = $request->input('sort_col');
    }
    $trainingtype->heading = $request->input('heading');
    $trainingtype->description = $request->input('description');
    $trainingtype->duration = $request->input('duration');
    
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
        if ($trainingtype->image && file_exists(public_path('storage/' . $trainingtype->image))) {
            unlink(public_path('storage/' . $trainingtype->image));
        }

        $trainingtype->image = $filename;
    }

    // Save the changes to the database
    $trainingtype->save(); // This will save the updated heading, description, and image

    return response()->json([
        'message' => 'Trainingtype Edit Successfully',
        'redirect_url' => route('trainingtype-index'),
    ]);
}
        
        
        //=================delete=================
    // public function destroy($id)
    // {
    //     $trainingtype = Trainingtype::find($id);
    //     $trainingtype->delete();
    //     return redirect()->back()->with('status','trainingtype$trainingtype Deleted Successfully');
    // }
    public function destroy($id)
    {
        $trainingtype = Trainingtype::find($id);
        // $trainingtype->delete();
        // return redirect()->back()->with('status','trainingtype$trainingtype Deleted Successfully');
        $trainingtype->is_active = 0; // Set is_active to 0, but don't delete the document
        $trainingtype->save(); // Save the changes
        return redirect()->back()->with('status', 'trainingtype ' . $trainingtype->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
