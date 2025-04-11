<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function create(){
        return view ('admin.achievement.form');
       }

       public function store(Request $request){
        $validatedData = $request->validate([
            // 'sort_col' => 'required',    
            'heading' => 'required',
            'description' => 'required',
           
        ]);
        
        $achievement = new Achievement;
        $maxSortCol = Achivements::max('sort_col');
       
        // Set the sort_col for the new record
        $achivements->sort_col = $maxSortCol ? $maxSortCol + 1 : 1; // If no records exist, start from 1
        $achievement->heading = $request->input('heading');    
        $achievement->description = $request->input('description');
        $achievement->is_active = 1;
        $achievement->save();
      // dd($achievement);
      //return redirect()->route('achievement-index');
      return response()->json([
        'message' => 'Achievement Add Successfully',
        'redirect_url' => route('achievement-index'),
    ]);
        // return redirect()->route('');
         }


//==============index page===================    
        public function index(){
            $achievement = Achievement::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.achievement.index',compact('achievement'));
        } 

//         public function updateOrder(Request $request)
// {
//     $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

//     foreach ($ids as $index => $id) {
//         // Update the sort_col field for each slider based on the new index
//         Slider::where('id', $id)->update(['sort_col' => $index + 1]);
//     }

//     return response()->json(['success' => 'Order updated successfully.']);
// }

//========================update=====================    
    public function edit($id){
        
        $achievement = Achievement::find($id);
        return view('admin.achievement.edit', compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([  
            // 'sort_col' => 'required',  
            'heading' => 'required',
            'description' => 'required',               
        ]);
        
        $achievement = Achievement::find($id);    
        $achievement->sort_col = $request->input('sort_col');
        $achievement->heading = $request->input('heading');
        $achievement->description = $request->input('description');
        $achievement->update();
       //  return redirect()->route('achievement-index');
        return response()->json([
            'message' => 'Achievement Edit Successfully',
            'redirect_url' => route('achievement-index'),
        ]);
    }
        
        
//=================delete=================
    public function destroy($id)
    {
        $achievement = Achievement::find($id);
        $achievement->is_active = 0; // Set is_active to 0, but don't delete the document
        $achievement->save(); // Save the changes
        return redirect()->back()->with('status', 'Achievement ' . $achievement->name . ' Deactivated Successfully');
    }
//=================End-delete=================
}
