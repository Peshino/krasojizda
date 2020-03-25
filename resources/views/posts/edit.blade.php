@extends('layouts.master')

@section('title')
@lang('messages.edit') {{ $post->title }} | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.edit_post')
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                <form method="POST" action="{{ route('posts.update', $post->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-title">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="post-title" name="title"
                                value="{{ $post->title }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-body">@lang('messages.text')</label>
                            <textarea class="form-control" rows="10" id="post-body" name="body"
                                required>{{ $post->body }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">@lang('messages.edit_post')</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection