<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FeedbackController extends Controller
{
    public function create(){
        return view ('admin.feedback.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'sort_col' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $feedback = new Feedback;
        $feedback->sort_col = $request->input('sort_col');
        $feedback->name = $request->input('name'); 
        $feedback->profession = $request->input('profession'); 
        $feedback->description = $request->input('description');
        $feedback->is_active = 1;

        // $feedback->image = $request->input('image');
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
            $imageCrop->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $feedback->image = $filename;
        }
        $feedback->save();
      // dd($feedback);
      //return redirect()->route('feedback-index');
      return response()->json([
        'message' => 'Feedback Add Successfully',
        'redirect_url' => route('feedback-index'),
    ]);
        // return redirect()->route('');
         }


    //==============index page===================    
        public function index(){
            $feedback = Feedback::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.feedback.index',compact('feedback'));
        } 

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Feedback::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================    
    public function edit($id){
        
        $feedback = Feedback::find($id);
        return view('admin.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            'sort_col' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'description' => 'required',
           'image' => 'nullable|image',
           
               
        ]);
        
        $feedback = Feedback::find($id); 
        $feedback->sort_col = $request->input('sort_col');   
        $feedback->name = $request->input('name');
        $feedback->profession = $request->input('profession');
        $feedback->description = $request->input('description');
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
            $imageCrop->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $feedback->image = $filename;  

        }
    

        $feedback->update();
       //  return redirect()->route('feedback-index');
        return response()->json([
            'message' => 'Feedback Edit Successfully',
            'redirect_url' => route('feedback-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->is_active = 0; // Set is_active to 0, but don't delete the document
        $feedback->save(); // Save the changes
        return redirect()->back()->with('status', 'Feedback ' . $feedback->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
