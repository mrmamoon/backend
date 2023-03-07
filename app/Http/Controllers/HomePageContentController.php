<?php

namespace App\Http\Controllers;

use App\Models\homePageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;
use App\Models\homePageSectionThreeContent;


class HomePageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'homePageSectionThreeContent'   => $homePageSectionThreeContent = homePageSectionThreeContent::where('section_name', 'section_2')->first(),
            'homePageSubSection1Content' => homePageSectionThreeContent::where('section_name', 'sub_section_1')->first(),
            'homePageSubSection2Content' => homePageSectionThreeContent::where('section_name', 'sub_section_2')->first(),
            'homePageSubSection3Content' => homePageSectionThreeContent::where('section_name', 'sub_section_3')->first(),
        ];
        return view('cms.pages.home.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSectiontwo()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\homePageContent  $homePageContent
     * @return \Illuminate\Http\Response
     */
    public function show(homePageContent $homePageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homePageContent  $homePageContent
     * @return \Illuminate\Http\Response
     */
    public function edit(homePageContent $homePageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homePageContent  $homePageContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homePageContent $homePageContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homePageContent  $homePageContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePageContent $homePageContent)
    {
        //
    }
}
