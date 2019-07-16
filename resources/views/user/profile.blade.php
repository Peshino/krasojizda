@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">Profil uživatele</div>

    <div class="card-body">
        <p>Jméno: {{ Auth::user()->firstname }}</p>
        <p>Příjmení: {{ Auth::user()->lastname }}</p>
    </div>
</div>
@endsection
