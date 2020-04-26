@extends('layouts.master')

@section('title')
@lang('messages.life_events') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.life_events')
            </div>
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        <a class="crud-button" href="{{ route('life-events.create') }}">
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
                @if (count($lifeEvents) > 0)
                @php
                $years = [];
                @endphp
                @foreach ($lifeEvents as $lifeEvent)
                <div class="life-event">
                    @php
                    $currentIterationYear = $lifeEvent->date->isoFormat('YYYY');
                    @endphp
                    @if (in_array($currentIterationYear, $years))
                    @else
                    <div @if (!empty($years)) class="pt-2 pb-1 border-top-grey" @else class="pb-1"
                        @endif>
                        <h3 class="life-event-title">
                            {{ $currentIterationYear }}
                        </h3>
                    </div>
                    @php
                    $years[] = $currentIterationYear;
                    @endphp
                    @endif
                    @include('life-events.life-event')
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