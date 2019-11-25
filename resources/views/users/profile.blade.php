@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Profil uživatele
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="{{ asset('img/avatar_2x.png') }}" class="avatar img-circle img-thumbnail"
                            alt="avatar">
                    </div>
                </div>
                <div class="col-sm-9">
                    {{ $user->email }} | {{ $user->firstname }} | {{ $user->lastname }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
