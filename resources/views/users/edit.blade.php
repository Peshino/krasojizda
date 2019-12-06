@extends('layouts.master')

@section('content')
<div class="card mb-4">
    <div class="card-header krasojizda-bg">
        <div class="row">
            <div class="col col-left">
                Upravit profil
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="content">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="{{ asset('img/no_avatar.png') }}" class="avatar img-circle img-thumbnail"
                                alt="avatar">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="floating-label">
                                <label for="user-email">Email</label>
                                <input class="form-control" id="user-email" type="email" value="{{ $user->email }}"
                                    disabled />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <div class="floating-label">
                                        <label for="user-firstname">Jméno</label>
                                        <input class="form-control" id="user-firstname" name="firstname" type="text"
                                            value="{{ $user->firstname }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <div class="floating-label">
                                        <label for="user-lastname">Příjmení</label>
                                        <input class="form-control" id="user-lastname" name="lastname" type="text"
                                            value="{{ $user->lastname }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <div class="floating-label">
                                        <label for="user-nickname">Přezdívka</label>
                                        <input class="form-control" id="user-nickname" name="nickname" type="text"
                                            value="{{ $user->nickname }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group color-radio-buttons mt-2">
                                    @foreach ($colors as $color)
                                    <input type="radio" class="color-radio" id="color-radio-{{ $color->id }}"
                                        name="color_id" value="{{ $color->id }}" {{ $user->color_id === $color->id ? ' checked' : '' }} />
                                    <label for="color-radio-{{ $color->id }}"
                                        style="background-color: {{ $color->hex_code }}"></label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-1">
                    <button type="submit" class="btn btn-primary">Uprav profil</button>
                </div>

                @include('partials.errors')
            </form>
        </div>
    </div>
</div>
@endsection
