@extends('layouts.master')

@section('title')
@lang('messages.edit') {{ $importantDay->title }} | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.edit_important_day')
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                <form method="POST" action="{{ route('important-days.update', $importantDay->id) }}" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="important-day-date">@lang('messages.date')</label>
                            <input type="text" class="form-control input-datepicker" id="important-day-date" name="date"
                                value="{{ $importantDay->date->isoFormat('YYYY-MM-DD') }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="important-day-title">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="important-day-title" name="title"
                                value="{{ $importantDay->title }}" required />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">@lang('messages.edit_important_day')</button>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection