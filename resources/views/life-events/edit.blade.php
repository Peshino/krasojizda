@extends('layouts.master')

@section('title')
@lang('messages.edit') {{ $conversation->title }} | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.edit_conversation')
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="blog-main">
                <form method="POST" action="{{ route('conversations.update', $conversation->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="conversation-title">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="conversation-title" name="title"
                                value="{{ $conversation->title }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="conversation-body">@lang('messages.text')</label>
                            <textarea class="form-control" rows="10" id="conversation-body" name="body"
                                required>{{ $conversation->body }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">@lang('messages.edit_conversation')</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection