@extends('front-end.index')
@section('content')
 <div class="container-xxl py-5 bg-dark hero-header mb-5">
 
    </div>
    <!-- Testimonial Start -->
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
@endsection