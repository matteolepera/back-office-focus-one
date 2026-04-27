@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-box">

        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="login-logo">
        </div>

        <div class="login-card">
            <h5 class="login-title">Accedi</h5>
            <p class="login-subtitle">Inserisci le tue credenziali per continuare</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="login-label d-block">Email</label>
                    <input id="email" type="email"
                           class="form-control login-input @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}"
                           required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="login-label d-block">Password</label>
                    <input id="password" type="password"
                           class="form-control login-input @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="remember" id="remember"
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label login-check-label" for="remember">
                            Ricordami
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login-forgot">
                            Password dimenticata?
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-btn">
                    Accedi
                </button>

            </form>
        </div>

    </div>
</div>
@endsection