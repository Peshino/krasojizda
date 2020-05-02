@extends('layouts.master')

@section('title')
@lang('messages.important_days') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.important_days')
            </div>
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        <a class="crud-button" href="{{ route('important-days.create') }}">
                            <div class="plus"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                @if (count($importantDays) > 0)
                <div class="mb-2 border-bottom-grey">
                    <h3 class="important-day-title">
                        {{ $now->year }}
                    </h3>
                </div>
                @foreach ($importantDays as $importantDay)
                <div class="important-day">
                    @php
                    $timeFromNow = $importantDay->date->diffForHumans($now, [
                    'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                    'options' => \Carbon\Carbon::JUST_NOW | \Carbon\Carbon::ONE_DAY_WORDS |
                    \Carbon\Carbon::TWO_DAY_WORDS,
                    ],
                    false,
                    2);
                    @endphp
                    @include('important-days.important-day')
                </div>
                @endforeach
                @else
                -----
                @endif
            </div>
        </div>
    </div>
</div>
@endsection