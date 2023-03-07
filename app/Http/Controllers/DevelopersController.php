<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Developers;
use Illuminate\Support\Facades\Storage;


class DevelopersController extends Controller
{
    public function datatable()
    {
        $developers = Developers::get();

        return DataTables::collection($developers)->toJson();

    }

    public function index()
    {
        $data = [
            'developers' => Developers::get(),
        ];
        
        return view('cms.developers.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.developers.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);

        $developer         =   new Developers;

        $image = Storage::disk('cms')->putFile('', $request->image);
        $logo = Storage::disk('cms')->putFile('', $request->logo);


        $developer->developer_name   =   $request->name;
        $developer->imagesmenu   =   $image;
        $developer->slug                 =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $developer->meta_title = $request->meta_title;
        $developer->meta_description = $request->meta_description;
        $developer->keywords = $request->keywords;

        $developer->description = $request->description;
        $developer->featured = 1;
        $developer->logo = $logo;
        $developer->status = "active";
        $developer->save();

        return redirect()->route('developers');
        
    }

    public function edit(Developers $developer)
    {
        $data = [
            'isEdit'                => true,
            'developer'    => $developer,
        ];

        // return $data['brand'];

        return view('cms.developers.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developers $developer)
    {

        if($request->has('logo'))
        {
            Storage::disk('cms')->delete('', $developer->logo);
            $imageName = Storage::disk('cms')->putFile('', $request->logo);
            $developer->logo  =   $imageName;
        }
        if($request->has('image'))
        {
            Storage::disk('cms')->delete('', $developer->imagesmenu);
            $imageName = Storage::disk('cms')->putFile('', $request->image);
            $developer->imagesmenu  =   $imageName;

        }

        $developer->developer_name   =   $request->name;
        $developer->website   =   $request->website;
        $developer->slug      =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $developer->description = $request->description;
        $developer->featured = 1;

        $developer->status = "active";
        $developer->save();

        return redirect()->route('developers');
    }

    


    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Developers::find($id);

        if ($item->update(['status' => $status])) {
            $response['status'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function destroy(Request $request)
    {
        $developers = Developers::where('id', $request->deleteId)->first();
        Storage::disk('cms')->delete('', $developers->imagesmenu);
        Storage::disk('cms')->delete('', $developers->logo);
        $developers->delete();
        // return $request;
        return response()->json($developers, 200);
    }
}
