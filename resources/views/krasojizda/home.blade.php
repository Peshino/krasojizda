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


        @if ($hasLoggedUserKrasojizda)
        mám Krasojízdu
        @else
        <p>Nyní je třeba vytvořit Krasojízdu se svou drahou druhou polovičkou.</p>
        <p>Vyhledejte partnera dle emailu, na který má registrovaný svůj profil:</p>

        <form id="search-partner-form">
            @csrf
            <div class="input-group">
                <input type="email" name="search_partner_input"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('search_partner_input') }}"
                    required placeholder="@lang('messages.search_partner_placeholder')">
                <div class="input-group-append">
                    <button class="btn btn-secondary search-partner-submit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div id="search-partner-result">
        </div>
        @endif
    </div>
</div>
@endsection
