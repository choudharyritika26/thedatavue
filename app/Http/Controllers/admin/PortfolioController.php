<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function create(){
        return view ('admin.portfolio.form');
       }

       public function store(Request $request){

        //dd($request->all());
        
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $portfolio = new Portfolio;
        $portfolio->heading = $request->input('heading');
        $portfolio->description = $request->input('description');
        // $portfolio->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $portfolio->image = $filename;
        }
        $portfolio->save();
      // dd($portfolio);
      return redirect()->route('portfolio-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $portfolio = Portfolio::all();
            return view('admin.portfolio.index',compact('portfolio'));
        }  

        //========================update=====================
    public function edit($id){
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->heading = $request->input('heading');
        $portfolio->description = $request->input('description');
        //$portfolio->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $portfolio->image = $filename;
        }
    
        $portfolio->update();
        return redirect()->route('portfolio-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect()->back()->with('status','portfolio$portfolio Deleted Successfully');
    }
//=================End-delete=================
}
