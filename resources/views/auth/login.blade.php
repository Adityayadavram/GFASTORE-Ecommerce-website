<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/icons/GFA-favicon.png" type="image/x-icon" >

    <title>Login Page</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            /* background-color: #f9f9f9; */
        }

        
        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-bottom: none;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #FF4800;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #FF4800;
            border-color: #FF4800;
        }

        .btn-primary:hover {
            background-color: #d63c00;
            border-color: #d63c00;
        }

        .navbar-brand img {
            max-height: 30px;
        }

        .navbar-toggler {
            border: none;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg p-2" style="background-color: #151515; color: #ffffff">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="/">
            <img src="/images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <img src="/images/icons/hamburger.png" alt="Menu Icon" class="navbar-toggler-icon">
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-light" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="{{route('products')}}">Product</a></li>
                <!-- <li class="nav-item"><a class="nav-link text-light" href="#">About</a></li> -->
                @guest
    @if (Route::currentRouteName() === 'login')
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
            </li>
        @endif
    @elseif (Route::currentRouteName() === 'register')
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
            </li>
        @endif
    @endif
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" data-bs-toggle="dropdown">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->surname, 0, 1)) }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><strong class="dropdown-item">{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </li>
@endguest

            </ul>
        </div>
    </div>
</nav>

<!-- Login Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-header text-center  text-white">
                    {{ __('Login') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                            @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
