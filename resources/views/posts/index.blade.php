@extends('layouts.master')

@section('title')
@lang('messages.posts') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.posts')
            </div>
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        <a class="crud-button" href="{{ route('posts.create') }}">
                            <div class="plus"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="blog-main">
                @if (count($posts) > 0)
                @foreach ($posts as $post)
                @include('posts.post')
                @endforeach
                @else
                -----
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
