<?php

namespace App\Http\Controllers;

use App\Models\aboutUsContent;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class AboutUsContentController extends Controller
{
    
    public function datatable()
    {
        $content = aboutUsContent::where('section', 'section_4')->get();

        return DataTables::collection($content)->toJson();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'aboutUsSection1Content' => aboutUsContent::where('section', 'section_1')->first(),
            'aboutUsSection2Content' => aboutUsContent::where('section', 'section_2')->first(),
            'aboutUsSection3Content' => aboutUsContent::where('section', 'section_3')->first(),
            'aboutUsSection3SubSection1Content' => aboutUsContent::where('section', 'sub_section_1')->first(),
            'aboutUsSection3SubSection2Content' => aboutUsContent::where('section', 'sub_section_2')->first(),
            'aboutUsSection3SubSection3Content' => aboutUsContent::where('section', 'sub_section_3')->first(),
            'aboutUsSection5Content' => aboutUsContent::where('section', 'section_5')->first(),
        ];
        return view('cms.pages.about_us.index', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//section one
    public function storeSectionOne(Request $request)
    {
        $aboutUsContent = new aboutUsContent;

        $aboutUsContent->section = "sectione_1";
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        // $aboutUsContent->description = $request->

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();
        return redirect()->route('about-us');

    }

    public function updateSectionOne(Request $request, aboutUsContent $aboutUsContent)
    {
        $aboutUsContent =  aboutUsContent::where('section', 'section_1')->first();
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        // $aboutUsContent->description = $request->

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();
        return redirect()->route('about-us');
    }

//section two
    public function storeSectionTwo(Request $request)
    {
        $aboutUsContent = new aboutUsContent;

        $aboutUsContent->section = "section_2";
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();
        return redirect()->route('about-us');

    }

    public function updateSectionTwo(Request $request, aboutUsContent $aboutUsContent)
    {
        $aboutUsContent =  aboutUsContent::where('section', 'section_2')->first();
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();
        return redirect()->route('about-us');
    }

//section three
    public function storeSectionThree(Request $request)
    {
        $aboutUsContent = new aboutUsContent;

        $aboutUsContent->section = "section_3";
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();


        foreach ($request->sectionName as $key => $value) {
            
            // $aboutUsContent = aboutUsContent::where('section', $value)->first();
            $aboutUsContent = new aboutUsContent;
            
            $aboutUsContent->title = "about us";
            $aboutUsContent->section = $value;
            $aboutUsContent->main_heading_1 = $request->subHeading[$key];
            $aboutUsContent->description = $request->subDescription[$key];
            if($request->has('subImage'))
            {
            $image = Storage::disk('cms')->putFile('', $request->subImage[$key]);
            $aboutUsContent->image = $image;
            }
            $aboutUsContent->save();
        }
        return redirect()->route('about-us');

    }

    public function updateSectionThree(Request $request, aboutUsContent $aboutUsContent)
    {
        $aboutUsContent =  aboutUsContent::where('section', 'section_3')->first();
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;

        if($request->has('bg_image'))
        {
            $image = Storage::disk('cms')->putFile('', $request->bg_image);
            $aboutUsContent->image =  $image;

        }
        $aboutUsContent->save();

        foreach ($request->sectionName as $key => $value) {
            
            // $aboutUsContent = aboutUsContent::where('section', $value)->first();
            $aboutUsContent = aboutUsContent::where('section', $value)->first();
            
            $aboutUsContent->main_heading_1 = $request->subHeading[$key];
            $aboutUsContent->description = $request->subDescription[$key];
            if($request->has('subImage'))
            {
            $image = Storage::disk('cms')->putFile('', $request->subImage[$key]);
            $aboutUsContent->image = $image;
            }
            $aboutUsContent->save();
        }
        return redirect()->route('about-us');
    }

//section four
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSectionFour()
    {
        $data = [
            'isEdit' => false,
        ];
        return view('cms.pages.about_us.section_four.add', $data);
    }

    public function storeSectionFour(Request $request)
    {
        $aboutUsContent = new aboutUsContent;
        $aboutUsContent->title = 'about us';
        $aboutUsContent->section = 'section_4';
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;
        if ($request->has('image')) {
            $image = Storage::disk('cms')->putFile('', $request->image);
            $aboutUsContent->image =  $image;
        }
        $aboutUsContent->save();

        return redirect()->route('about-us');
    }

    public function editSectionFour(aboutUsContent $sectionFour)
    {
        $data = [
            'isEdit' => true,
            'sectionFour' => $sectionFour,
        ];
        return view('cms.pages.about_us.section_four.add', $data);
    }

    public function updateSectionFour(Request $request, aboutUsContent $sectionFour)
    {
        $aboutUsContent = aboutUsContent::where('id', $sectionFour->id)->first();
        $aboutUsContent->title = 'about us';
        $aboutUsContent->section = 'section_4';
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        $aboutUsContent->description = $request->description;
        if ($request->has('image')) {
            $image = Storage::disk('cms')->putFile('', $request->image);
            $aboutUsContent->image =  $image;
        }
        $aboutUsContent->save();

        return redirect()->route('about-us');
    }

//section Five
    public function storeSectionFive(Request $request)
    {
        $aboutUsContent = new aboutUsContent;

        $aboutUsContent->section = "section_5";
        $aboutUsContent->title = "about us";
        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;
        // $aboutUsContent->description = $request->
        $aboutUsContent->save();
        return redirect()->route('about-us');

    }

    public function updateSectionFive(Request $request)
    {
        $aboutUsContent = aboutUsContent::where('section', 'section_5')->first();

        $aboutUsContent->sub_heading_1 = $request->subheading;
        $aboutUsContent->main_heading_1 = $request->mainHeading;

        $aboutUsContent->save();
        return redirect()->route('about-us');

    }
}
