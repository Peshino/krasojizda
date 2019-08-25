@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header krasojizda-bg">Vytvoř článek</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="blog-main">
            <h1>Publish a Post</h1>

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea id="body" name="body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>

                @include('partials.errors')
            </form>
        </div>
    </div>
</div>
@endsection
