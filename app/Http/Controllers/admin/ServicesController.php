<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Servicescatagries;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServicesController extends Controller
{
    public function create(){
        $servicescatagries  = Servicescatagries::where('is_active',1)->get();
        return view ('admin.services.form', compact('servicescatagries'));      
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            // 'category' => 'required',
            // 'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            // 'cropDataX' => 'required|numeric',
            // 'cropDataY' => 'required|numeric',
            // 'cropDataWidth' => 'required|numeric',
            // 'cropDataHeight' => 'required|numeric',
            // 'sort_col' => 'required|integer',
           
        ]);
        
        $services = new Services;
        $maxSortCol = Services::max('sort_col');
       
        // Set the sort_col for the new record
        $services->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $services->category  = $request->input('category');
        $services->heading = $request->input('heading');
        $services->description = $request->input('description');
        $services->is_active = 1;
        // $services->image = $request->input('image');
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
        //     $imageCrop->resize(600, 400, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $imageCrop->save($path);

        //     $services->image = $filename;
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

            $services->image = $filename;
        }
        $services->save();
      // dd($services);
      //return redirect()->route('services-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Services Add Successfully',
            'redirect_url' => route('services-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.services.index',compact('services'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Services::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $servicescatagries  = Servicescatagries::where('is_active',1)->get();
        $services = Services::find($id);
        return view('admin.services.edit', compact('services','servicescatagries'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'category' => 'required',
            // 'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            // 'sort_col' => 'required|integer',
            'image'=> 'nullable|image',
           
        ]);
        
        $services = Services::find($id);
        if ($request->has('sort_col')) {
            $services->sort_col = $request->input('sort_col');
        } 
        $services->category  = $request->input('category');
        $services->heading = $request->input('heading');
        $services->description = $request->input('description');
        
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
        //     $imageCrop->resize(600, 400, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });
        //     $imageCrop->save($path);
        //     $services->image = $filename;  

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
            if ($services->image && file_exists(public_path('storage/' . $services->image))) {
                unlink(public_path('storage/' . $services->image));
            }

            $services->image = $filename;
        }




        $services->update();
        //return redirect()->route('services-index');
        return response()->json([
            'message' => 'Services Edit Successfully',
            'redirect_url' => route('services-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();
        // return redirect()->back()->with('status','services$services Deleted Successfully');
        $services->is_active = 0; // Set is_active to 0, but don't delete the document
        $services->save(); // Save the changes
        return redirect()->back()->with('status', 'ser$services ' . $services->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
