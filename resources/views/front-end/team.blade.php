@extends('front-end.index')
@section('content')
 <style>
        :root {
            --primary-color: #fd7e14;
            --secondary-color: #ffa94d;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
            background-color: #f9f9f9;
            line-height: 1.6;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .hero-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 300px;
        }
        
        .team-item {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        .team-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .team-img-container {
            width: 200px;
            height: 200px;
            margin: 20px auto;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--light-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .team-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .team-item:hover .team-img {
            transform: scale(1.1);
        }
        
        .team-content {
            padding: 0 20px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .team-name {
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .team-position {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .team-specialty {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .team-experience {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .team-social {
            margin-top: auto;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .team-item:hover .team-social {
            opacity: 1;
            transform: translateY(0);
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-color);
            color: white;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: var(--secondary-color);
            transform: scale(1.1);
        }
        
        /* Pagination Styles */
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .pagination .page-link {
            color: var(--primary-color);
            border: 1px solid #dee2e6;
            margin: 0 2px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .pagination .page-link:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
        
        /* Empty State */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .empty-state h5 {
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .empty-state p {
            color: #6c757d;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .team-img-container {
                width: 180px;
                height: 180px;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
    </div>

    <!-- Team Section -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">ئەندامانی تیم</h5>
                <h1 class="mb-5">چێشتکەری مەستەرەکانی ئێمە</h1>
            </div>
            
            <!-- Chef Cards - Dynamic from Database -->
            <div class="row g-4">
                @forelse($chefs as $chef)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.1 }}s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="team-img-container">
                            @if($chef->image)
                                <img class="team-img" src="{{ asset('storage/' . $chef->image) }}" 
                                     alt="{{ $chef->name }}">
                            @else
                                <img class="team-img" src="{{ asset('design/img/team-' . $loop->iteration . '.jpg') }}" 
                                     alt="{{ $chef->name }}">
                            @endif
                        </div>
                        <div class="team-content">
                            <h5 class="team-name">{{ $chef->name }}</h5>
                            <div class="team-position">{{ $chef->position }}</div>
                            
                            @if($chef->specialty)
                                <div class="team-specialty">{{ $chef->specialty }}</div>
                            @endif
                            
                            @if($chef->experience_years > 0)
                                <div class="team-experience">{{ $chef->experience_years }} ساڵ ئەزموون</div>
                            @endif
                            
                            @if($chef->bio)
                                <div class="team-bio text-muted small mt-2">
                                    {{ Str::limit($chef->bio, 80) }}
                                </div>
                            @endif
                            
                            <div class="team-social">
                                @if($chef->social_links && isset($chef->social_links['facebook']))
                                    <a class="social-icon" href="{{ $chef->social_links['facebook'] }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @else
                                    <a class="social-icon" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                
                                @if($chef->social_links && isset($chef->social_links['twitter']))
                                    <a class="social-icon" href="{{ $chef->social_links['twitter'] }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @else
                                    <a class="social-icon" href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                
                                @if($chef->social_links && isset($chef->social_links['instagram']))
                                    <a class="social-icon" href="{{ $chef->social_links['instagram'] }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @else
                                    <a class="social-icon" href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <h5>هیچ چێشتکەرێک بەردەست نیە</h5>
                        <p class="mb-0">تکایە دواتر سەردانمان بکەرەوە</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Team Pagination -->
            @if($chefs->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Team pagination">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            @if($chefs->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">پێشتر</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $chefs->previousPageUrl() }}" rel="prev">پێشتر</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach($chefs->getUrlRange(1, $chefs->lastPage()) as $page => $url)
                                @if($page == $chefs->currentPage())
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
                            @if($chefs->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $chefs->nextPageUrl() }}" rel="next">دواتر</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">دواتر</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    
                    {{-- Show pagination info --}}
                    <div class="text-center text-muted mt-2">
                        <small>
                            نیشان دەدرێت {{ $chefs->firstItem() }} بۆ {{ $chefs->lastItem() }} 
                            لە کۆی {{ $chefs->total() }} چێشتکەر
                        </small>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection