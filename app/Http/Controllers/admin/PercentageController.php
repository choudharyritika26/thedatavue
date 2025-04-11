<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Percentage;

class PercentageController extends Controller
{
    public function create(){
        return view ('admin.percentage.form');
       }

       public function store(Request $request){
        $validatedData = $request->validate([
            // 'sort_col' => 'required',    
            'language' => 'required',
            'percent' => 'required',
           
        ]);
        
        $percentage = new Percentage;
        $maxSortCol = Percentage::max('sort_col');
       
        // Set the sort_col for the new record
        $percentage->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $percentage->language = $request->input('language');    
        $percentage->percent = $request->input('percent');
        $percentage->is_active = 1;
        $percentage->save();
      // dd($percentage);
      //return redirect()->route('percentage-index');
      return response()->json([
        'message' => 'Percentage Add Successfully',
        'redirect_url' => route('percentage-index'),
    ]);
        // return redirect()->route('');
         }


//==============index page===================    
        public function index(){
            $percentage = Percentage::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.percentage.index',compact('percentage'));
        } 

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted Percentage IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each Percentage based on the new index
        Percentage::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

//========================update=====================    
    public function edit($id){
        
        $percentage = Percentage::find($id);
        return view('admin.percentage.edit', compact('percentage'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            // 'sort_col' => 'required',  
            'language' => 'required',
            'percent' => 'required',               
        ]);
        
        $percentage = Percentage::find($id);    
        if ($request->has('sort_col')) {
            $percentage->sort_col = $request->input('sort_col');
        } 
        $percentage->language = $request->input('language');
        $percentage->percent = $request->input('percent');
        $percentage->update();
       //  return redirect()->route('percentage-index');
        return response()->json([
            'message' => 'Percentage Edit Successfully',
            'redirect_url' => route('percentage-index'),
        ]);
    }
        
        
//=================delete=================
    public function destroy($id)
    {
        $percentage = Percentage::find($id);
        $percentage->is_active = 0; // Set is_active to 0, but don't delete the document
        $percentage->save(); // Save the changes
        return redirect()->back()->with('status', 'Percentage ' . $percentage->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
