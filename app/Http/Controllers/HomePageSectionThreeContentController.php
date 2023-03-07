<?php

namespace App\Http\Controllers;

use App\Models\homePageSectionThreeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageSectionThreeContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homePageSectionThreeContent  $homePageSectionThreeContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homePageSectionThreeContent $homePageSectionThreeContent)
    {
        $homePageSectionThreeContent = homePageSectionThreeContent::where('section_name', 'section_2')->first();

        $homePageSectionThreeContent->section_name = $request->section;
        $homePageSectionThreeContent->heading1 =    $request->subheading;
        $homePageSectionThreeContent->heading2 =    $request->mainHeading;
        $homePageSectionThreeContent->description = $request->description;
        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $homePageSectionThreeContent->image = $image;

        }
        $homePageSectionThreeContent->save();

        foreach ($request->sectionName as $key => $value) {
            
            $homePageSectionThreeContent = homePageSectionThreeContent::where('section_name', $value)->first();
            
            $homePageSectionThreeContent->section_name = $value;
            $homePageSectionThreeContent->subsection_heading = $request->subHeading[$key];
            $homePageSectionThreeContent->subsection_desctription = $request->subDescription[$key];
            if($request->has('subImage'))
            {
            $image = Storage::disk('cms')->putFile('', $request->subImage[$key]);
            $homePageSectionThreeContent->sub_section_image = $image;
            }
            $homePageSectionThreeContent->save();
        }
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homePageSectionThreeContent  $homePageSectionThreeContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePageSectionThreeContent $homePageSectionThreeContent)
    {
        //
    }
}
