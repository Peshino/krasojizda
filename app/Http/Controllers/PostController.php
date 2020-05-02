<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.krasojizda', 'check.unseenContent']);
        $this->middleware('can:viewAllAndCreate,App\Post')->only(['index', 'store', 'create']);
        $this->middleware('can:view,post')->only('show');
        $this->middleware('can:manipulate,post')->except(['index', 'show', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Repositories\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
        $withUnseenCommentsCount = true;
        $posts = $posts->getKrasojizdaPosts($withUnseenCommentsCount);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'body' => 'required|min:2|max:2000',
        ]);

        if (auth()->user()->addPost($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $attributes = [
            'seen_by_user_id' => auth()->user()->id,
        ];

        if ($post->seen_by_user_id === null && auth()->user()->id !== $post->user_id) {
            $post->update($attributes);
        }

        foreach ($post->comments as $comment) {
            if ($comment->seen_by_user_id === null && auth()->user()->id !== $comment->user_id) {
                $comment->update($attributes);
            }
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|min:2|max:100',
            'body' => 'required|min:2|max:2000',
        ]);

        if ($post->update($attributes)) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            session()->flash('flash_message_success', '<i class="fas fa-check"></i>');
        } else {
            session()->flash('flash_message_danger', '<i class="fas fa-times"></i>');
        }

        return redirect('posts');
    }
}
