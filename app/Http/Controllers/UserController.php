<?php

namespace App\Http\Controllers;

use App\User;
use App\Color;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:manipulate,user')->except(['show']);
        $this->middleware('can:view,user')->only(['show']);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $color = Color::find($user->color_id);

        return view('users.show', compact('user', 'color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $colors = Color::all();

        return view('users.edit', compact(
            'user',
            'colors'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'firstname' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'nickname' => 'max:20',
            'color_id' => 'required',
        ]);

        $attributes['fullname'] = $request['firstname'] . ' ' . $request['lastname'];

        if ($user->update($attributes)) {
            session()->flash('flash_message_success', __('messages.flash_updated'));
        } else {
            session()->flash('flash_message_danger', __('messages.flash_error'));
        }

        return redirect()->route('users.show', ['user' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
