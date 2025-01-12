<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Buy</title>
    <link rel="icon" href="/images/icons/GFA-favicon.png" type="image/x-icon" >

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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



    <section class="product-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" id="productImage" src="{{ asset($product->image_path) }}" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1 id="productName" class="product-title">{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <div class="product-rating mb-3">
                        <!-- Replace with dynamic rating if available -->
                        <span>{{ $product->rating }} ★★★★★</span>
                        <span>({{ $product->ratings_count }} ratings)</span>
                    </div>
                    <div class="product-price">
                        <!-- Format the price properly -->
                        <span class="discounted-price">₹{{ number_format($product->price, 2) }}</span>
                    </div>
                    <div class="button-cont mt-3">
                        <!-- Add action for Buy Now if needed -->
                        <button class="btn btn-primary">Buy Now</button>

                        <!-- Add to Cart form -->
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="bg-black text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-logo mb-3">
                        <img src="/images/logo.png" alt="GFA Logo" />
                    </div>
                    <p>
                        GFA is a premium sports accessories brand proudly made in BHARAT
                        <img style="width: 2rem;" src="/images/icons/flag.png" alt="" />
                    </p>
                    <div class="footer-contact">
                        <p><span class="contact-icon">📞</span>+91 91311 36285</p>
                        <p><span class="contact-icon">✉️</span>gfastore96@gmail.com</p>
                        <p><span class="contact-icon">📍</span>2nd Floor, H. No. 707 Pawan Bhoomi, Shakti Nagar, Jabalpur M.P 482001</p>
                    </div>
                    <div class="footer-social">
                        <a target="_blank" href="https://www.instagram.com/gfastore.in/"><img class="social-icon" style="width: 3rem;" src="/images/icons/instagram-icon.png" alt="" /></a>
                        <a target="_blank" href="https://x.com/gfastore_in?t=-0pkl6PSdkIUuX0tcUUn0Q&s=08"><img style="width: 3rem;" class="social-icon" src="/images/icons/X-icon.png" alt="" /></a>
                        <a target="_blank" href="https://www.facebook.com/gfastore.in?mibextid=kFxxJD"><img style="width: 3rem;" class="social-icon" src="/images/icons/facebook-icon.png" alt="" /></a>
                        <a target="_blank" href="https://youtube.com/channel/UCO4KDYvVDInlLcgOZT6JUUA?si=v1_Fya2Kqtt7F57U"><img style="width: 3rem;" class="social-icon" src="/images/icons/youtube-icon.png" alt="" /></a>
                        <a target="_blank" href="https://wa.me/919131136285"><img style="width: 3rem;" class="social-icon" src="/images/icons/whatsapp-icon.png" alt="" /></a>
                        <a target="_blank" href="https://www.threads.net/@gfastore.in"><img style="width: 3rem;" class="social-icon" src="/images/icons/threads.png" alt="" /></a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Shop</h4>
                            <p>Wrist Band</p>
                            <p>Supporter</p>
                            <p>Face Towel</p>
                            <p>Bench Towel</p>
                            <p>Sweat Head Band</p>
                            <p>Sweat Hand Band</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Customer Support</h4>
                            <p>Shipping Policy</p>
                            <p>Refund Policy</p>
                            <p>Returns & Exchange</p>
                            <p>Refund Policy</p>
                            <p>T&C of Service</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Company</h4>
                            <p>Our Story</p>
                            <p>Contact Us</p>
                            <p>Sitemap</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Downloads</h4>
                            <p>Product Catalog</p>
                            <p>Brand Style Guide</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center mt-4">
                <p>©2024 <span>Gear For Athlete</span> Pvt. Ltd. | All rights reserved</p>
                <p>We use cookies on our site. Please read more about cookies policy here.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>