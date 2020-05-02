<?php

namespace App\Http\Controllers;

use App\LifeEvent;
use App\Repositories\LifeEvents;
use Illuminate\Http\Request;

class LifeEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda', 'check.unseenContent']);
        $this->middleware('can:viewAllAndCreate,App\LifeEvent')->only(['index', 'store', 'create']);
        $this->middleware('can:view,life_event')->only('show');
        $this->middleware('can:manipulate,life_event')->except(['index', 'show', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Repositories\LifeEvents  $lifeEvents
     * @return \Illuminate\Http\Response
     */
    public function index(LifeEvents $lifeEvents)
    {
        $lifeEvents = $lifeEvents->getKrasojizdaLifeEvents();

        $attributes = [
            'seen_by_user_id' => auth()->user()->id,
        ];

        foreach ($lifeEvents as $lifeEvent) {
            if ($lifeEvent->seen_by_user_id === null && auth()->user()->id !== $lifeEvent->user_id) {
                $lifeEvent->update($attributes);
            }
        }

        return view('life-events.index', compact('lifeEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('life-events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'date' => 'required|date|date_format:Y-m-d',
        ]);

        if (auth()->user()->addLifeEvent($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('life-events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function show(LifeEvent $lifeEvent)
    {
        return view('life-events.show', compact('lifeEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(LifeEvent $lifeEvent)
    {
        return view('life-events.edit', compact('lifeEvent'));
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
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'date' => 'required',
        ]);

        if ($lifeEvent->update($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect()->route('life-events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LifeEvent  $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(LifeEvent $lifeEvent)
    {
        if ($lifeEvent->delete()) {
            $status = 'success';
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            $status = 'error';
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return response()->json([
            'status' => $status,
        ]);
    }
}
