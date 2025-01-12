<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GFAStore</title>
    <link rel="icon" href="/images/icons/GFA-favicon.png" type="image/x-icon" >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="responsive.css"> -->
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">




    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-2" style="background-color: #151515; color: #ffffff">
        <div class="container-fluid">
            <!-- Logo on the left -->
            <a class="navbar-brand text-light" href="/">
                <img src="/images/logo.png" alt="Logo" height="25">
            </a>

            <!-- Toggler button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img class="navbar-toggler-icon" src="/images/icons/hamburger.png" alt="">
            </button>

            <!-- Navbar links on the right -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('products') }}">Product</a>
                    </li>

                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- Display the initials of the user -->
                            <span class="profile-icon">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->surname, 0, 1)) }}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <span class="dropdown-item text-center"><strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong></span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="{{ route('cart.show') }}">My Cart</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>









    <div class="container">
        <h1>Shopping Cart</h1>
        @if ($cartItems->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td>

                        <a href="{{ route('product.show', $item->product->id) }}">
                            <img src="{{ asset($item->product->image_path) }}" alt="{{ $item->product->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                        </a>
                    </td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₹{{ $item->product->price }}</td>
                    <td>₹{{ $item->product->price * $item->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

            @else
            <p>Your cart is empty. <a href="{{ route('products') }}">Continue shopping</a>.</p>
            @endif
    </div>





























    <!-- <script src="script.js"></script> -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>