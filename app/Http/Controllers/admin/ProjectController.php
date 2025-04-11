<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(){
        return view ('admin.project.form');
       }

       public function store(Request $request){
        $validatedData = $request->validate([
            // 'sort_col' => 'required',    
            'project' => 'required',
            'count' => 'required',
           
        ]);
        
        $project = new Project;
        $maxSortCol = Project::max('sort_col');
       
        // Set the sort_col for the new record
        $project->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $project->project = $request->input('project');    
        $project->count = $request->input('count');
        $project->is_active = 1;
        $project->save();
      // dd($Project);
      //return redirect()->route('Project-index');
      return response()->json([
        'message' => 'Project Add Successfully',
        'redirect_url' => route('project-index'),
    ]);
        // return redirect()->route('');
         }


//==============index page===================    
        public function index(){
            $project = Project::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.project.index',compact('project'));
        } 

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted Project IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each Project based on the new index
        Project::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

//========================update=====================    
    public function edit($id){
        
        $project = Project::find($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            // 'sort_col' => 'required',  
            'project' => 'required',
            'count' => 'required',               
        ]);
        
        $project = Project::find($id);    
        if ($request->has('sort_col')) {
            $project->sort_col = $request->input('sort_col');
        } 
        $project->project = $request->input('project');
        $project->count = $request->input('count');
        $project->update();
       //  return redirect()->route('project-index');
        return response()->json([
            'message' => 'Project Edit Successfully',
            'redirect_url' => route('project-index'),
        ]);
    }
        
        
//=================delete=================
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->is_active = 0; // Set is_active to 0, but don't delete the document
        $project->save(); // Save the changes
        return redirect()->back()->with('status', 'Project ' . $project->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
