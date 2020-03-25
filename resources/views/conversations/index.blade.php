@extends('layouts.master')

@section('title')
@lang('messages.conversations') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.conversations')
            </div>
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        <a class="crud-button" href="{{ route('conversations.create') }}">
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
                @if (count($conversations) > 0)
                @foreach ($conversations as $conversation)
                @include('conversations.conversation')
                @endforeach
                @else
                -----
                @endif
            </div>
        </div>
    </div>
</div>
@endsection