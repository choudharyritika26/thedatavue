<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    public function create(){
        return view ('admin.client.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000',
           
        ]);
        
        $client = new Client;
        $client->heading = $request->input('heading');
        $client->description = $request->input('description');
        // $client->image = $request->input('image');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $client->image = $filename;
        }
        $client->save();
      // dd($client);
      return redirect()->route('client-index');
        // return redirect()->route('');
         }


    //==============index page===================
        public function index(){
            $client = Client::all();
            return view('admin.client.index',compact('client'));
        }  

        //========================update=====================
    public function edit($id){
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->heading = $request->input('heading');
        $client->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/', $filename);
            $client->image = $filename;
        }

        $client->update();
        return redirect()->route('client-index');
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('status','client$client Deleted Successfully');
    }
//=================End-delete=================

}
