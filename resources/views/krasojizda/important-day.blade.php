@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header krasojizda-bg">Důležité dny</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <p>Důležité dny - obsah</p>
    </div>
</div>
@endsection
