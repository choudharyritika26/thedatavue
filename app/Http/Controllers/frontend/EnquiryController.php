<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request){
       // dd('kkk');
        $validatedData = $request->validate([
            'name' => 'required',
            //'email' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'phone' => 'required|digits:10',
            'enquiry' => 'required',
           // 'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
            // 'image'=> 'required|image',
           // 'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Max size 2MB
        //    'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);
        
        $enquiry = new Enquiry;   
        $enquiry->name = $request->input('name');
        $enquiry->email = $request->input('email');
        $enquiry->phone = $request->input('phone');
        $enquiry->enquiry = $request->input('enquiry');
        //$enquiry->image = $request->input('image');
        $enquiry->is_active = 1;
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();   
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $enquiry->file = $filename;
        }
        $enquiry->save();
      // dd($enquiry);
      //return back()->with('success', 'Your message has been sent successfully!');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Your message has been sent successfully!',
            'redirect_url' => url()->previous(), // Redirect back to the previous URL
        ]);
         }


    //==============index page===================
        public function index(){
            $enquiry = Enquiry::where('is_active',1)->get();
            return view('admin.enquiry.index', compact('enquiry'));
        } 

         //=================delete=================
        public function destroy($id)
    {
        $enquiry = Enquiry::find($id);
        // $contactusdetales->delete();
        // return redirect()->back()->with('status','contactusdetales$contactusdetales Deleted Successfully');
      
        $enquiry->is_active = 0; // Set is_active to 0, but don't delete the document
        $enquiry->save(); // Save the changes
        return redirect()->back()->with('status', 'enquiry ' . $enquiry->name . ' Deactivated Successfully');
    }
}
