@extends('layouts.master')

@section('content')
<div class="card mb-3">
    <div class="card-header krasojizda-bg">Profil uživatele</div>

    <div class="card-body">
        <div class="content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="{{ asset('img/avatar_2x.png') }}" class="avatar img-circle img-thumbnail"
                            alt="avatar">
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="text-center center-block file-upload">
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item "><span class="pull-left"><strong>Shares</strong></span>
                            125</li>
                        <li class="list-group-item"><span class="pull-left"><strong>Likes</strong></span>
                            13</li>
                        <li class="list-group-item"><span class="pull-left"><strong>Posts</strong></span>
                            37</li>
                        <li class="list-group-item"><span class="pull-left"><strong>Followers</strong></span>
                            78</li>
                    </ul>

                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="floating-label">
                            <label for="exampleFloatingLabel9">Email</label>
                            <input class="form-control" id="exampleFloatingLabel9" type="email"
                                value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="floating-label">
                                    <label for="exampleFloatingLabel9">Jméno</label>
                                    <input class="form-control" id="exampleFloatingLabel9" type="text"
                                        value="{{ Auth::user()->firstname }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="floating-label">
                                    <label for="exampleFloatingLabel9">Jméno</label>
                                    <input class="form-control" id="exampleFloatingLabel9" type="text"
                                        value="{{ Auth::user()->lastname }}">
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
