@extends('front-end.index')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>

<!-- Category Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </nav>
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">{{ $category->name }}</h5>
            <h1 class="mb-3">Paucek and Lage Restaurant</h1>
            @if($category->description)
                <p class="lead mb-5">{{ $category->description }}</p>
            @endif
        </div>

        <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">
            @forelse($items as $item)
            <div class="col-lg-6">
                <div class="menu-item-card" onclick="window.location='{{ route('menu.item', $item->id) }}'" style="cursor: pointer;">
                    <div class="d-flex align-items-center">
                        @if($item->image)
                            <img class="flex-shrink-0 img-fluid rounded" 
                                 src="{{ asset('storage/' . $item->image) }}" 
                                 alt="{{ $item->name }}" 
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img class="flex-shrink-0 img-fluid rounded" 
                                 src="{{ asset('design/img/menu-default.jpg') }}" 
                                 alt="{{ $item->name }}" 
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                        <div class="w-100 d-flex flex-column text-end pe-4">
                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                <span class="text-primary">${{ number_format($item->price, 2) }}</span>
                                <span>{{ $item->name }}</span>
                                @if($item->is_featured)
                                    <span class="badge bg-warning text-dark ms-2">⭐ Featured</span>
                                @endif
                            </h5>
                            <small class="fst-italic">
                                @if($item->description)
                                    {{ Str::limit($item->description, 80) }}
                                @else
                                    Delicious menu item
                                @endif
                            </small>
                            @if($item->preparation_time)
                                <small class="text-muted mt-1">⏱️ {{ $item->preparation_time }} minutes</small>
                            @endif
                            @if($item->ingredients)
                                <small class="text-muted mt-1">📋 {{ Str::limit($item->ingredients, 50) }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning">
                    <h5>No items available in this category</h5>
                    <p class="mb-0">Please check back later.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('menu.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to All Categories
            </a>
        </div>

        <!-- Restaurant Info -->
        <div class="text-center mt-5 pt-4 border-top">
            <p class="mb-1">123-456-7890</p>
            <p class="mb-0">123 Anywhere St., Any City</p>
        </div>
    </div>
</div>
<!-- Category Menu End -->

<style>
.menu-item-card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 20px;
}

.menu-item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
}
</style>

@endsection