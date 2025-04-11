<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfoliodetales;
use App\Models\Portfolio; 

class PortfoliodetalesController extends Controller   
{
    public function create(){
        $portfolio = Portfolio::where('is_active',1)->get();
        return view ('admin.portfoliodetales.form',compact('portfolio'));   
       }

       public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'platform' => 'required|array', // Validate that platform is an array
        'platform.*' => 'string', // Validate each platform value
        'startdate' => 'required|date',
        'enddate' => 'required|date',
        'description' => 'required',
    ]);
    
    $portfoliodetales = new Portfoliodetales;
    $Portfoliodetales->sort_col = $request->input('sort_col');
    $portfoliodetales->portfolio = $request->input('portfolio');
    $portfoliodetales->title = $request->input('title');
    $portfoliodetales->platform = implode(',', $request->input('platform')); // Save as a comma-separated string
    $portfoliodetales->startdate = $request->input('startdate');
    $portfoliodetales->enddate = $request->input('enddate');
    $portfoliodetales->description = $request->input('description');
    $portfoliodetales->is_active = 1;

    // Handle image upload
    if ($request->hasfile('image')) {
        $files = $request->file('image');
        $filenames = [];
        
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 9999) . '.' . $extension;
            $file->move('storage/', $filename);
            $filenames[] = $filename;
        }
        
        $portfoliodetales->image = implode(',', $filenames);  // Save filenames as a comma-separated string
    }

    $portfoliodetales->save();

    return response()->json([
        'message' => 'Portfolio Details Add successfully',
        'redirect_url' => route('portfoliodetales-index'),
    ]);
}

       public function storeold(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'platform' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'description' => 'required',
            'sort_col' => 'required',
            //'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $portfoliodetales = new Portfoliodetales;
        $portfoliodetales->sort_col = $request->input('sort_col');
        $portfoliodetales->portfolio = $request->input('portfolio');
        $portfoliodetales->title = $request->input('title');
        $portfoliodetales->platform = $request->input('platform');
        $portfoliodetales->startdate = $request->input('startdate');
        $portfoliodetales->enddate = $request->input('enddate');
        $portfoliodetales->description = $request->input('description');
        $portfoliodetales->is_active = 1;
        // $portfoliodetales->image = $request->input('image');
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image');
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extenstion;
        //     $file->move('storage/', $filename);
        //     $portfoliodetales->image = $filename;
        // }

        if($request->hasfile('images')) {
            $files = $request->file('images');
            $filenames = [];
        
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();   
                $filename = time() . rand(1, 9999) . '.' . $extension;
                $file->move('storage/', $filename);
                $filenames[] = $filename;
            }
        
            $portfoliodetales->image = implode(',', $filenames);  // Save filenames as a comma-separated string
        }
        $portfoliodetales->save();
      // dd($portfoliodetales);
      //return redirect()->route('portfoliodetales-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Portfolio Details Edit Successfully',
            'redirect_url' => route('portfoliodetales-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $portfoliodetales = Portfoliodetales::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            //dd($portfoliodetales);
            return view('admin.portfoliodetales.index',compact('portfoliodetales'));
        }  


        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Portfoliodetales::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $portfolio = Portfolio::where('is_active',1)->get();
        $portfoliodetales = Portfoliodetales::find($id);
        return view('admin.portfoliodetales.edit', compact('portfoliodetales','portfolio'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'platform' => 'required|array', // Validate that platform is an array
        'platform.*' => 'string', // Validate each platform value
        'startdate' => 'required',
        'enddate' => 'required',
        'description' => 'required',
        'sort_col' => 'required',
    ]);

    $portfoliodetales = Portfoliodetales::find($id);

    // Update the other fields
    $portfoliodetales->sort_col = $request->input('sort_col');
    $portfoliodetales->title = $request->input('title');
    $portfoliodetales->startdate = $request->input('startdate');
    $portfoliodetales->enddate = $request->input('enddate');
    $portfoliodetales->description = $request->input('description');

    // Save platforms as a comma-separated string
    $platforms = $request->input('platform');
    $portfoliodetales->platform = implode(',', $platforms);

    // Handle file upload
    if ($request->hasFile('images')) {
        $files = $request->file('images');
        $filenames = [];

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 9999) . '.' . $extension;
            $file->move('storage/', $filename);
            $filenames[] = $filename;
        }

        $portfoliodetales->image = implode(',', $filenames); // Save filenames as a comma-separated string
    }

    $portfoliodetales->update();

    return response()->json([
        'message' => 'Portfolio details edited successfully',
        'redirect_url' => route('portfoliodetales-index'),
    ]);
}

        
        
        //=================delete=================
    public function destroy($id)
    {
        $portfoliodetales = Portfoliodetales::find($id);
        // $portfoliodetales->delete();
        // return redirect()->back()->with('status','portfoliodetales$portfoliodetales Deleted Successfully');
        $portfoliodetales->is_active = 0; // Set is_active to 0, but don't delete the document
        $portfoliodetales->save(); // Save the changes
        return redirect()->back()->with('status', 'port$portfoliodetales ' . $portfoliodetales->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
