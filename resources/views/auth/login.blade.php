@extends('layouts.main')

@section('main')
<div id="login-section">
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="row align-self-center">
                <div class="container" id="login-form-container">
                    <h1>Login Please to Continue</h1>
                    <form class="mb-3">
                        <div class="md-form">
                            <input type="email" id="email" class="form-control" autofocus>
                            <label for="email">Email Address</label>
                        </div>
                        <div class="md-form">
                            <input type="password" id="password" class="form-control">
                            <label for="password">Passwords</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-4">
                            <input type="checkbox" class="custom-control-input" id="remember">
                            <label class="custom-control-label" for="remember">Remeber Login</label>
                        </div>
                        <button class="btn btn-outline-light d-block ml-0">Login</button>
                    </form>
                    <a href="/register" id="register-btn">Don't have an account? Register Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection