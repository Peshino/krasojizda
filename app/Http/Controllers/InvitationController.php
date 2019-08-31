<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\Krasojizda;
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

        session()->flash('flash_message_info', __('messages.flash_invitation_created'));

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
            $resultValue = $request->input('result');

            switch ($resultValue) {
                case 'accepted':
                    $invitation->update(['result' => $resultValue]);
                    $krasojizda = new Krasojizda;

                    if ($krasojizda->create($invitation)) {
                        session()->flash('flash_message_info', __('messages.flash_krasojizda_created'));
                    } else {
                        session()->flash('flash_message_danger', __('messages.flash_krasojizda_create_error'));
                    }
                    break;
                case 'rejected':
                    $invitation->update(['result' => $resultValue]);
                    session()->flash('flash_message_info', __('messages.flash_invitation_rejected'));
                    break;
                case 'withdrawn':
                    $invitation->update(['result' => $resultValue]);
                    session()->flash('flash_message_info', __('messages.flash_invitation_withdrawn'));
                    break;
                default:
                    session()->flash('flash_message_danger', __('messages.flash_error'));
                    break;
            }
        }

        if ($request->has('confirmator_id')) {
            if ($invitation->update(['confirmator_id' => $request->input('confirmator_id')])) {
                $status = 'success';
            } else {
                $status = 'error';
            }

            return response()->json([
                'status' => $status,
            ]);
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
