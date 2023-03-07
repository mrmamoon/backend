<?php

namespace App\Http\Controllers;

use App\Models\headings;
use Illuminate\Http\Request;

class HeadingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $headings = [
        //     'homePage1stHeading' => 'Featured Properties',
        //     'homePage1stSubHeading' => 'Best Choice',
        //     'homePage2ndHeading' => 'Popular Areas In Dubai',
        //     'homePage2ndSubHeading' => ' Best Choice ',
        //     'homePage3rdHeading' => 'We Provide Latest Properties for our valuable Clients',
        //     'homePage3rdSubHeading' => ' Why Choose us ',
        //     'homePage4thHeading' => ' Our Partners.',

        //     'homePage5thHeading' => ' Check our blog post',
        //     'homePage5thSubHeading' => ' Our Blog ',        
        // ];
        // foreach($headings as $key=>$value){
        //     $headingss = new headings;
        //     $headingss->key = $key;
        //     $headingss->content = $value;
        //     $headingss->save();
        // }
        // dd(getHeading('homePage1stHeading'));
        // dd(headings::get());
        return view('cms.settings.headings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\headings  $headings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach($request->key as $key => $value){

            $headings = headings::where('key',$key)->first();
            $headings->content = $value;
            $headings->save();
        }
        return redirect()->route('headings');
        
    }
}
