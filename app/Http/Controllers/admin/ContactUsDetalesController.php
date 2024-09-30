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
            'address' => 'required',
            'email_id' => 'required',
            'phone_no'=> 'required',
           
        ]);
        
        $contactus = new contactusdetales ;
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
        $contactus->save();
      // dd($contactus);
       return redirect()->route('contactus-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $contactus = contactusdetales ::all();
            return view('admin.contactus.index',compact('contactus'));
        }  

        //========================update=====================
    public function edit($id){
        $contactus = contactusdetales ::find($id);
        return view('admin.contactus.edit', compact('contactus'));
    }

    public function update(Request $request, $id)
    {
        $contactus = contactusdetales ::find($id);
        $contactus->address = $request->input('address');
        $contactus->email_id = $request->input('email_id');
        $contactus->phone_no = $request->input('phone_no');
        $contactus->update();
        return redirect()->route('contactus-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $contactus = ContactUsDetales::find($id);
        $contactus->delete();
        return redirect()->back()->with('status','contactus$contactus Deleted Successfully');
    }
//=================End-delete=================

}
