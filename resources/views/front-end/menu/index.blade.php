@extends('front-end.index')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
</div>

<!-- Menu Categories Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Paucek and Lage Restaurant</h1>
            <p class="mb-5">Choose from our delicious categories</p>
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
                            <p class="mb-2 text-muted">{{ $category->menu_items_count }} items available</p>
                            @if($category->description)
                                <p class="mb-0 small text-muted">{{ Str::limit($category->description, 80) }}</p>
                            @endif
                            <div class="btn btn-primary mt-3">View Items</div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h5>No categories available</h5>
                    <p class="mb-0">Please check back later.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Category pagination">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if($categories->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if($page == $categories->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($categories->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
                
                {{-- Show pagination info --}}
                <div class="text-center text-muted mt-2">
                    <small>
                        Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} 
                        of {{ $categories->total() }} categories
                    </small>
                </div>
            </div>
        </div>
        @endif

        <!-- Restaurant Info -->
        <div class="text-center mt-5 pt-4 border-top">
            <p class="mb-1">123-456-7890</p>
            <p class="mb-0">123 Anywhere St., Any City</p>
        </div>
    </div>
</div>
<!-- Menu Categories End -->

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

/* Orange Pagination Styles */
.pagination .page-item.active .page-link {
    background-color: #fd7e14;
    border-color: #fd7e14;
    color: white;
}

.pagination .page-link {
    color: #fd7e14;
    border: 1px solid #dee2e6;
    margin: 0 2px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background-color: #fd7e14;
    border-color: #fd7e14;
    color: white;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}
</style>

@endsection