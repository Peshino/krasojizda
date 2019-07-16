@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <p>Domovská stránka aplikace Krasojízda.</p>
    </div>
</div>
@endsection
