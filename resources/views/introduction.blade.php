@extends('layouts.master')

@section('title')
    @lang('messages.krasojizda_name')
@endsection

@section('content')
    <div id="introduction">
        <div class="introduction-header">
            <h1>@lang('messages.krasojizda_name')</h1>
            <h2>@lang('messages.krasojizda_description')</h2>
        </div>

        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#sign-in">@lang('messages.sign_in_tab')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#sign-up">@lang('messages.sign_up_tab')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="sign-in" class="container tab-pane active"><br>
                        @include('auth.login')
                    </div>

                    <div id="sign-up" class="container tab-pane fade"><br>
                        @include('auth.register')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection