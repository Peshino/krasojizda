@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Důležité dny
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
            <div class="blog-main">
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