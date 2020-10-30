<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Conversation;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function store(Post $post, Conversation $conversation, Request $request)
    {
        $request->validate([
            'body' => 'required|min:2|max:5000',
        ]);

        if ($post->id !== null) {
            if ($post->addComment($request->input('body'))) {
                session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
            } else {
                session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
            }

            return redirect()->route('posts.show', ['post' => $post->id]);
        } elseif ($conversation->id !== null) {
            if ($conversation->addComment($request->input('body'))) {
                session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
            } else {
                session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
            }

            return redirect()->route('conversations.show', ['conversation' => $conversation->id]);
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
