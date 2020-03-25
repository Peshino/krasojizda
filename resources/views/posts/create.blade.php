@extends('layouts.master')

@section('title')
@lang('messages.create_post') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.create_post')
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                <form method="POST" action="{{ route('posts.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-title">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="post-title" name="title"
                                value="{{ old('title') }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="post-body">@lang('messages.text')</label>
                            <textarea class="form-control" rows="10" id="post-body" name="body"
                                required>{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">@lang('messages.create_post')</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection