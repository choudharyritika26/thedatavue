<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterCopyRight;

class FooterCopyRightController extends Controller
{
    public function create(){
        return view ('admin.footercopyright.form');
       }

       public function store(Request $request){

        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        
        $footercopyright = new FooterCopyRight;
        $footercopyright->description = $request->input('description');
        $footercopyright->is_active = 1;
        $footercopyright->save();

        return response()->json([
            'message' => 'FooterCopyRight Add Successfully',
            'redirect_url' => route('footer-copy-right-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $footercopyright = FooterCopyRight::where('is_active',1)->get();
            return view('admin.footercopyright.index',compact('footercopyright'));
        }  

        //========================update=====================
    public function edit($id){
        $footercopyright = FooterCopyRight::find($id);
        return view('admin.footercopyright.edit', compact('footercopyright'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        
        $footercopyright = FooterCopyRight::find($id);
      
        $footercopyright->description = $request->input('description');

        $footercopyright->update();
       return response()->json([
        'message' => 'FooterCopyRight Edit Successfully',
        'redirect_url' => route('footer-copy-right-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $footercopyright = FooterCopyRight::find($id);   
        $footercopyright->is_active = 0; // Set is_active to 0, but don't delete the document
        $footercopyright->save(); // Save the changes
        return redirect()->back()->with('status', ' Deactivated Successfully');
    }
//=================End-delete================= 
}