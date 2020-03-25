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
                {{-- @if (count($importantDays) > 0)
                @foreach ($importantDays as $importantDay)
                @include('important-days.important-day')
                @endforeach
                @else
                Žádné důležité dny
                @endif --}}
                @include('important-days.important-day')
            </div>
        </div>
    </div>
</div>
@endsection