@extends('layouts.master')

@section('content')
<div class="card mb-3">
    <div class="card-header krasojizda-bg">Článek</div>

    <div class="card-body">
        <div class="content">
            <div class="blog-main">
                <h2 class="text-center" style="color: {{ $post->user->color->hex_code }};">
                    {{ $post->title }}
                </h2>

                <p class="text-justify">{{ $post->body }}</p>

                <hr />

                <div class="comments">
                    <ul class="list-group">
                        @foreach ($post->comments as $comment)
                        <div class="d-flex">
                            <li class="list-group-item w-90 {{ Auth::user()->id === $comment->user->id ? 'ml-auto' : '' }}"
                                style="border-bottom: 1px solid {{ $comment->user->color->hex_code }};">
                                {{ $comment->body }}
                            </li>
                        </div>
                        <span
                            class="text-right unimportant-text {{ Auth::user()->id === $comment->user->id ? '' : 'w-90' }}"><small>{{ $comment->created_at->isoFormat('D. MMMM YYYY H:mm') }}</small>
                        </span>
                        @endforeach
                    </ul>
                </div>

                <hr />

                <div class="card-block">
                    <form method="POST" action="{{ route('comments.store', $post->id) }}">
                        @csrf
                        <div class="form-group">
                            <div class="floating-label">
                                <label for="comment-body">Tvůj komentář</label>
                                <textarea class="form-control" id="comment-body" name="body" required></textarea>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Přidej komentář</button>
                        </div>
                    </form>
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
