<!DOCTYPE html>
<html lang="DE">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <title>@yield('title')</title>
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Club App</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

<footer class="footer bg-dark text-light py-3">
    <div class="container text-center">
        &copy; 2024 Laravel Club App / Philipp Borkovic
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            @guest
                <a href="{{ route('login') }}" class="btn btn-dark">
                    <span>Login</span>
                    <i class="fa fa-sign-in ml-2" aria-hidden="true"></i>
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-dark">
                        <span>Register</span>
                        <i class="fa fa-user-plus ml-2" aria-hidden="true"></i>
                    </a>
                @endif
            @endguest

            @auth
                <div class="btn-group">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Welcome, {{ Auth::user()->name }}</span>
                        <i class="fa fa-user ml-2" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </div>
    </div>
</footer>
</body>
</html>
