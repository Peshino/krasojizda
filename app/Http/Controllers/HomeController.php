<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Invitation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invitationReceiver = null;
        $invitationInviter = null;
        $hasLoggedUserKrasojizda = auth()->user()->krasojizda_id !== null ? true : false;
        $loggedUserInviterInvitation = Invitation::where('inviter_id', auth()->user()->id)->whereNull('result')->first();
        $loggedUserReceiverInvitation = Invitation::where('receiver_id', auth()->user()->id)->whereNull('result')->first();

        if ($loggedUserInviterInvitation !== null) {
            $invitationReceiver = User::where('id', $loggedUserInviterInvitation->receiver_id)->first();
        }

        if ($loggedUserReceiverInvitation !== null) {
            $invitationInviter = User::where('id', $loggedUserReceiverInvitation->inviter_id)->first();
        }

        return view(
            'krasojizda.home',
            compact(
                'hasLoggedUserKrasojizda',
                'loggedUserInviterInvitation',
                'invitationReceiver',
                'loggedUserReceiverInvitation',
                'invitationInviter'
            )
        );
    }

    public function welcome()
    {
        return view('krasojizda.welcome');
    }

    public function searchPartnerAjaxPost(Request $request)
    {
        $inputs = $request->all();

        $searchPartnerInput = $inputs['search_partner_input'] ?? null;

        $user = User::where('email', $searchPartnerInput)->first();

        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }
}
