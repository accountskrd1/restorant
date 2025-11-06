<style>
    /* RTL Support */
    [dir="rtl"] .form-control {
        text-align: right;
    }

    [dir="rtl"] .input-group {
        flex-direction: row-reverse;
    }

    [dir="rtl"] .btn-social {
        margin-left: 0;
        margin-right: 5px;
    }

    /* Back to top button RTL */
    .back-to-top {
        left: 30px;
        right: auto;
    }
</style>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Company Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-end text-primary fw-normal mb-4">کۆمپانیا</h4>
                <div class="d-flex flex-column text-end">
                    <a class="btn btn-link text-light text-decoration-none mb-2 pr-2" href="{{ url('/about') }}">دەربارەی ئێمە</a>
                    <a class="btn btn-link text-light text-decoration-none mb-2" href="{{ url('/contact') }}">پەیوەندیمان پێوە بکە</a>
                    <a class="btn btn-link text-light text-decoration-none mb-2" href="{{ url('/booking') }}">پشکنین</a>
                    <a class="btn btn-link text-light text-decoration-none mb-2" href="">سیاسەتی تایبەتمەندی</a>
                    <a class="btn btn-link text-light text-decoration-none mb-2" href="">مەرج و ڕێساکان</a>
                </div>
            </div>
            
            <!-- Contact Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-end text-primary fw-normal mb-4">پەیوەندیمان پێوە بکە</h4>
                <div class="d-flex flex-column text-end">
                    <p class="mb-2 d-flex align-items-center justify-content-end">
                        <i class="fa fa-map-marker-alt ms-3"></i>١٢٣ شەقام، هەولێر، کوردستان
                    </p>
                    <p class="mb-2 d-flex align-items-center justify-content-end">
                        <i class="fa fa-phone-alt ms-3"></i>+٠٧٥٠ ١٢٣ ٤٥٦٧
                    </p>
                    <p class="mb-2 d-flex align-items-center justify-content-end">
                        <i class="fa fa-envelope ms-3"></i>info@restorantkrd.com
                    </p>
                    <div class="d-flex justify-content-end pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Opening Hours Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-end text-primary fw-normal mb-4">کاتەکانی کار</h4>
                <div class="d-flex flex-column text-end">
                    <h6 class="text-light fw-normal mb-1">دووشەممە - شەممە</h6>
                    <p class="mb-3">٩:٠٠ ب.ن - ١٠:٠٠ د.ن</p>
                    <h6 class="text-light fw-normal mb-1">یەکشەممە</h6>
                    <p>١١:٠٠ ب.ن - ١١:٠٠ د.ن</p>
                </div>
            </div>
            
            <!-- Newsletter Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-end text-primary fw-normal mb-4">هەواڵنامە</h4>
                <div class="d-flex flex-column text-end">
                    <p class="mb-3">خۆت تۆمار بکە لە هەواڵنامەکەمان بۆ وەرگرتنی نوێترین پێشکەشەکان و نوێکاریەکان</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <div class="input-group">
                            <input class="form-control border-primary w-100 py-3 ps-5 pe-3 text-end" type="text" placeholder="ئیمەیڵەکەت" dir="rtl">
                            <button type="button" class="btn btn-primary py-3 px-4 position-absolute start-0 top-0">تۆماربوون</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright Section -->
    <div class="container">
        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-end mb-3 mb-md-0">
                    <span class="text-light">
                        &copy; <a class="text-light text-decoration-none border-bottom" href="{{ url('/') }}">رێستۆران</a>, 
                        هەموو مافەکان پارێزراون.
                    </span>
                    <br>
                    <small class="text-muted">
                     لەلایەن <a class="text-muted text-decoration-none" href="https://www.dalivenkari.com">Deliven Kari</a>
                    </small>
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <div class="footer-menu">
                        <a class="text-light text-decoration-none me-3" href="{{ url('/') }}">سەرەکی</a>
                        <a class="text-light text-decoration-none me-3" href="">کوکیز</a>
                        <a class="text-light text-decoration-none me-3" href="">یارمەتی</a>
                        <a class="text-light text-decoration-none" href="">پرسیارە باوەکان</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top position-fixed" style="bottom: 30px; left: 30px;">
    <i class="bi bi-arrow-up"></i>
</a>

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
</body>
</html>