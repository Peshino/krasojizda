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
                    <div class="mt-3 text-center">
                        <input type="file" class="text-center center-block file-upload" />
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="exampleFloatingLabel9">Email</label>
                            <input class="form-control" id="exampleFloatingLabel9" type="email"
                                value="{{ Auth::user()->email }}" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="floating-label">
                                    <label for="exampleFloatingLabel9">Jméno</label>
                                    <input class="form-control" id="exampleFloatingLabel9" type="text"
                                        value="{{ Auth::user()->firstname }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="floating-label">
                                    <label for="exampleFloatingLabel9">Příjmení</label>
                                    <input class="form-control" id="exampleFloatingLabel9" type="text"
                                        value="{{ Auth::user()->lastname }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
