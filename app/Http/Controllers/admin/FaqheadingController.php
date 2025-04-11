<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqheading;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FaqheadingController extends Controller
{
    public function create(){
        return view ('admin.faqheading.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $faqheading = new Faqheading;
        $faqheading->sort_col = $request->input('sort_col');
        $faqheading->heading = $request->input('heading');
        $faqheading->description = $request->input('description');
        $faqheading->is_active = 1;
        // $faqheading->image = $request->input('image');
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
            $imageCrop->resize(500, 650, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $faqheading->image = $filename;
        }
        $faqheading->save();
      // dd($faqheading);
      //return redirect()->route('faqheading-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Faq Heading Add Successfully',
            'redirect_url' => route('faqheading-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $faqheading = Faqheading::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.faqheading.index',compact('faqheading'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Faqheading::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $faqheading = Faqheading::find($id);
        return view('admin.faqheading.edit', compact('faqheading'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
           
        ]);
        $faqheading = Faqheading::find($id);
        $faqheading->sort_col = $request->input('sort_col');
        $faqheading->heading = $request->input('heading');
        $faqheading->description = $request->input('description');
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
            $imageCrop->resize(500, 650, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $faqheading->image = $filename;  

        }
        $faqheading->update();
        //return redirect()->route('faqheading-index');
        return response()->json([
            'message' => 'Faq Heading Edit Successfully',
            'redirect_url' => route('faqheading-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $faqheading = Faqheading::find($id);
        // $faqheading->delete();
        // return redirect()->back()->with('status','faqheading$faqheading Deleted Successfully');
        $faqheading->is_active = 0; // Set is_active to 0, but don't delete the document
        $faqheading->save(); // Save the changes
        return redirect()->back()->with('status', 'fa$faqheading ' . $faqheading->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
