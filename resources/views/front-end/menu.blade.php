@extends('front-end.index')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>

<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">مێنیوی خواردن</h5>
            <h1 class="mb-5">بابەتە بەناوبانگەکان</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <i class="fa fa-bolt fa-2x text-primary"></i>
                        <div class="pe-3">
                            <small class="text-body">خێرا</small>
                            <h6 class="mt-n1 mb-0">خواردنی خێرا</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fa fa-star fa-2x text-primary"></i>
                        <div class="pe-3">
                            <small class="text-body">تایبەت</small>
                            <h6 class="mt-n1 mb-0">بەناوبانگ</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="pe-3">
                            <small class="text-body">سەرەکی</small>
                            <h6 class="mt-n1 mb-0">خواردنی سەرەکی</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Tab 1: Quick Items -->
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse($quickItems as $item)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                @if($item->image)
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('design/img/menu-' . (($loop->index % 8) + 1) . '.jpg') }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                                <div class="w-100 d-flex flex-column text-end pe-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span class="text-primary">{{ number_format($item->price, 2) }} د.ع</span>
                                        <span>{{ $item->name }}</span>
                                    </h5>
                                    <small class="fst-italic">
                                        @if($item->description)
                                            {{ Str::limit($item->description, 60) }}
                                        @else
                                            وەسفی کورتی خواردن
                                        @endif
                                    </small>
                                    <small class="text-muted mt-1">⚡ {{ $item->preparation_time }} خولەک</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">هیچ خواردنی خێرا بەردەست نیە</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Tab 2: Special Items -->
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse($specialItems as $item)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                @if($item->image)
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('design/img/menu-' . (($loop->index % 8) + 1) . '.jpg') }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                                <div class="w-100 d-flex flex-column text-end pe-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span class="text-primary">{{ number_format($item->price, 2) }} د.ع</span>
                                        <span>{{ $item->name }}</span>
                                        <span class="badge bg-warning text-dark">⭐</span>
                                    </h5>
                                    <small class="fst-italic">
                                        @if($item->description)
                                            {{ Str::limit($item->description, 60) }}
                                        @else
                                            وەسفی کورتی خواردن
                                        @endif
                                    </small>
                                    <small class="text-muted mt-1">⏱️ {{ $item->preparation_time }} خولەک</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">هیچ خواردنی تایبەت بەردەست نیە</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Tab 3: Main Items -->
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse($mainItems as $item)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                @if($item->image)
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('storage/' . $item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <img class="flex-shrink-0 img-fluid rounded" 
                                         src="{{ asset('design/img/menu-' . (($loop->index % 8) + 1) . '.jpg') }}" 
                                         alt="{{ $item->name }}" 
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                                <div class="w-100 d-flex flex-column text-end pe-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span class="text-primary">{{ number_format($item->price, 2) }} د.ع</span>
                                        <span>{{ $item->name }}</span>
                                    </h5>
                                    <small class="fst-italic">
                                        @if($item->description)
                                            {{ Str::limit($item->description, 60) }}
                                        @else
                                            وەسفی کورتی خواردن
                                        @endif
                                    </small>
                                    <small class="text-muted mt-1">⏱️ {{ $item->preparation_time }} خولەک</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">هیچ خواردنی سەرەکی بەردەست نیە</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

@endsection