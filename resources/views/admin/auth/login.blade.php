@extends('admin.layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="login-container">
            <h1>Login </h1>
            <form id="loginForm" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    <div class="input-group-append py-4 px-3" style="border: 1px solid rgb(206, 202, 202)">
                        <span class="toggle-password" style="cursor: pointer;"
                            onclick="togglePasswordVisibility()">👁️</span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="rememberMe">Remember Me</label>
                </div>
                <button type="submit" class="login-button">LOGIN</button>
            </form>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Your password?</a>
            @endif
        </div>


        </div>

        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.querySelector('.toggle-password');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.textContent = '🙈'; // Eye closed icon
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.textContent = '👁️'; // Eye open icon
                }
            }
        </script>
    @endsection
