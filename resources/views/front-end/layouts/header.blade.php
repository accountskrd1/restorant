<!DOCTYPE html>
<html lang="ckb" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>رێستۆران - شابلۆنی رێستۆران بە بۆتستراپ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('design/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('design/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('design/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('design/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('design/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">بارکردن...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>رێستۆران</h1>
                    <!-- <img src="{{ asset('img/logo.png') }}" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">سەرەکی</a>
                        <a href="{{ url('/about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">دەربارە</a>
                        <a href="{{ url('/service') }}" class="nav-item nav-link {{ request()->is('service') ? 'active' : '' }}">خزمەتگوزاری</a>
                        <a href="{{ url('/menu') }}" class="nav-item nav-link {{ request()->is('menu') || request()->is('menu/*') ? 'active' : '' }}">مێنیو</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{ request()->is('booking') || request()->is('team') || request()->is('testimonial') ? 'active' : '' }}" data-bs-toggle="dropdown">پەڕەکان</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/booking') }}" class="dropdown-item {{ request()->is('booking') ? 'active' : '' }}">پشکنینی خواردن</a>
                                <a href="{{ url('/team') }}" class="dropdown-item {{ request()->is('team') ? 'active' : '' }}">تیمی ئێمە</a>
                                <a href="{{ url('/testimonial') }}" class="dropdown-item {{ request()->is('testimonial') ? 'active' : '' }}">ڕەخنەکان</a>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">پەیوەندی</a>
                    </div>
                    <a href="{{ url('/booking') }}" class="btn btn-primary py-2 px-4">مێز رەزەروە کە</a>
                </div>
            </nav>

            <!-- Add your hero section content here -->

        </div>
        <!-- Navbar & Hero End -->

        <!-- Content will go here -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('design/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('design/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('design/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('design/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('design/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('design/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('design/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('design/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('design/js/main.js') }}"></script>
    </div>
