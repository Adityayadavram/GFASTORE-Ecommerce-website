<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
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
    <nav
        class="navbar navbar-expand-lg p-2"
        style="background-color: #151515; color: #ffffff">
        <div class="container-fluid">
            <!-- Logo on the left -->
            <a class="navbar-brand text-light" href="#">
                <img src="/images/logo.png" alt="Logo" height="25">
            </a>

            <!-- Toggler button for mobile view -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <img class="navbar-toggler-icon" src="/images/icons/hamburger.png" alt="">
            </button>

            <!-- Navbar links on the right -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('products')}}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item">


                    <!-- <a class="nav-link text-light" href="{{ route('logout') }}">Logout</a> -->


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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest




                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <section class="slider">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="/images/athlete0.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: white;">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/images/athlete1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: white;">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/images/athlete0.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: white;">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <img style="width: 50px;" src="/images/icons/left-arrow.png" alt="">
                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->

                <!-- <span class="visually-hidden">Previous</span> -->
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                <img style="width: 50px;" src="/images/icons/right-arrow.png" alt="">
                <!-- <span class="visually-hidden">Next</span> -->
            </button>
        </div>
    </section>





    <section class="products py-5">
        <div class="container-xxl ">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="heading-h2">PRODUCTS FOR ATHLETES</h2>
                <a href="product.html">
                    <img src="/images/right arrow.png" alt="Arrow" />
                </a>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-3 ">
                    <div class="product-item text-center">
                        <div class="product-img-cont mb-3">
                            <img src="/images/wrist_band.png" alt="Gym Wrist Band" class="img-fluid" />
                        </div>
                        <p>Gym Wrist Band - Base Color Style</p>
                    </div>
                </div>

                <div class="col-12 col-md-3 ">
                    <div class="product-item text-center">
                        <div class="product-img-cont mb-3">
                            <img src="/images/wrist_band.png" alt="Gym Wrist Band" class="img-fluid" />
                        </div>
                        <p>Gym Wrist Band</p>
                    </div>
                </div>

                <div class="col-12 col-md-3 ">
                    <div class="product-item text-center">
                        <div class="product-img-cont mb-3">
                            <img src="/images/towelImg.jpg" alt="Bamboo Towel" class="img-fluid" />
                        </div>
                        <p>Bamboo Towel</p>
                    </div>
                </div>

                <div class="col-12 col-md-3 ">
                    <div class="product-item text-center">
                        <div class="product-img-cont mb-3">
                            <img src="/images/towel2.jpg" alt="Bamboo Towel" class="img-fluid" />
                        </div>
                        <p>Bamboo Towel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="promo-video py-5">
        <div class="container text-center">
            <iframe
                width="100%"
                height="500"
                src="https://www.youtube.com/embed/CID-sYQNCew?si=ZxdDG6vJhG5MzRRf"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </section>











    <footer class="bg-dark text-white py-4">
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










    <!-- <script src="script.js"></script> -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>