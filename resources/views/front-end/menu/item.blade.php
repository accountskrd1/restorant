@extends('front-end.index')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>

<!-- Menu Item Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-start wow fadeInUp" data-wow-delay="0.1s">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menu.category', $item->category_id) }}">{{ $item->category->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $item->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-6">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" 
                         alt="{{ $item->name }}" 
                         class="img-fluid rounded shadow">
                @else
                    <img src="{{ asset('design/img/menu-default.jpg') }}" 
                         alt="{{ $item->name }}" 
                         class="img-fluid rounded shadow">
                @endif
            </div>
            <div class="col-lg-6">
                <div class="item-details">
                    <h1 class="mb-3">{{ $item->name }}</h1>
                    <h3 class="text-primary mb-4">${{ number_format($item->price, 2) }}</h3>
                    
                    @if($item->description)
                        <p class="mb-4 lead">{{ $item->description }}</p>
                    @endif

                    @if($item->ingredients)
                        <div class="mb-4">
                            <h5>Ingredients</h5>
                            <p class="text-muted">{{ $item->ingredients }}</p>
                        </div>
                    @endif

                    <div class="item-meta mb-4">
                        @if($item->preparation_time)
                            <span class="badge bg-info me-2">⏱️ {{ $item->preparation_time }} min</span>
                        @endif
                        @if($item->is_featured)
                            <span class="badge bg-warning text-dark">⭐ Featured</span>
                        @endif
                    </div>

                    <div class="d-flex gap-3">
                        <button class="btn btn-primary btn-lg">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Order
                        </button>
                        <button class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-heart me-2"></i>Favorite
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Items -->
        @if($relatedItems->count() > 0)
        <div class="mt-5 pt-5 border-top">
            <h3 class="mb-4">Related Items</h3>
            <div class="row g-4">
                @foreach($relatedItems as $relatedItem)
                <div class="col-lg-3 col-md-6">
                    <div class="related-item-card" onclick="window.location='{{ route('menu.item', $relatedItem->id) }}'" style="cursor: pointer;">
                        @if($relatedItem->image)
                            <img src="{{ asset('storage/' . $relatedItem->image) }}" 
                                 alt="{{ $relatedItem->name }}" 
                                 class="img-fluid rounded mb-3" style="height: 150px; width: 100%; object-fit: cover;">
                        @else
                            <img src="{{ asset('design/img/menu-default.jpg') }}" 
                                 alt="{{ $relatedItem->name }}" 
                                 class="img-fluid rounded mb-3" style="height: 150px; width: 100%; object-fit: cover;">
                        @endif
                        <h6 class="mb-1">{{ $relatedItem->name }}</h6>
                        <p class="text-primary mb-0">${{ number_format($relatedItem->price, 2) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('menu.category', $item->category_id) }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to {{ $item->category->name }}
            </a>
        </div>
    </div>
</div>
<!-- Menu Item End -->

<style>
.item-details {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
}

.related-item-card {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.related-item-card:hover {
    transform: translateY(-5px);
}
</style>

@endsection