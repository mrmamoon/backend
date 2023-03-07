<?php

namespace App\Http\Controllers;

use App\Models\propertyManagementContent;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PropertyManagementContentController extends Controller
{
    public function datatable()
    {
        $propertyManagementContent = propertyManagementContent::where('section', 'section_2')->get();
        return DataTables::collection($propertyManagementContent)->toJson();
    }

    public function index()
    {
        $data = [
            'section_title' => propertyManagementContent::where('section', 'section_title')->first(),
            'section_1' => propertyManagementContent::where('section', 'section_1')->first(),
            'section_3' => propertyManagementContent::where('section', 'section_3')->first(),
        ];
        return view('cms.pages.property_management.index',$data);
    }

    public function updateSectionTitle(Request $request)
    {
        $propertyManagementContent = propertyManagementContent::where('section', 'section_title')->first();
        $propertyManagementContent->heading = $request->mainHeading;
        $propertyManagementContent->save();
        return redirect()->route('property-management');

    }

    public function updateSectionOne(Request $request)
    {
        $propertyManagementContent = propertyManagementContent::where('section', 'section_1')->first();
        $propertyManagementContent->heading = $request->mainHeading;
        $propertyManagementContent->description = $request->description;
        $propertyManagementContent->save();
        return redirect()->route('property-management');
    }


    public function createSectionTwo()
    {
        $data = [
            'isEdit' => false,
        ];
        return view('cms.pages.property_management.section_two.add', $data);
    }


    public function storeSectionTwo(Request $request)
    {
        $propertyManagementContent = new propertyManagementContent;
        $propertyManagementContent->title = 'Property Management';
        $propertyManagementContent->section = 'section_2';
        $propertyManagementContent->heading = $request->heading;
        $propertyManagementContent->description = $request->description;
        if($request->has('image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->image);
            $propertyManagementContent->image = $image;
        }
        $propertyManagementContent->save();
        return redirect()->route('property-management');
    }


    public function editSectionTwo(propertyManagementContent $sectionTwo)
    {
        $data = [
            'isEdit' => true,
            'sectionTwo' => $sectionTwo,
        ];
        return view('cms.pages.property_management.section_two.add', $data);
    }

    public function updateSectionTwo(Request $request, propertyManagementContent $sectionTwo)
    {
        $sectionTwo->heading = $request->heading;
        $sectionTwo->description = $request->description;   
        if($request->has('image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->image);
            $sectionTwo->image = $image;
        }
        $sectionTwo->save();
        return redirect()->route('property-management');
    }

    public function updateSectionThree(Request $request)
    {
        $propertyManagementContent = propertyManagementContent::where('section', 'section_3')->first();
        $propertyManagementContent->heading = $request->mainHeading;
        $propertyManagementContent->save();

        return redirect()->route('property-management');
    }

}
