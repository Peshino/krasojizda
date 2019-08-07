<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;

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
        $hasLoggedUserKrasojizda = Auth::user()->krasojizda_id !== null ? true : false;
        return view('krasojizda.home', compact('hasLoggedUserKrasojizda'));
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
