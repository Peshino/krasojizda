<div class="card-header">
    <h3>@lang('messages.sign_in_header')</h3>
</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group form-group">
            <input id="email-sign-in" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="@lang('messages.sign_in_placeholder_username')">

            @if ($errors->has('email') && Session::get('last_auth_attempt') === 'login')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="input-group form-group">
            <input id="password-sign-in" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password"
                placeholder="@lang('messages.sign_in_placeholder_password')">

            @if ($errors->has('password') && Session::get('last_auth_attempt') === 'login')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="row align-items-center remember">
            <input type="checkbox" class="form-control" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="" for="remember">
                @lang('messages.sign_in_remember_me')
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn float-right introduction-btn">
                @lang('messages.sign_in_button')
            </button>
        </div>
    </form>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-center">
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            @lang('messages.sign_in_forgot_password')
        </a>
        @endif
    </div>
</div>
