<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Invitation;
use \App\Krasojizda;
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
        $loggedUserKrasojizdaId = auth()->user()->krasojizda_id;
        $loggedUserInviterInvitation = Invitation::where('inviter_id', auth()->user()->id)->whereNull('result')->first();
        $loggedUserReceiverInvitation = Invitation::where('receiver_id', auth()->user()->id)->whereNull('result')->first();

        if ($loggedUserKrasojizdaId !== null) {
            $loggedUserKrasojizdaName = (Krasojizda::find($loggedUserKrasojizdaId))->name;
        }

        if ($loggedUserInviterInvitation !== null) {
            $invitationReceiver = User::where('id', $loggedUserInviterInvitation->receiver_id)->first();
        }

        if ($loggedUserReceiverInvitation !== null) {
            $invitationInviter = User::where('id', $loggedUserReceiverInvitation->inviter_id)->first();
        }

        return view(
            'krasojizda.home',
            compact(
                'loggedUserKrasojizdaId',
                'loggedUserKrasojizdaName',
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

        if ($user === null) {
            $status = 'error';
            $message = __('messages.search_partner_not_found');
        } elseif ($user->email === auth()->user()->email) {
            $status = 'error';
            $message = __('messages.search_myself_error');
        } else {
            $status = 'success';
            $message = __('messages.search_partner_found');
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'user' => $user
        ]);
    }
}
