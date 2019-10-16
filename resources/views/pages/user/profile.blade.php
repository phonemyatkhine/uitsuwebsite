@extends('layouts.main')

@section('main')
<div class="container" id="profile-section">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="border">
                <img src="https://api.adorable.io/avatars/225/abott@adorable.png" class="card-img-top" alt="...">
                <div class="card-body profile-info">
                    <dl>
                        <dt><i class="fas fa-mobile-alt"></i></dt>
                        <dd><a href="tel:+611234567890">+(61) 123 456 7890</a></dd>
                        <dt><i class="fas fa-phone fa-flip-horizontal"></i></dt>
                        <dd><a href="tel:+611234567890">+(61) 123 456 7890</a></dd>
                        <dt><i class="far fa-envelope"></i></dt>
                        <dd><a href="mailto:Example@domain.com">Example@domain.com</a></dd>
                    </dl>
                </div>
                <div class="card-footer contact-info">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-desription-content">
                <!-- list feature box -->
                <div class="list-feature-box">
                    <h3>{{ $user->name }}</h3>
                    <ul class="list-unstyled listDefault">
                        <li>Role: Technical Volunteer</li>
                        @if($user->committee != null)
                        <li>Committee: {{ $user->committee }}</li>
                        @endif
                        @if($user->club != null)
                        <li>Club: {{ $user->club }}</li>
                        @endif
                        @if($user->birthday != null)
                        <li>Birthday: {{ $user->birthday }}</li>
                        @endif
                    </ul>
                </div>
                @if($user->biography != null)
                <h3>Biography</h3>
                <p>{{ $user->biography }}</p>
                @else
                <p>Nothing Specified to show :')</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection