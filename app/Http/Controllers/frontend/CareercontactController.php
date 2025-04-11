<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Careercontact;

class CareercontactController extends Controller
{
    public function store(Request $request){

        // dd($request->all());
        

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'phone' => 'required|digits:10',
            'job' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
            // 'image'=> 'required|image',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
        
        $careercontact = new Careercontact;
        $careercontact->name = $request->input('name');
        $careercontact->email = $request->input('email');
        $careercontact->phone = $request->input('phone');
        $careercontact->job = $request->input('job');
        //$careercontact->image = $request->input('image');
        $careercontact->is_active = 1;
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $careercontact->file = $filename;
        }
        $careercontact->save();
      // dd($careercontact);
      //return back()->with('success', 'Your message has been sent successfully!');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Your message has been sent successfully!',
            'redirect_url' => url()->previous(), // Redirect back to the previous URL
        ]);
         }


    //==============index page===================
        public function index(){
            $careercontact = Careercontact::where('is_active',1)->get();
            return view('admin.careercontact.index', compact('careercontact'));
        } 

         //=================delete=================
        public function destroy($id)
    {
        $careercontact = Careercontact::find($id);
        // $contactusdetales->delete();
        // return redirect()->back()->with('status','contactusdetales$contactusdetales Deleted Successfully');
      
        $careercontact->is_active = 0; // Set is_active to 0, but don't delete the document
        $careercontact->save(); // Save the changes
        return redirect()->back()->with('status', 'careercontact ' . $careercontact->name . ' Deactivated Successfully');
    }
}
