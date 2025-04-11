<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicescatagries;

class ServicescatagriesController extends Controller
{
    public function create(){
        return view ('admin.servicescatagries.form');    
       }

       public function store(Request $request){
        //dd('jjj');

        $validatedData = $request->validate([    
            'category' => 'required',
            // 'sort_col' => 'required',
        ]);

        // $validatedData = $request->validate([    
        //     'category ' => 'required',
        // ]);
        
        $servicescatagries  = new Servicescatagries; 
        $maxSortCol = Servicescatagries::max('sort_col');
       
        // Set the sort_col for the new record
        $servicescatagries->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $servicescatagries->category  = $request->input('category');
        $servicescatagries ->is_active = 1;  
        $servicescatagries ->save();   
      // dd($servicescatagries );
      //return redirect()->route('servicescatagries -index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Services Category Add Successfully',
            'redirect_url' => route('servicescatagries-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $servicescatagries  = Servicescatagries::where('is_active',1)->orderBy('sort_col', 'asc')->get();
           //$servicescatagries  = Servicescatagries::all();
            return view('admin.servicescatagries.index',compact('servicescatagries'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Servicescatagries::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $servicescatagries  = Servicescatagries::find($id);
        return view('admin.servicescatagries.edit', compact('servicescatagries'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([    
            'category' => 'required',
            // 'sort_col' => 'required',
        ]);

        $servicescatagries  = Servicescatagries::find($id);
        
        // Update the heading and description
        $servicescatagries->sort_col = $request->input('sort_col');
        $servicescatagries->category = $request->input('category');
        
    
        // Save the changes to the database
        $servicescatagries->save(); // This will save the updated heading, description, and image
    
        return response()->json([
            'message' => 'Services Category Edit Successfully',
            'redirect_url' => route('servicescatagries-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $servicescatagries  = Servicescatagries::find($id);
        // $servicescatagries ->delete();
        // return redirect()->back()->with('status','servicescatagries $servicescatagries  Deleted Successfully');
        $servicescatagries ->is_active = 0; // Set is_active to 0, but don't delete the document
        $servicescatagries ->save(); // Save the changes
        return redirect()->back()->with('status', 'servicescatagries  ' . $servicescatagries ->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
