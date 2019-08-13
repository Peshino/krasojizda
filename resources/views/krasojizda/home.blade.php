@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header krasojizda-bg">@lang('messages.homepage')</div>

    <div class="card-body">
        <div class="content">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            @if ($hasLoggedUserKrasojizda)
            <h2>Krasojízda Jíři a Máši</h2>

            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-right">
                                <img class="img-fluid" src="{{ asset('img/me_2.jpg') }}" alt="Card image cap">
                                <h5 class="card-title pt-3">Jiří Pešek</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-left">
                                <img class="img-fluid" src="{{ asset('img/me_2.jpg') }}" alt="Card image cap">
                                <h5 class="card-title pt-3">Marie Drahošová</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>Nyní je třeba vytvořit Krasojízdu se svou drahou druhou polovičkou.</p>
            <p>Vyhledejte partnera dle emailu, na který má registrovaný svůj profil:</p>

            <form id="search-partner-form">
                @csrf
                <div class="input-group">
                    <input type="email" name="search_partner_input"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('search_partner_input') }}" required
                        placeholder="@lang('messages.search_partner_placeholder')">
                    <div class="input-group-append">
                        <button type="submit" class="btn float-right introduction-btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div id="search-partner-result" class="card d-none m-auto m-10">
            <div class="card-body">
                <img class="img-fluid" src="{{ asset('img/me_2.jpg') }}" alt="Card image cap">
                <h5 class="card-title" id="search-partner-name"></h5>
                <p class="card-text" id="search-partner-email"></p>
                <a href="#" class="btn btn-primary">Pozvat do Krasojízdy</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
