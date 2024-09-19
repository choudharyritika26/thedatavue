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
            'post' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $team = new Team;
        $team->heading = $request->input('heading');
        $team->post = $request->input('post');
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
      return redirect()->route('team-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $team = Team::all();
            return view('admin.team.index',compact('team'));
        }  

        //========================update=====================
    public function edit($id){
        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
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
        return redirect()->route('team-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->back()->with('status','team$team Deleted Successfully');
    }
//=================End-delete=================

}
