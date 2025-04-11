<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicesdetails;
use App\Models\Servicescatagries; 
use App\Models\Services; 

class ServicesdetailsController extends Controller
{
    public function create(){
        $servicescatagries  = Services::where('is_active',1)->get();   
        return view ('admin.servicesdetails.form',compact('servicescatagries'));   
       }

       public function store(Request $request){
        $validatedData = $request->validate([
            'service' => 'required',    
            'heading' => 'required',
            'description' => 'required',
            'sort_col' => 'required',
           
        ]);
        
        $servicesdetails = new Servicesdetails;
        $servicesdetails->sort_col = $request->input('sort_col');
        $servicesdetails->service  = $request->input('service');
        $servicesdetails->heading = $request->input('heading');
        $servicesdetails->description = $request->input('description');
        $servicesdetails->is_active = 1;

        $servicesdetails->save();
      // dd($servicesdetails);
      //return redirect()->route('servicesdetails-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Services Details Add Successfully',
            'redirect_url' => route('servicesdetails-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $servicesdetails = Servicesdetails::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            //dd($servicesdetails);
            return view('admin.servicesdetails.index',compact('servicesdetails'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Servicesdetails::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $servicescatagries  = Services::where('is_active',1)->get();   
        $servicesdetails = Servicesdetails::find($id);
        return view('admin.servicesdetails.edit', compact('servicesdetails','servicescatagries'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'service' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'sort_col' => 'required',
           
        ]);
       // dd('dd');
        $servicesdetails = Servicesdetails::find($id);
        $servicesdetails->sort_col = $request->input('sort_col');
        $servicesdetails->service  = $request->input('service');
        $servicesdetails->heading = $request->input('heading');
        $servicesdetails->description = $request->input('description');
        $servicesdetails->update();
       // return redirect()->route('servicesdetails-index');
       return response()->json([
        'message' => 'Services Details Edit Successfully',
        'redirect_url' => route('servicesdetails-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $servicesdetails = Servicesdetails::find($id);
        // $servicesdetails->delete();
        // return redirect()->back()->with('status','servicesdetails$servicesdetails Deleted Successfully');
        $servicesdetails->is_active = 0; // Set is_active to 0, but don't delete the document
        $servicesdetails->save(); // Save the changes
        return redirect()->back()->with('status', 'port$servicesdetails ' . $servicesdetails->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
