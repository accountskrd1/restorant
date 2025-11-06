@extends('front-end.index')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-end">
                <h1 class="display-3 text-white animated slideInRight">بەخێربێیت<br>بۆ خواردنی بەتاممان</h1>
                <p class="text-white animated slideInRight mb-4 pb-2">خواردنی بە کوالێتی، تامە بێهاوتاکان. هەر خواردنێک چیرۆکێکە کە لە یاد دەمێنێت</p>
                <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInRight">مێز پێشپار بکە</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start overflow-hidden">
                <img class="img-fluid" src="{{ asset('design/img/hero.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5>چێشتکەری مەستەر</h5>
                        <p>چێشتکەری پرۆفیشناڵ بە ئەزموون و شارەزایی بەرز</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>خواردنی کوالێتی</h5>
                        <p>ئێمە باشترین پێکهاتە و ڕێکخستنە بەتامەکان بەکاردەهێنین</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                        <h5>داواکاری سەرهێڵ</h5>
                        <p>بە ئاسانی خواردنی خۆت لە ڕێگەی پلاتفۆرمی سەرهێڵەکەمان داوا بکە</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                        <h5>خزمەتگوزاری 24/7</h5>
                        <p>خزمەتگوزاری کڕیار هەمیشە بەردەستە بۆ جێبەجێکردنی هەموو پێویستییەکانت</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('design/img/about-1.jpg') }}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('design/img/about-2.jpg') }}" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('design/img/about-3.jpg') }}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('design/img/about-4.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">دەربارەی ئێمە</h5>
                <h1 class="mb-4">بەخێربێیت بۆ <i class="fa fa-utensils text-primary me-2"></i>رێستۆران</h1>
                <p class="mb-4">ئێمە ئەزموونی خواردنی تایبەت پێشکەش دەکەین کە کۆن و نوێ لە یەک کاتدا تێکەڵ دەکات</p>
                <p class="mb-4">بە ئەزموونی ساڵان، ئێمە دەفرەبەنێک دەفرۆشین کە لەلایەن شارەزاترین چێشتکەرەوە دروست کراوە، بە بەکارهێنانی باشترین پێکهاتەکان</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-end border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="pe-4">
                                <p class="mb-0">ساڵی</p>
                                <h6 class="text-uppercase mb-0">ئەزموون</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-end border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="pe-4">
                                <p class="mb-0">چێشتکەری</p>
                                <h6 class="text-uppercase mb-0">بەناوبانگ</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">زیاتر بخوێنە</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Categories Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">کاتێگۆریەکان</h5>
            <h1 class="mb-5">جۆرە خواردنەکانمان</h1>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($categories as $category)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="category-card">
                    <a href="{{ route('menu.category', $category->id) }}" class="text-decoration-none">
                        <div class="category-image">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     class="img-fluid rounded-top">
                            @else
                                <img src="{{ asset('design/img/category-default.jpg') }}" 
                                     alt="{{ $category->name }}" 
                                     class="img-fluid rounded-top">
                            @endif
                            <div class="category-overlay">
                                <i class="fas fa-utensils fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="category-content text-center p-4">
                            <h4 class="mb-3">{{ $category->name }}</h4>
                            <p class="mb-2 text-muted">{{ $category->menu_items_count }} خواردن بەردەستە</p>
                            @if($category->description)
                                <p class="mb-0 small text-muted">{{ Str::limit($category->description, 80) }}</p>
                            @endif
                            <div class="btn btn-primary mt-3">بینینی خواردنەکان</div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h5>هیچ کاتێگۆریەک بەردەست نیە</h5>
                    <p class="mb-0">تکایە دواتر سەردانمان بکەرەوە</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- More Button -->
        @if($categories->count() >= 6)
        <div class="text-center mt-5">
            <a href="{{ route('menu.index') }}" class="btn btn-primary btn-lg">
                <i class="fa fa-arrow-left me-2"></i>بینینی هەموو کاتێگۆریەکان
            </a>
        </div>
        @endif
    </div>
</div>
<!-- Categories Section End -->

<!-- Team Start -->
<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">ئەندامانی تیم</h5>
            <h1 class="mb-5">چێشتکەری مەستەرەکانی ئێمە</h1>
        </div>
        <div class="row g-4">
            @forelse($chefs as $chef)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        @if($chef->image)
                            <img class="img-fluid" src="{{ asset('storage/' . $chef->image) }}" alt="{{ $chef->name }}" style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <img class="img-fluid" src="{{ asset('design/img/team-' . $loop->iteration . '.jpg') }}" alt="{{ $chef->name }}" style="width: 200px; height: 200px; object-fit: cover;">
                        @endif
                    </div>
                    <h5 class="mb-0">{{ $chef->name }}</h5>
                    <small>{{ $chef->position }}</small>
                    @if($chef->specialty)
                    <p class="text-muted mt-2 small">{{ $chef->specialty }}</p>
                    @endif
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h5>هیچ چێشتکەرێک بەردەست نیە</h5>
                    <p class="mb-0">تکایە دواتر سەردانمان بکەرەوە</p>
                </div>
            </div>
            @endforelse
            <a class="btn btn-primary py-3 px-5 mt-2 float-start"style="width: 20%;" href="{{route('team')}}">زیاتر بخوێنە</a>

        </div>
    </div>
</div>
<!-- Team End -->

<!--start testimontial -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" dir="rtl" >
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">ڕەخنەی کڕیاران</h5>
                <h1 class="mb-5">کڕیارەکانی ئێمە چی دەڵێن!!!</h1>
            </div>
          <div class="d-flex flex-nowrap gap-3 testimonial-scroll" dir="rtl">
    @for($i = 1; $i <= 4; $i++)
    <div class="flex-shrink-0" style="width: 300px;">
        <div class="testimonial-item bg-transparent border rounded p-4 h-100">
            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
            <p>ڕەخنەی کڕیار {{ $i }} - ئەزموونێکی بێهاوتا! خواردن بەتام بوو و خزمەتگوزاریش زۆر باش بوو.</p>
            <div class="d-flex align-items-center">
                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('design/img/testimonial-' . $i . '.jpg') }}" style="width: 50px; height: 50px;">
                <div class="ps-3">
                    <h5 class="mb-1">ناوی کڕیار {{ $i }}</h5>
                    <small>پیشە</small>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>

<style>
.testimonial-scroll {
    overflow-x: auto;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
}

.testimonial-scroll::-webkit-scrollbar {
    display: none; /* Chrome, Safari and Opera */
}
</style>

        </div>
    </div>
    <!-- Testimonial End -->
<!--start testimontial -->

<style>
.category-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    overflow: hidden;
    height: 100%;
}

.category-card:hover {
    transform: translateY(-10px);
}

.category-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.category-card:hover .category-image img {
    transform: scale(1.1);
}

.category-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.category-card:hover .category-overlay {
    opacity: 1;
}

.category-content {
    background: #fff;
}
</style>

@endsection 