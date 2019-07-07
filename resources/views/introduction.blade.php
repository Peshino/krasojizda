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
                        <div class="card-header">
                            <h3>@lang('messages.sign_in_header')</h3>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="input-group form-group">
                                    <input type="text" class="form-control" placeholder="@lang('messages.sign_in_placeholder_username')">
                                </div>
                                <div class="input-group form-group">
                                    <input type="password" class="form-control" placeholder="@lang('messages.sign_in_placeholder_password')">
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox" class="form-control" id="remember-me"><label for="remember-me">@lang('messages.sign_in_remember_me')</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn float-right introduction-btn">@lang('messages.sign_in_button')</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="sign-up" class="container tab-pane fade"><br>
                        <div class="card-header">
                            <h3>@lang('messages.sign_up_header')</h3>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row form-group">
                                    <div class="sign-up-firstname col">
                                        <input type="text" class="form-control" placeholder="@lang('messages.sign_up_placeholder_firstname')">
                                    </div>
                                    <div class="sign-up-lastname col">
                                        <input type="text" class="form-control" placeholder="@lang('messages.sign_up_placeholder_lastname')">
                                    </div>
                                </div>
                                <div class="input-group form-group">
                                    <input type="text" class="form-control" placeholder="@lang('messages.sign_up_placeholder_username')">
                                </div>
                                <div class="input-group form-group">
                                    <input type="password" class="form-control" placeholder="@lang('messages.sign_up_placeholder_password')">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn float-right introduction-btn">@lang('messages.sign_up_button')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection