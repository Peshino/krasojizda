@extends('layouts.master')

@section('title')
@lang('messages.our_places') | @lang('messages.krasojizda_name')
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                @lang('messages.our_places')
            </div>
            <div class="col">
                <ul class="list-inline justify-content-end">
                    <li class="list-inline-item">
                        {{-- <a class="crud-button" href="{{ route('our-places.create') }}">
                        <div class="plus"></div>
                        </a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content text-center">
            <div class="content-block">
                {{-- @if (count($ourPlaces) > 0)
                @foreach ($ourPlaces as $ourPlace)
                @include('our-places.our-place')
                @endforeach
                @else
                Žádná naše místa
                @endif --}}
                @include('our-places.our-place')
            </div>
        </div>
    </div>
</div>
@endsection