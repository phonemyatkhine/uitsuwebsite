<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="{{ asset(env('APP_LOGO')) }}" alt="UIT SU Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('cec') }}">CEC</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Clubs</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('events') }}">Events</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Committee</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('contact') }}">Contact</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('files') }}">Files</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('login') }}">Accounts</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="account" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-primary text-capitalize" aria-labelledby="account">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        {{-- @if(Auth::user()->role = 1)
                        <a class="dropdown-item" href="{{ route('admin') }}">Admin</a>
                        @endif --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
