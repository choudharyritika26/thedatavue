<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUsDetales;

class ContactUsDetalesController extends Controller
{
    public function create(){
        return view ('admin.contactus.form');
       }

       public function store(Request $request){

        //dd($request->all());
       

        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'address' => 'required',
            'email_id' => 'required',
            'phone_no' => 'required|numeric|digits:10', // Ensures phone number is exactly 10 digits long and numeric
           
        ]);
        
        $contactus = new Contactusdetales ;
        $contactus->sort_col = $request->input('sort_col');
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
        $contactus->is_active = 1;
        $contactus->save();
      // dd($contactus);
       //return redirect()->route('contactus-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Contact Us Add Successfully',
            'redirect_url' => route('contactus-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $contactus = Contactusdetales ::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.contactus.index',compact('contactus'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Contactusdetales::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

    //     //========================update=====================
    // public function edit($id){
    //     $contactus = Contactusdetales ::find($id);
    //     return view('admin.contactus.edit', compact('contactus'));
    // }
    public function edit($id){
        $contactus = Contactusdetales::find($id);
        //dd($contactus); // Check if the data is being retrieved correctly
        return view('admin.contactus.edit', compact('contactus'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            //'sort_col' => 'required',
            'address' => 'required',
            'email_id' => 'required',
            'phone_no' => 'required|numeric|digits:10', // Ensures phone number is exactly 10 digits long and numeric
           
        ]);
        
        $contactus = Contactusdetales ::find($id);
        $contactus->sort_col = $request->input('sort_col');
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
        $contactus->update();
       // return redirect()->route('contactus-index');
       return response()->json([
        'message' => 'Contact Us Edit Successfully',
        'redirect_url' => route('contactus-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $contactus = ContactUsDetales::find($id);
        // $contactus->delete();
        // return redirect()->back()->with('status','contactus$contactus Deleted Successfully');
        $contactus->is_active = 0; // Set is_active to 0, but don't delete the document
        $contactus->save(); // Save the changes
        return redirect()->back()->with('status', 'co$contactus ' . $contactus->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
