<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Repositories\Conversations;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda', 'check.unseenContent']);
        $this->middleware('can:viewAllAndCreate,App\Conversation')->only(['index', 'store', 'create']);
        $this->middleware('can:view,conversation')->only('show');
        $this->middleware('can:manipulate,conversation')->except(['index', 'show', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Repositories\Conversations  $conversations
     * @return \Illuminate\Http\Response
     */
    public function index(Conversations $conversations)
    {
        $withUnseenCommentsCount = true;
        $conversations = $conversations->getKrasojizdaConversations($withUnseenCommentsCount);

        return view('conversations.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conversations.create');
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
            'body' => 'required|min:2|max:1000',
        ]);

        if (auth()->user()->addConversation($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('conversations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        $attributes = [
            'seen_by_user_id' => auth()->user()->id,
        ];

        if ($conversation->seen_by_user_id === null && auth()->user()->id !== $conversation->user_id) {
            $conversation->update($attributes);
        }

        foreach ($conversation->comments as $comment) {
            if ($comment->seen_by_user_id === null && auth()->user()->id !== $comment->user_id) {
                $comment->update($attributes);
            }
        }

        return view('conversations.show', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        return view('conversations.edit', compact('conversation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'body' => 'required|min:2|max:1000',
        ]);

        if ($conversation->update($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect()->route('conversations.show', ['conversation' => $conversation->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        if ($conversation->delete()) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('conversations');
    }
}
