<?php

namespace App\Http\Controllers;

use App\OurPlace;
use Illuminate\Http\Request;

class OurPlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('our-places.index');
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
     * @param  \App\OurPlace  $ourPlace
     * @return \Illuminate\Http\Response
     */
    public function show(OurPlace $ourPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurPlace  $ourPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(OurPlace $ourPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurPlace  $ourPlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurPlace $ourPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurPlace  $ourPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurPlace $ourPlace)
    {
        //
    }
}
