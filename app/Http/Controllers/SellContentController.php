<?php

namespace App\Http\Controllers;

use App\Models\sellContent;
use Illuminate\Http\Request;

class SellContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.pages.sell.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  \App\Models\sellContent  $sellContent
     * @return \Illuminate\Http\Response
     */
    public function show(sellContent $sellContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sellContent  $sellContent
     * @return \Illuminate\Http\Response
     */
    public function edit(sellContent $sellContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sellContent  $sellContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sellContent $sellContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sellContent  $sellContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(sellContent $sellContent)
    {
        //
    }
}
