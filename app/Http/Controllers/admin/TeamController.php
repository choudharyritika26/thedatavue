<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    public function create(){
        return view ('admin.team.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            // 'sort_col' => 'required',
            'post' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $team = new Team;
        $maxSortCol = Team::max('sort_col');
       
        // Set the sort_col for the new record
        $team->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $team->heading = $request->input('heading');
        $team->post = $request->input('post');
        $team->is_active = 1;
        // $team->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $team->image = $filename;
        }
        $team->save();
      // dd($team);
      //return redirect()->route('team-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Team Add Successfully',
            'redirect_url' => route('team-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $team = Team::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.team.index',compact('team'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Team::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            // 'sort_col' => 'required',
            'post' => 'required',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);

        $team = Team::find($id);
        $team->sort_col = $request->input('sort_col');
        $team->heading = $request->input('heading');
        $team->post = $request->input('post');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $team->image = $filename;
        }

        $team->update();
        //return redirect()->route('team-index');
        return response()->json([
            'message' => 'Team Add Successfully',
            'redirect_url' => route('team-index'),
        ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $team = Team::find($id);
       // $team->delete();
        // return redirect()->back()->with('status','team$team Deleted Successfully');
        $team->is_active = 0; // Set is_active to 0, but don't delete the document
        $team->save(); // Save the changes
        return redirect()->back()->with('status', 'team ' . $team->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
