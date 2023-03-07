<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Amenities;



class AmenitiesController extends Controller
{
    public function datatable()
    {
        $amenities = Amenities::orderBy("name","asc")->get();

        return DataTables::collection($amenities)->toJson();

    }
    public function index()
    {
        // $data = [
        //     'developers' => Developers::get(),
        // ];
        
        return view('cms.amenities.index');
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.amenities.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);

        $amenities         =   new Amenities;
        $amenities->name    =   $request->name;
        // $amenities->meta_description    =   $request->meta_description;
        // $amenities->meta_keywords    =   $request->meta_keywords;
        // $amenities->sort_order    =   0;
        // $amenities->description    =   $request->description;

        $amenities->save();

        return redirect()->route('amenities');
        
    }

    public function destroy(Request $request)
    {
        $amenity = Amenities::where('id', $request->deleteId)->first();
        $amenity->delete();
        // return $request;
        return response()->json($amenity, 200);
    }
}
