<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{
    
    public function create(){
        return view ('admin.about.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
           // 'sort_col' => 'required',    
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            // 'cropDataX' => 'required|numeric',
            // 'cropDataY' => 'required|numeric',
            // 'cropDataWidth' => 'required|numeric',
            // 'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $about = new About;
        $about->sort_col = $request->input('sort_col');
        $about->heading = $request->input('heading');    
        $about->description = $request->input('description');
        $about->is_active = 1;

        // $about->image = $request->input('image');
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

            $about->image = $filename;
        }
        $about->save();
      // dd($about);
      //return redirect()->route('about-index');
      return response()->json([
        'message' => 'About Add Successfully',
        'redirect_url' => route('about-index'),
    ]);
        // return redirect()->route('');
         }


    //==============index page===================    
        public function index(){
            $about = About::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.about.index',compact('about'));
        } 

//         public function updateOrder(Request $request)
// {
//     $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

//     foreach ($ids as $index => $id) {
//         // Update the sort_col field for each slider based on the new index
//         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
//     }

//     return response()->json(['success' => 'Order updated successfully.']);
// }

        //========================update=====================    
    public function edit($id){
        
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            //'sort_col' => 'required',  
            'heading' => 'required',
            'description' => 'required',
           'image' => 'nullable|',
           
               
        ]);
        
        $about = About::find($id);    
        $about->sort_col = $request->input('sort_col');
        $about->heading = $request->input('heading');
        $about->description = $request->input('description');
        // if ($request->hasFile('image')) {
        //     // Optionally, delete the old image if necessary
        //     // Storage::delete('public/slider/' . $slider->image);
    
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('storage/', $filename);
        //     $slider->image = $filename; // Update the image path

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
            if ($about->image && file_exists(public_path('storage/' . $about->image))) {
                unlink(public_path('storage/' . $about->image));
            }

            $about->image = $filename;
        }

    

        $about->update();
       //  return redirect()->route('about-index');
        return response()->json([
            'message' => 'About Edit Successfully',
            'redirect_url' => route('about-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $about = About::find($id);
        $about->is_active = 0; // Set is_active to 0, but don't delete the document
        $about->save(); // Save the changes
        return redirect()->back()->with('status', 'About ' . $about->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
