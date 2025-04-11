<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whychooseustypes;

class WhychooseustypesController extends Controller
{
    public function create(){
        return view ('admin.whychooseustypes.form');
       }

       public function store(Request $request){

        $validatedData = $request->validate([
            'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $whychooseustypes = new Whychooseustypes;   
        $whychooseustypes->sort_col = $request->input('sort_col');
        $whychooseustypes->heading = $request->input('heading');
        $whychooseustypes->description = $request->input('description');
        $whychooseustypes->is_active = 1;
        // // $whychooseustypes->image = $request->input('image');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $whychooseustypes->image = $filename;
        // }
         $whychooseustypes->save();
      // dd($whychooseustypes);
      //return redirect()->route('whychooseustypes-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Why Choose Us Types Add Successfully',
            'redirect_url' => route('whychooseustypes-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $whychooseustypes = Whychooseustypes::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.whychooseustypes.index',compact('whychooseustypes'));
        }  


        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Whychooseustypes::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}
        //========================update=====================
    public function edit($id){
        $whychooseustypes = Whychooseustypes::find($id);
        return view('admin.whychooseustypes.edit', compact('whychooseustypes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        $validatedData = $request->validate([
            'sort_col' => 'required',
            'heading' => 'required',
            'description' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);

        $whychooseustypes = Whychooseustypes::find($id);
        $whychooseustypes->sort_col = $request->input('sort_col');
        $whychooseustypes->heading = $request->input('heading');
        $whychooseustypes->description = $request->input('description');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $whychooseustypes->image = $filename;
        // }

        $whychooseustypes->update();
        //return redirect()->route('whychooseustypes-index');
        return response()->json([
            'message' => 'Why Choose Us Types Edit Successfully',
            'redirect_url' => route('whychooseustypes-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $whychooseustypes = Whychooseustypes::find($id);
        // $whychooseustypes->delete();
        // return redirect()->back()->with('status','whychooseustypes$whychooseustypes Deleted Successfully');
        $whychooseustypes->is_active = 0; // Set is_active to 0, but don't delete the document
        $whychooseustypes->save(); // Save the changes
        return redirect()->back()->with('status', 'wh$whychooseustypes ' . $whychooseustypes->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
