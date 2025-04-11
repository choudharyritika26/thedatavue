<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    public function create(){
        return view ('admin.catagory.form');    
       }

       public function store(Request $request){

        $validatedData = $request->validate([ 
            'sort_col' => 'required',   
            'catagory' => 'required',
        ]);
        
        $catagory  = new Catagory;  
        $catagory->sort_col = $request->input('sort_col'); 
        $catagory ->catagory  = $request->input('catagory');
        $catagory ->is_active = 1;
        $catagory ->save();   
      // dd($catagory );
      //return redirect()->route('catagory -index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Catagory Add Successfully',
            'redirect_url' => route('catagory -index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $catagory  = Catagory::where('is_active',1)->orderBy('sort_col', 'asc')->get();
           //$catagory  = Catagory::all();
            return view('admin.catagory.index',compact('catagory'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Catagory::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $catagory  = Catagory::find($id);
        return view('admin.catagory.edit', compact('catagory'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([ 
            'sort_col' => 'required',   
            'catagory' => 'required',
        ]);
        
        $catagory  = Catagory::find($id);
        
        // Update the heading and description
        $catagory->sort_col = $request->input('sort_col');
        $catagory ->catagory = $request->input('catagory');
        
    
        // Save the changes to the database
        $catagory ->save(); // This will save the updated heading, description, and image
    
        return response()->json([
            'message' => 'Catagory Edit Successfully',
            'redirect_url' => route('catagory-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $catagory  = Catagory::find($id);
        // $catagory ->delete();
        // return redirect()->back()->with('status','catagory $catagory  Deleted Successfully');
        $catagory ->is_active = 0; // Set is_active to 0, but don't delete the document
        $catagory ->save(); // Save the changes
        return redirect()->back()->with('status', 'catagory  ' . $catagory ->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
