<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\Krasojizda;
use App\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
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
        Invitation::create($request->validate([
            'inviter_id' => 'required|min:1',
            'receiver_id' => 'required|min:1',
        ]));

        session()->flash('message', 'Článek byl vytvořen.');

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        if ($request->has('result')) {
            $invitation->update([
                'result' => $request->input('result')
            ]);

            $inviter = User::find($invitation->inviter_id);
            $receiver = User::find($invitation->receiver_id);

            $krasojizda = new Krasojizda;
            $krasojizda->name = 'Krasojízda ' . $inviter->firstname . ' & ' . $receiver->firstname;
            $krasojizda->save();

            $inviter->krasojizda_id = $receiver->krasojizda_id = $krasojizda->id;
            $inviter->save();
            $receiver->save();
        }

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
