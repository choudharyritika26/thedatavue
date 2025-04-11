<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Portfolio; 

class TechnologyController extends Controller
{
    public function create(){
        $portfolio = Portfolio::where('is_active',1)->get();
        return view ('admin.technology.form',compact('portfolio'));   
       }

       public function store(Request $request){
        //dd($request->all());  
        //dd($imageName);

        $validatedData = $request->validate([
            'description' => 'required',
            'sort_col' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $technology = new Technology;
        $technology->sort_col = $request->input('sort_col');
        $technology->portfolio = $request->input('portfolio');
        $technology->description = $request->input('description');
        $technology->is_active = 1;
       
        $technology->save();
      // dd($technology);
      //return redirect()->route('technology-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Technology Add Successfully',
            'redirect_url' => route('technology-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $technology = Technology::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            //dd($technology);
            return view('admin.technology.index',compact('technology'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Technology::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $portfolio = Portfolio::where('is_active',1)->get();
        $technology = Technology::find($id);
        return view('admin.technology.edit', compact('technology','portfolio'));
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'description' => 'required',
            'sort_col' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
       // dd('dd');
        $technology = Technology::find($id);
        $technology->sort_col = $request->input('sort_col');
        $technology->portfolio = $request->input('portfolio');
        $technology->description = $request->input('description');
    
        $technology->update();
       // return redirect()->route('technology-index');
       return response()->json([
        'message' => 'Technology Edit Successfully',
        'redirect_url' => route('technology-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $technology = Technology::find($id);
        // $technology->delete();
        // return redirect()->back()->with('status','technology$technology Deleted Successfully');
        $technology->is_active = 0; // Set is_active to 0, but don't delete the document
        $technology->save(); // Save the changes
        return redirect()->back()->with('status', 'port$technology ' . $technology->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
