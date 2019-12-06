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
                        <img src="{{ asset('img/no_avatar.png') }}" class="avatar img-circle img-thumbnail"
                            alt="avatar">
                    </div>
                </div>
                <div class="col-sm-9">
                    <div>
                        <h2>{{ $user->fullname }}</h2>
                    </div>
                    @isset($user->nickname)
                    <div>
                        <h4><i class="far fa-user pr-3 pt-3"></i>{{ $user->nickname }}</h4>
                    </div>
                    @endisset
                    <div>
                        <h4><i class="far fa-envelope pr-3 pt-3"></i>{{ $user->email }}</h4>
                    </div>
                    <div class="form-group color-radio-buttons pt-3">
                        <input type="radio" class="color-radio" id="color-radio-{{ $color->id }}" name="color_id"
                            value="{{ $color->id }}" />
                        <label for="color-radio-{{ $color->id }}"
                            style="background-color: {{ $color->hex_code }}"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
