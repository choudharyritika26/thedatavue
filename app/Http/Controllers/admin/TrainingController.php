<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TrainingController extends Controller
{
    public function create(){
        return view ('admin.training.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            // 'cropDataX' => 'required|numeric',
            // 'cropDataY' => 'required|numeric',
            // 'cropDataWidth' => 'required|numeric',
            // 'cropDataHeight' => 'required|numeric',
           
        ]);

        $training = new Training;
        $maxSortCol = Training::max('sort_col');
       
        // Set the sort_col for the new record
        $training->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $training->heading = $request->input('heading'); 
        $training->description = $request->input('description');
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $path = public_path('storage/' . $filename);

        //     // Crop the image
        //     $imageCrop = (new ImageManager(Driver::class))->read($image->getRealPath());
        //     $imageCrop->crop(
        //         intval($request->input('cropDataWidth')),
        //         intval($request->input('cropDataHeight')),
        //         intval($request->input('cropDataX')),
        //         intval($request->input('cropDataY'))
        //     );
        //     $imageCrop->resize(509, 339, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $imageCrop->save($path);

        //     $training->image = $filename;
        // }

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

            $training->image = $filename;
        }
        $training->save();
      // dd($training);
      //return redirect()->route('training-index');
      return response()->json([
        'message' => 'Training Add Successfully',
        'redirect_url' => route('training-index'),
    ]);
         }


    //==============index page===================
        public function index(){
            $training = Training::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.training.index',compact('training'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Training::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

          //========================update=====================    
    public function edit($id){
        
        $training = Training::find($id);
        return view('admin.training.edit', compact('training'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([    
            'heading' => 'required',
            'description' => 'required',
            // 'sort_col' => 'required',
           'image' => 'nullable|image',
           
               
        ]);
        
        $training = Training::find($id);   
        if ($request->has('sort_col')) {
            $training->sort_col = $request->input('sort_col');
        }
        $training->heading = $request->input('heading');
        $training->description = $request->input('description');
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $path = public_path('storage/' . $filename);   

        //     // Crop the image
        //     $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
        //     $imageCrop->crop(
        //         intval($request->input('cropDataWidth')),
        //         intval($request->input('cropDataHeight')),
        //         intval($request->input('cropDataX')),
        //         intval($request->input('cropDataY'))
        //     );
        //     $imageCrop->resize(509, 339, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $imageCrop->save($path);
        //     $training->image = $filename;  
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
            if ($training->image && file_exists(public_path('storage/' . $training->image))) {
                unlink(public_path('storage/' . $training->image));
            }

            $training->image = $filename;
        }


        $training->update();
       //  return redirect()->route('training-index');
        return response()->json([
            'message' => 'Training Edit Successfully',
            'redirect_url' => route('training-index'),
        ]);
    
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $training = Training::find($id);
        // $training->delete();
        // return redirect()->back()->with('status','training$training Deleted Successfully');
        $training->is_active = 0; // Set is_active to 0, but don't delete the document
        $training->save(); // Save the changes
        return redirect()->back()->with('status', 'training ' . $training->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
