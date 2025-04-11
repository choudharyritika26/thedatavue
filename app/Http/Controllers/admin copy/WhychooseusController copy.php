<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whychooseus;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class WhychooseusController extends Controller
{
    public function create(){
        return view ('admin.whychooseus.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
           // 'sort_col' => 'required',
            'description' => 'required',
           'image' => 'required|image',
            // 'cropDataX' => 'required|numeric',
            // 'cropDataY' => 'required|numeric',
            // 'cropDataWidth' => 'required|numeric',
            // 'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $whychooseus = new Whychooseus;
        $whychooseus->sort_col = $request->input('sort_col'); 
        $whychooseus->heading = $request->input('heading');
        $whychooseus->description = $request->input('description');
        $whychooseus->is_active = 1;
        // $whychooseus->image = $request->input('image');
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
            $imageCrop->resize(509, 339, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $whychooseus->image = $filename;
        }
        $whychooseus->save();
      // dd($whychooseus);
      //return redirect()->route('whychooseus-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Why Choose Us Add Successfully',
            'redirect_url' => route('whychooseus-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $whychooseus = Whychooseus::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.whychooseus.index',compact('whychooseus'));
        }  


        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Whychooseus::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $whychooseus = Whychooseus::find($id);
        return view('admin.whychooseus.edit', compact('whychooseus'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([    
            'heading' => 'required',
            //'sort_col' => 'required',
            'description' => 'required',
           'image' => 'nullable|image',
           
               
        ]);
        
        $whychooseus = Whychooseus::find($id);
        $whychooseus->sort_col = $request->input('sort_col'); 
        $whychooseus->heading = $request->input('heading');
        $whychooseus->description = $request->input('description');
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
            $imageCrop->resize(509, 339, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $whychooseus->image = $filename;  

        }

        $whychooseus->update();
        //return redirect()->route('whychooseus-index');
        return response()->json([
            'message' => 'Why Choose Us Edit Successfully',
            'redirect_url' => route('whychooseus-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $whychooseus = Whychooseus::find($id);
        // $whychooseus->delete();
        // return redirect()->back()->with('status','whychooseus$whychooseus Deleted Successfully');
        $whychooseus->is_active = 0; // Set is_active to 0, but don't delete the document
        $whychooseus->save(); // Save the changes
        return redirect()->back()->with('status', 'wh$whychooseus ' . $whychooseus->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
