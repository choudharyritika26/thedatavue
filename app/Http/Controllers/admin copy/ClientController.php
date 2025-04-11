<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ClientController extends Controller
{
    public function create(){
        return view ('admin.client.form');
       }

       public function store(Request $request){

        //dd($request->all());
        //dd($imageName);

        $validatedData = $request->validate([
            'sort_col' => 'required',
            // 'description' => 'required',
           'image' => 'required|image',
            'cropDataX' => 'required|numeric',
            'cropDataY' => 'required|numeric',
            'cropDataWidth' => 'required|numeric',
            'cropDataHeight' => 'required|numeric',
           
        ]);
        
        $client = new Client;
        $client->sort_col = $request->input('sort_col');
        $client->heading = $request->input('heading');
        $client->description = $request->input('description');
        // $about->image = $request->input('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/' . $filename);

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($image->getRealPath());
            $imageCrop->crop(
                intval($request->input('cropDataWidth')),
                intval($request->input('cropDataHeight')),
                intval($request->input('cropDataX')),
                intval($request->input('cropDataY'))
            );
            $imageCrop->resize(1024, 1024, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);

            $client->image = $filename;
        }
        $client->save();
        // dd($client);
     // return redirect()->route('client-index');
        // return redirect()->route('');
        return response()->json([
            'message' => 'Client Add Successfully',
            'redirect_url' => route('client-index'),
        ]);
         }


    //==============index page===================
        public function index(){
            $client = Client::where('is_active',1)->orderBy('sort_col', 'asc')->get();
            return view('admin.client.index',compact('client'));
        }  

        public function updateOrder(Request $request)
{
    $ids = $request->input('ids'); // Get the sorted slider IDs from the frontend

    foreach ($ids as $index => $id) {
        // Update the sort_col field for each slider based on the new index
        Client::where('id', $id)->update(['sort_col' => $index + 1]);
    }

    return response()->json(['success' => 'Order updated successfully.']);
}

        //========================update=====================
    public function edit($id){
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sort_col' => 'required',
            // 'description' => 'required',
            'image'=> 'nullable|',
           
        ]);

        $client = Client::find($id);
        $client->sort_col = $request->input('sort_col');
        $client->heading = $request->input('heading');
        $client->description = $request->input('description');
        // Check if a new image file has been uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = public_path('storage/' . $filename);   

            // Crop the image
            $imageCrop = (new ImageManager(Driver::class))->read($file->getRealPath());
            $imageCrop->crop(
                intval($request->input('cropDataWidth')),
                intval($request->input('cropDataHeight')),
                intval($request->input('cropDataX')),
                intval($request->input('cropDataY'))
            );
            $imageCrop->resize(1024, 1024, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageCrop->save($path);
            $client->image = $filename;  
        }
        $client->update();
       // return redirect()->route('client-index');
       return response()->json([
        'message' => 'Client Edit Successfully',
        'redirect_url' => route('client-index'),
    ]);
    }
        
        
        //=================delete=================
    public function destroy($id)
    {
        $client = Client::find($id);
        // $client->delete();
        // return redirect()->back()->with('status','client$client Deleted Successfully');
        $client->is_active = 0; // Set is_active to 0, but don't delete the document
        $client->save(); // Save the changes
        return redirect()->back()->with('status', 'cl$client ' . $client->name . ' Deactivated Successfully');
    }
//=================End-delete=================

}
