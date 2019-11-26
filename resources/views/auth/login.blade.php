@extends('layouts.main')

@section('main')
<div id="login-section">
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="row align-self-center">
                <div class="container" id="login-form-container">
                    <h1>Login to Continue</h1>
                    <form class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="md-form">
                            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label for="email">Email Address</label>
                        </div>
                        <div class="md-form">
                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <label for="password">Passwords</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input type="checkbox" class="custom-control-input" id="remember"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">Remember Login</label>
                        </div>
                        <button class="btn btn-outline-light d-block ml-0">Login</button>
                    </form>
                    @if(Route::has('register'))
                    <a href="/register" id="register-btn">Don't have an account? Register Here</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
