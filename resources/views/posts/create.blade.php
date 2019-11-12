@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">Vytvořit článek</div>

    <div class="card-body">
        <div class="content text-center">
            <div class="blog-main">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-title">Titulek</label>
                            <input type="text" class="form-control" id="post-title" name="title" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-body">Text</label>
                            <textarea class="form-control" id="post-body" name="body" required></textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Vytvoř článek</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
