@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header krasojizda-bg">Článek</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="blog-main">
            <h1>
                {{ $post->title }}
            </h1>
            {{ $post->body }}

            <hr />

            <div class="comments">
                <ul class="list-group">
                    @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->user->firstname }} {{ $comment->user->lastname }} {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Add a comment --}}
            <hr />

            <p>
                Comment as {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
            </p>
            <div class="card-block">
                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" placeholder="Tvůj komentář" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
                @include('partials.errors')
            </div>
        </div>
    </div>
</div>
@endsection
