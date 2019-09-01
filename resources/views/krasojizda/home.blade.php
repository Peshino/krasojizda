@extends('layouts.master')

@section('content')
<div class="card mb-3">
    <div class="card-header krasojizda-bg">@lang('messages.homepage')</div>

    <div class="card-body">
        <div class="content text-center">
            @if ($loggedUserInviterResultInvitation !== null)
            <div id="invitation-result" class="mb-3">
                {{ $loggedUserInviterResultInvitation->id }}
                {{ $loggedUserInviterResultInvitation->result }}

                <form id="invitation-result-form"
                    action="{{ route('invitations.update', $loggedUserInviterResultInvitation->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="input-group">
                        <button id="confirmator-id" name="confirmator_id" type="submit" value="{{ Auth::user()->id }}"
                            class="btn btn-primary">
                            Rozumím
                        </button>
                    </div>
                </form>
            </div>
            @endif

            @if ($loggedUserKrasojizdaId !== null)
            <h2>{{ $loggedUserKrasojizdaName }}</h2>

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
            @if ($invitationReceiver !== null)
            Pozvánka odeslána na uživatele {{ $invitationReceiver->fullname }} s IDčkem pozvánky
            {{ $loggedUserInviterInvitation->id }}
            @if ($invitationReceiver->krasojizda_id !== null)
            - Uživatel už má svoji Krasojízdu
            @endif
            <form method="POST" action="{{ route('invitations.update', $loggedUserInviterInvitation->id) }}">
                @method('PATCH')
                @csrf
                <div class="input-group">
                    <button name="result" type="submit" value="withdrawn" class="btn btn-primary">
                        Stáhnout pozvánku
                    </button>
                </div>
            </form>
            @elseif ($invitationInviter !== null)
            Obdržena pozvánka od uživatele {{ $invitationInviter->fullname }} s IDčkem pozvánky
            {{ $loggedUserReceiverInvitation->id }}

            <form method="POST" action="{{ route('invitations.update', $loggedUserReceiverInvitation->id) }}">
                @method('PATCH')
                @csrf
                <div class="input-group">
                    <button name="result" type="submit" value="accepted" class="btn btn-primary">
                        Přijmout
                    </button>
                    :
                    <button name="result" type="submit" value="rejected" class="btn btn-primary">
                        Odmítnout
                    </button>
                </div>
            </form>
            @else
            <p>Nyní je třeba vytvořit Krasojízdu se svou drahou druhou polovičkou.</p>
            <p>Vyhledejte partnera dle emailu, na který má registrovaný svůj profil:</p>

            <form id="search-partner-form" action="{{ route('searchPartnerAjaxPost') }}">
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

            <div id="search-partner-result" class="card d-none m-auto m-10">
                <div class="card-body">
                    {{-- <img class="img-fluid" src="{{ asset('img/me_2.jpg') }}" alt="Card image cap"> --}}
                    <h4 class="card-title" id="receiver-name"></h4>
                    <form id="invite-partner-to-krasojizda-form" method="POST"
                        action="{{ route('invitations.store') }}">
                        @csrf
                        <div class="input-group">
                            <input id="inviter-id" name="inviter_id" type="hidden" value="{{ Auth::user()->id }}" />
                            <input id="receiver-id" name="receiver_id" type="hidden" value="" />
                            <button id="invite-partner-to-krasojizda-button" type="submit" class="btn btn-primary">
                                @lang('messages.invite_partner_to_krasojizda')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
