<?php

namespace App\Http\Controllers;

use App\Models\homeCarousel;
use Illuminate\Http\Request;
use DataTables;

use Illuminate\Support\Facades\Storage;

class HomeCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $homeCarousel = homeCarousel::get();

        return DataTables::collection($homeCarousel)->toJson();

    }
    public function index()
    {
        return view('cms.Home-carousel.index');
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

        return view('cms.Home-carousel.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $homeCarousel         =   new homeCarousel;

        $image = Storage::disk('cms')->putFile('', $request->image);

        $homeCarousel->image   =   $image;

        $homeCarousel->save();

        return redirect()->route('HomeCarousel');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homeCarousel  $homeCarousel
     * @return \Illuminate\Http\Response
     */
    public function edit(homeCarousel $homeCarousel)
    {
        $data = [
            'isEdit'                => true,
            'homeCarousel'    => $homeCarousel,
        ];

        // return $data['brand'];

        return view('cms.Home-carousel.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homeCarousel  $homeCarousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homeCarousel $homeCarousel)
    {
        
        Storage::disk('cms')->delete('', $homeCarousel->image);
        $imageName = Storage::disk('cms')->putFile('', $request->image);
        $homeCarousel->image  =   $imageName;
        $homeCarousel->save();

        return redirect()->route('HomeCarousel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homeCarousel  $homeCarousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $homeCarousel = homeCarousel::where('id', $request->deleteId)->first();
        Storage::disk('cms')->delete('', $homeCarousel->imagesmenu);
        Storage::disk('cms')->delete('', $homeCarousel->logo);
        $homeCarousel->delete();
        // return $request;
        return response()->json($homeCarousel, 200);
    }
}
