<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller

{
    public function create(){
        return view ('admin.faq.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'question' => 'required',
            'answer' => 'required', 
           
        ]);
        
        $faq = new Faq;
        $maxSortCol = Faq::max('sort_col');
       
        // Set the sort_col for the new record
        $faq->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->is_active = 1;
        // $faq->image = $request->input('image');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $faq->image = $filename;
        // }
        $faq->save();
      // dd($faq);
      //return redirect()->route('faq-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Faq Add Successfully',
            'redirect_url' => route('faq-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $faq = Faq::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.faq.index',compact('faq'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Faq::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $faq = Faq::find($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'sort_col' => 'required',
            'question' => 'required',
            'answer' => 'required', 
           
        ]);
        
        $faq = Faq::find($id);
        if ($request->has('sort_col')) {
            $faq->sort_col = $request->input('sort_col');
        } 
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $faq->image = $filename;
        // }

        $faq->update();
       // return redirect()->route('faq-index');
       return response()->json([
        'message' => 'Faq Edit Successfully',
        'redirect_url' => route('faq-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $faq = Faq::find($id);
        // $faq->delete();
        // return redirect()->back()->with('status','faq$faq Deleted Successfully');
        $faq->is_active = 0; // Set is_active to 0, but don't delete the document
        $faq->save(); // Save the changes
        return redirect()->back()->with('status', '$faq ' . $faq->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
