<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUsDetales;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ContactUsDetalesController extends Controller
{
    public function create(){
        return view ('admin.contactus.form');
       }

       public function store(Request $request){

        //dd($request->all());
       

        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'address' => 'required',
            'email_id' => 'required',
            'phone_no' => 'required|numeric|digits:10', // Ensures phone number is exactly 10 digits long and numeric
            'image' => 'required|image',
        ]);
        
        $contactus = new Contactusdetales ;
        $contactus->sort_col = $request->input('sort_col');
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
        $contactus->is_active = 1;
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

            $contactus->image = $filename;
        }
        $contactus->save();
      // dd($contactus);
       //return redirect()->route('contactus-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Contact Us Add Successfully',
            'redirect_url' => route('contactus-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $contactus = Contactusdetales ::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.contactus.index',compact('contactus'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Contactusdetales::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

    //     //========================update=====================
    // public function edit($id){
    //     $contactus = Contactusdetales ::find($id);
    //     return view('admin.contactus.edit', compact('contactus'));
    // }
    public function edit($id){
        $contactus = Contactusdetales::find($id);
        //dd($contactus); // Check if the data is being retrieved correctly
        return view('admin.contactus.edit', compact('contactus'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            //'sort_col' => 'required',
            'address' => 'required',
            'email_id' => 'required',
            'phone_no' => 'required|numeric|digits:10', // Ensures phone number is exactly 10 digits long and numeric
           'image' => 'nullable|',
        ]);
        
        $contactus = Contactusdetales ::find($id);
        $contactus->sort_col = $request->input('sort_col');
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
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
            if ($contactus->image && file_exists(public_path('storage/' . $contactus->image))) {
                unlink(public_path('storage/' . $contactus->image));
            }

            $contactus->image = $filename;
        }
        $contactus->update();
       // return redirect()->route('contactus-index');
       return response()->json([
        'message' => 'Contact Us Edit Successfully',
        'redirect_url' => route('contactus-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $contactus = ContactUsDetales::find($id);
        // $contactus->delete();
        // return redirect()->back()->with('status','contactus$contactus Deleted Successfully');
        $contactus->is_active = 0; // Set is_active to 0, but don't delete the document
        $contactus->save(); // Save the changes
        return redirect()->back()->with('status', 'co$contactus ' . $contactus->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
