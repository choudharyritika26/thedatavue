<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Qualification;

class QualificationController extends Controller
{
    public function create(){
        return view ('admin.qualification.form');
       }

       public function store(Request $request){   

        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $qualification = new Qualification;
        $maxSortCol = Qualification::max('sort_col');
       
        // Set the sort_col for the new record
        $qualification->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $qualification->name = $request->input('name');
        $qualification->is_active = 1;
        $qualification->save();
        return response()->json([
            'message' => 'Qualification Add Successfully',
            'redirect_url' => route('qualification-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $qualification = Qualification::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.qualification.index',compact('qualification'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
     Qualification::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $qualification = Qualification::find($id);
        return view('admin.qualification.edit', compact('qualification'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $qualification = Qualification::find($id);
        if ($request->has('sort_col')) {
            $qualification->sort_col = $request->input('sort_col');
        } 
        $qualification->name = $request->input('name');
        $qualification->update();
       return response()->json([
        'message' => 'Qualification Edit Successfully',
        'redirect_url' => route('qualification-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $qualification = Qualification::find($id);   
        $qualification->is_active = 0; // Set is_active to 0, but don't delete the document
        $qualification->save(); // Save the changes
        return redirect()->back()->with('status', 'cl$qualification ' . $qualification->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}