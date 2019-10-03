@extends('layouts.main')

@section('main')
<div id="register-section">
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="row align-self-center">
                <div class="container" id="register-form-container">
                    <h1>Register Here</h1>
                    <form id="register-form" method="POST" action="{{ route('register') }}" class="mb-3">
                        @csrf
                        <div class="md-form">
                            <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus required>
                            <label for="name">Full Name</label>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input type="text" id="student_id" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}" required>
                            <label for="student_id">Student ID</label>
                            @if ($errors->has('student_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('student_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email">Email Address</label>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password">Passwords</label>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="md-form">
                            <input type="password" id="confirm-password" class="form-control" name="password_confirmation" required>
                            <label for="confirm-password">Confirm Passwords</label>
                        </div>
                        <button id="register-button" class="btn btn-outline-light d-block ml-0">Register</button>
                    </form>
                    <a href="/login" id="login-btn">Have account? Login Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection