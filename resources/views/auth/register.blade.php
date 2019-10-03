@extends('layouts.main')

@section('main')
<div id="register-section">
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="row align-self-center">
                <div class="container" id="register-form-container">
                    <h1>Register Here</h1>
                    <form id="register-form" class="mb-3">
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
                            <input type="text" id="student_id" class="form-control" name="student_id" value="{{ old('student_id') }}" required>
                            <label for="student_id">Student ID</label>
                            <div class="invalid-feedback">
                                <strong id="student_id_error_feedback"></strong>
                            </div>
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

@section('add-js')
<script>
    var shouldSubmit = false;
    $('#student_id').on('input', (e) => {
        var value = $('#student_id').val();
        var pattern = /^\d[A-Za-z]{2,3}-\d+$/;
        if( !pattern.test(value) ) {
            $('#student_id').addClass('is-invalid');
            $('#student_id_error_feedback').text("Invalid Student ID");
            shouldSubmit = false;
        } else {
            $('#student_id').removeClass('is-invalid');
            $('#student_id_error_feedback').text('');
            shouldSubmit = true;
        }
    });
    $('#register-form').submit((e) => {
        if(!shouldSubmit) {
            e.preventDefault();
            if( $('#student_id').hasClass('is-invalid') ) {
                $('#student_id').focus();
            }
        }
    })
</script>
@endsection