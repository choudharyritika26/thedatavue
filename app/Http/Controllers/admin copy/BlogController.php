<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    public function create(){
        return view ('admin.blog.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'sort_col' => 'required',
            'title' => 'required',
            'date' => 'required',
            'name' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $blog = new Blog;
        $blog->sort_col = $request->input('sort_col'); 
        $blog->title = $request->input('title');
        $blog->date = $request->input('date');
        $blog->name = $request->input('name'); 
        $blog->heading = $request->input('heading'); 
        $blog->description = $request->input('description');
        $blog->is_active = 1;

        // $blog->image = $request->input('image');
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
            $imageCrop->resize(377, 302, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $blog->image = $filename;
        }
        $blog->save();
      // dd($blog);
      //return redirect()->route('blog-index');
      return response()->json([
        'message' => 'Blog Add Successfully',
        'redirect_url' => route('blog-index'),
    ]);
        // return redirect()->route('');
         }


    //==============index page===================    
        public function index(){
            $blog = Blog::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.blog.index',compact('blog'));
        } 

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Blog::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}
        

        //========================update=====================    
    public function edit($id){
        
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            'sort_col' => 'required',  
           'title' => 'required',
            'date' => 'required',
            'name' => 'required',
            'heading' => 'required',
            'description' => 'required',
           'image' => 'nullable|image',
           
               
        ]);
        
        $blog = Blog::find($id);   
        $blog->sort_col = $request->input('sort_col');  
        $blog->title = $request->input('title');
        $blog->date = $request->input('date');
        $blog->name = $request->input('name');
        $blog->heading = $request->input('heading');
        $blog->description = $request->input('description');
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
            $imageCrop->resize(500,400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $blog->image = $filename;  

        }
    

        $blog->update();
       //  return redirect()->route('blog-index');
        return response()->json([
            'message' => 'Blog Edit Successfully',
            'redirect_url' => route('blog-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->is_active = 0; // Set is_active to 0, but don't delete the document
        $blog->save(); // Save the changes
        return redirect()->back()->with('status', 'Blog ' . $blog->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
