<?php

namespace App\Http\Controllers;

use App\Krasojizda;
use Illuminate\Http\Request;

class KrasojizdaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda', 'check.unseenContent']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Krasojizda  $krasojizda
     * @return \Illuminate\Http\Response
     */
    public function show(Krasojizda $krasojizda)
    {
        return view('krasojizda.krasojizda', compact('krasojizda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Krasojizda  $krasojizda
     * @return \Illuminate\Http\Response
     */
    public function edit(Krasojizda $krasojizda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Krasojizda  $krasojizda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Krasojizda $krasojizda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Krasojizda  $krasojizda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Krasojizda $krasojizda)
    {
        //
    }
}
