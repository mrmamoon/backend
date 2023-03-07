<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\propertyType;
use DataTables;



class propertyTypeController extends Controller
{
    public function datatable()
    {
        $blog = propertyType::get();

        return DataTables::collection($blog)->toJson();
    }

     public function index()
    {
        $data = [
            'types' =>  propertyType::get(),
        ];
        return view('cms.property_type.index', $data);
    }

    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.property_type.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $propertyType = new propertyType;

        $propertyType->type                 =   $request->type;
        $propertyType->code                   =   $request->code;

        $propertyType->save();

        return redirect()->route('property-type');
    }


    public function edit(propertyType $propertyType)
    {
        $data = [
            'isEdit'                => true,
            'propertyType'    => $propertyType,
        ];

        return view('cms.property_type.add', $data);
    }

    public function update(Request $request, propertyType $propertyType)
    {

        $propertyType->type                 =   $request->type;
        $propertyType->code                   =   $request->code;

        $propertyType->save();

        return redirect()->route('property-type');
    }

    public function destroy(Request $request)
    {
        $propertyType = propertyType::where('id', $request->deleteId)->first();
        $propertyType->delete();

        return response()->json($propertyType, 200);
    }
}
