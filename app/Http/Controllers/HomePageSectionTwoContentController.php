<?php

namespace App\Http\Controllers;

use App\Models\homePageSectionTwoContent;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class HomePageSectionTwoContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $homePageSectionTwoContent = homePageSectionTwoContent::get();

        return DataTables::collection($homePageSectionTwoContent)->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [
            'isEdit' => false,
        ];
        return view('cms.pages.home.section_three.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sectionContent = new homePageSectionTwoContent;
        $image = Storage::disk('cms')->putFile('', $request->image);
        $sectionContent->image  =   $image;
        $sectionContent->text1  =   $request->area_name;
        $sectionContent->text2  =   $request->starting_price;
        $sectionContent->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\homePageSectionTwoContent  $homePageSectionTwoContent
     * @return \Illuminate\Http\Response
     */
    public function show(homePageSectionTwoContent $homePageSectionTwoContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homePageSectionTwoContent  $homePageSectionTwoContent
     * @return \Illuminate\Http\Response
     */
    public function edit(homePageSectionTwoContent $homePageSectionTwoContent)
    {
        
        $data = [
            'isEdit' => true,
            'homePageSectionTwoContent' => $homePageSectionTwoContent,
        ];
        return view('cms.pages.home.section_three.add',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homePageSectionTwoContent  $homePageSectionTwoContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homePageSectionTwoContent $homePageSectionTwoContent)
    {
        
        $image = Storage::disk('cms')->putFile('', $request->image);
        $homePageSectionTwoContent->image  =   $image;
        $homePageSectionTwoContent->text1  =   $request->area_name;
        $homePageSectionTwoContent->text2  =   $request->starting_price;
        $homePageSectionTwoContent->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homePageSectionTwoContent  $homePageSectionTwoContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePageSectionTwoContent $homePageSectionTwoContent)
    {
        //
    }
}
