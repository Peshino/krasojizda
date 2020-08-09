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
                    @if ($importantDayYears !== null)
                    <div class="dropdown p-1 mb-2">
                        <button class="btn dropdown-toggle" type="button" id="important-day-year" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ $importantDayYearSelected }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-center" aria-labelledby="important-day-year">
                            <a class="dropdown-item" href="{{ route('important-days.index') }}">
                                @lang('messages.current')
                            </a>
                            @foreach ($importantDayYears as $importantDayYear)
                            <a class="dropdown-item" href="{{ route('filter-by-year', $importantDayYear) }}">
                                {{ $importantDayYear ?? '' }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
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