<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutdetail;

class AboutdetailController extends Controller
{
    public function create(){
        return view ('admin.aboutdetail.form');
       }

       public function store(Request $request){
        $validatedData = $request->validate([
            'sort_col' => 'required',    
            'heading' => 'required',
            'description' => 'required',
           
        ]);
        
        $aboutdetail = new Aboutdetail;
        $aboutdetail->sort_col = $request->input('sort_col');
        $aboutdetail->heading = $request->input('heading');    
        $aboutdetail->description = $request->input('description');
        $aboutdetail->is_active = 1;
        $aboutdetail->save();
      // dd($aboutdetail);
      //return redirect()->route('aboutdetail-index');
      return response()->json([
        'message' => 'About Detail Add Successfully',
        'redirect_url' => route('aboutdetail-index'),
    ]);
        // return redirect()->route('');
         }


//==============index page===================    
        public function index(){
            $aboutdetail = Aboutdetail::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.aboutdetail.index',compact('aboutdetail'));
        } 

//         public function updateOrder(Request $request)
// {
//     $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

//     foreach ($ids as $index => $id) {
//         // Update the sort_col field for each slider based on the new index
//         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
//     }

//     return response()->json(['success' => 'Order updated successfully.']);
// }

//========================update=====================    
    public function edit($id){
        
        $aboutdetail = Aboutdetail::find($id);
        return view('admin.aboutdetail.edit', compact('aboutdetail'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            'sort_col' => 'required',  
            'heading' => 'required',
            'description' => 'required',               
        ]);
        
        $aboutdetail = Aboutdetail::find($id);    
        $aboutdetail->sort_col = $request->input('sort_col');
        $aboutdetail->heading = $request->input('heading');
        $aboutdetail->description = $request->input('description');
        $aboutdetail->update();
       //  return redirect()->route('aboutdetail-index');
        return response()->json([
            'message' => 'About Detail Edit Successfully',
            'redirect_url' => route('aboutdetail-index'),
        ]);
    }
        
        
//=================delete=================
    public function destroy($id)
    {
        $aboutdetail = Aboutdetail::find($id);
        $aboutdetail->is_active = 0; // Set is_active to 0, but don't delete the document
        $aboutdetail->save(); // Save the changes
        return redirect()->back()->with('status', 'About Detail ' . $aboutdetail->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
