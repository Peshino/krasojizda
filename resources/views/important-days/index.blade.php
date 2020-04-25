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
                @php
                $years = [];
                @endphp
                @foreach ($importantDays as $importantDay)
                <div class="important-day">
                    @php
                    $currentCycleYear = $importantDay->date->isoFormat('YYYY');
                    @endphp
                    @if (in_array($currentCycleYear, $years))
                    @else
                    <div @if (!empty($years)) class="pt-2 pb-1 border-top-grey" @else class="pb-1" @endif>
                        <h3 class="important-day-title">
                            {{ $currentCycleYear }}
                        </h3>
                    </div>
                    @php
                    $years[] = $currentCycleYear;
                    @endphp
                    @endif
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