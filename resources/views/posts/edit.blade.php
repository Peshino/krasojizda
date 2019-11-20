@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Upravit článek
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="blog-main">
                <form method="POST" action="{{ route('posts.update', $post->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-title">Titulek</label>
                        <input type="text" class="form-control" id="post-title" name="title" value="{{ $post->title }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-body">Text</label>
                            <textarea class="form-control" rows="10" id="post-body" name="body" required>{{ $post->body }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Uprav článek</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
