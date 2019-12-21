<?php

namespace App\Http\Controllers;

use App\ImportantDay;
use Illuminate\Http\Request;

class ImportantDayController extends Controller
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
        return view('important-days.index');
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
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function show(ImportantDay $importantDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportantDay $importantDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportantDay $importantDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImportantDay  $importantDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportantDay $importantDay)
    {
        //
    }
}
