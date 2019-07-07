<div class="card-header">
    <h3>@lang('messages.sign_up_header')</h3>
</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row form-group">
            <div class="sign-up-firstname col">
                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                    name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus
                    placeholder="@lang('messages.sign_up_placeholder_firstname')">

                @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="sign-up-lastname col">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus
                    placeholder="@lang('messages.sign_up_placeholder_lastname')">

                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="input-group form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email"
                placeholder="@lang('messages.sign_up_placeholder_username')">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password"
                placeholder="@lang('messages.sign_up_placeholder_password')">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password" placeholder="@lang('messages.sign_up_placeholder_password_confirm')">
        </div>
        <div class="form-group">
            <button type="submit" class="btn float-right introduction-btn">@lang('messages.sign_up_button')</button>
        </div>
    </form>
</div>
