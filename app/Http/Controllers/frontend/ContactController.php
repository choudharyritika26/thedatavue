<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    
    public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->is_active = 1;
        $contact->save();
      // dd($contact);
    //   return back()->with('success', 'Your message has been sent successfully!');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Your message has been sent successfully!',
            'redirect_url' => url()->previous(), // Redirect back to the previous URL
        ]);
         }


    //==============index page===================
        public function index(){
            $contact = Contact::where('is_active',1)->get();
            return view('admin.contact.index', compact('contact'));
        } 

         //=================delete=================
        public function destroy($id)
    {
        $contact = Contact::find($id);
        // $contactusdetales->delete();
        // return redirect()->back()->with('status','contactusdetales$contactusdetales Deleted Successfully');
      
        $contact->is_active = 0; // Set is_active to 0, but don't delete the document
        $contact->save(); // Save the changes
        return redirect()->back()->with('status', 'contact ' . $contact->name . ' Deactivated Successfully');
    }
}
