@extends('layouts.master')

@section('content')
<div class="card mb-3">
    <div class="card-header krasojizda-bg">Články</div>

    <div class="card-body">
        <div class="content text-center">
            <a href="{{ route('posts.create') }}">Vytvoř článek</a>

            <div class="blog-main">
                @foreach ($posts as $post)
                @include('posts.post')
                @endforeach

                {{-- <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav> --}}
            </div>
        </div>
    </div>
</div>
@endsection
