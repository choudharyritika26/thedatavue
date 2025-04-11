<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function create(){
        return view ('admin.career.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'heading' => 'required',
            'exp' => 'required',
            'description' => 'required',
            // 'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $career = new Career;
        $maxSortCol = Career::max('sort_col');
       
        // Set the sort_col for the new record
        $career->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $career->heading = $request->input('heading');
        $career->exp = $request->input('exp');
        $career->description = $request->input('description');
        $career->is_active = 1;
        // $career->image = $request->input('image');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $career->image = $filename;
        // }
        $career->save();
      // dd($career);
     // return redirect()->route('career-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Career Add Successfully',
            'redirect_url' => route('career-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $career = Career::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.career.index',compact('career'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Career::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $career = Career::find($id);
        return view('admin.career.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'heading' => 'required',
            'exp' => 'required',
            'description' => 'required',
            // 'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $career = Career::find($id);
        if ($request->has('sort_col')) {
            $career->sort_col = $request->input('sort_col');
        } 
        $career->heading = $request->input('heading');
        $career->exp = $request->input('exp');
        $career->description = $request->input('description');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $career->image = $filename;
        // }

        $career->update();
       // return redirect()->route('career-index');
       return response()->json([
        'message' => 'Career Edit Successfully',
        'redirect_url' => route('career-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $career = Career::find($id);
        // $career->delete();
        // return redirect()->back()->with('status','career$career Deleted Successfully');
        $career->is_active = 0; // Set is_active to 0, but don't delete the document
        $career->save(); // Save the changes
        return redirect()->back()->with('status', 'cl$career ' . $career->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
