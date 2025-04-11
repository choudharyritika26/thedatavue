<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainingform;

class TrainingformController extends Controller
{
    public function store(Request $request){
        // dd('kkk');
         $validatedData = $request->validate([
             'name' => 'required',
             'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
             'phone' => 'required|digits:10',
            //  'duration' => 'required',
             'qualification' => 'required',

            // 'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
             // 'image'=> 'required|image',
            // 'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Max size 2MB
         //    'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
         ]);
         
         $trainingform = new Trainingform;   
         $trainingform->name = $request->input('name');
         $trainingform->email = $request->input('email');
         $trainingform->phone = $request->input('phone');
         $trainingform->duration = $request->input('duration');
         $trainingform->qualification = $request->input('qualification');
         //$Trainingform->image = $request->input('image');
         $trainingform->is_active = 1;
         if($request->hasfile('file'))
         {
             $file = $request->file('file');
             $extenstion = $file->getClientOriginalExtension();   
             $filename = time().'.'.$extenstion;
             $file->move('storage/', $filename);
             $trainingform->file = $filename;
         }
         $trainingform->save();
       // dd($trainingform);
       //return back()->with('success', 'Your message has been sent successfully!');
         // return redirect()->route('');
         return response()->json([
             'message' => 'Your message has been sent successfully!',
             'redirect_url' => url()->previous(), // Redirect back to the previous URL
         ]);
          }
 
 
     //==============index page===================
         public function index(){
             $trainingform = Trainingform::where('is_active',1)->get();
             return view('admin.trainingform.index', compact('trainingform'));
         } 
 
          //=================delete=================
         public function destroy($id)
     {
         $trainingform = Trainingform::find($id);
         // $contactusdetales->delete();
         // return redirect()->back()->with('status','contactusdetales$contactusdetales Deleted Successfully');
       
         $trainingform->is_active = 0; // Set is_active to 0, but don't delete the document
         $trainingform->save(); // Save the changes
         return redirect()->back()->with('status', 'trainingform ' . $trainingform->name . ' Deactivated Successfully');
     }
}
