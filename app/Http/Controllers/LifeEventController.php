<?php

namespace App\Http\Controllers;

use App\LifeEvent;
use Illuminate\Http\Request;

class LifeEventController extends Controller
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
        return view('life-events.index');
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
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function show(LifeEvent $lifeEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(LifeEvent $lifeEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LifeEvent $lifeEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(LifeEvent $lifeEvent)
    {
        //
    }
}
