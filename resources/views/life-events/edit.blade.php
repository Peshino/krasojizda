@extends('layouts.master')

@section('title')
@lang('messages.edit') {{ $lifeEvent->title }} | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.edit_life_event')
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                <form method="POST" action="{{ route('life-events.update', $lifeEvent->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="life-event-date">@lang('messages.date')</label>
                            <input type="text" class="form-control input-datepicker" id="life-event-date" name="date"
                                value="{{ $lifeEvent->date->isoFormat('YYYY-MM-DD') }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="life-event-title">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="life-event-title" name="title"
                                value="{{ $lifeEvent->title }}" required />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">@lang('messages.edit_life_event')</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection