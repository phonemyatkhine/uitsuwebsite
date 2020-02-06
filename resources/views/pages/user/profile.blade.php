@extends('layouts.main')

@section('main')
<div class="container" id="profile-section">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="border">
                <img src="https://api.adorable.io/avatars/225/abott@adorable.png" class="card-img-top" alt="...">
                <div class="card-body profile-info">
                    <dl>
                        @if($user->phone_number != null)
                        <dt><i class="fas fa-mobile-alt"></i></dt>
                        <dd><a href="tel:{{$user->phone_number}}">{{$user->phone_number}}</a></dd>
                        @endif
                        <dt><i class="far fa-envelope"></i></dt>
                        <dd><a href="mailto:{{$user->email}}">{{ $user->email }}</a></dd>
                    </dl>
                </div>
                {{-- <div class="card-footer contact-info">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-desription-content">
                <!-- list feature box -->
                <div class="list-feature-box">
                    <h3>
                        {{ $user->name }}
                        <a class="float-right" id="copy_url" data-toggle="tooltip" data-placement="top" title="click to copy profile URL"><i class="fas fa-link"></i></a>
                    </h3>
                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url" value="{{ url("/profile/".$user->id) }}">
                    <script>
                        document.getElementById("copy_url").addEventListener('click', (e) => {
                            e.preventDefault();
                            var copyText = document.getElementById("url");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999);
                            document.execCommand("copy");
                        });
                    </script>
                    <ul class="list-unstyled listDefault">
                        <li>Role: {{ App\Role::where('level', $user->role)->first()->name }}</li>
                        @if($user->committee != null)
                        <li>Committee: {{ App\Committee::where('id', $user->committee)->first()->name }}</li>
                        @endif
                        @if($user->club != null)
                        <li>Club: {{ App\Club::where('id', $user->club)->first()->name }}</li>
                        @endif
                    </ul>
                </div>
                @if($user->biography != null)
                <div class="mb-5">
                    <h3 class="fw-semi">Biography</h3>
                    <p>{{ $user->biography }}</p>
                </div>
                @endif
                @if(Auth::user()->id == $user->id)
                <h1 class="fw-semi font-24 mb-4">Update User Information</h1>
                <form action="/profile/info/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" name="student_id" id="student_id" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" value="{{ $user->student_id }}" placeholder="Student ID">
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('student_id') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="bio">Biography</label>
                        <textarea name="bio" id="bio" rows="5" class="form-control" placeholder="Enter your bio">{{ $user->biography }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ $user->phone_number }}" placeholder="Phone Number">
                    </div>
                    <button type="submit" class="btn custom-btn">Save</button>
                </form>
                <h1 class="fw-semi font-24 my-4">Update Passwords</h1>
                <form action="/profile/passwd" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current">Current Passwords</label>
                        <input type="password" name="current" id="current" class="form-control{{ $errors->has('current') ? ' is-invalid' : '' }}" placeholder="Current Passwords">
                        @if ($errors->has('current'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('current') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Current Passwords</label>
                        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Passwords">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Verify New Passwords</label>
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control" placeholder="Verify New Passwords">
                    </div>
                    <button type="submit" class="btn custom-btn">Update</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('add-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js" integrity="sha256-bQTfUf1lSu0N421HV2ITHiSjpZ6/5aS6mUNlojIGGWg=" crossorigin="anonymous"></script>
@endsection

@section('add-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css" integrity="sha256-/n6IXDwJAYIh7aLVfRBdduQfdrab96XZR+YjG42V398=" crossorigin="anonymous" />
@endsection