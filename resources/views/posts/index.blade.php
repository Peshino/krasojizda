@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header krasojizda-bg">Články</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="blog-main">
            @foreach ($posts as $post)
            @include('posts.post')
            @endforeach

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>
    </div>
</div>
@endsection
