@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Naše místa
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
            <div class="blog-main">
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