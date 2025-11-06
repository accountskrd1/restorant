@extends('backend.layouts.admin')

@section('title', 'بینینی چێشتکەر: ' . $chef->name)

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">بینینی چێشتکەر: {{ $chef->name }}</h1>
        <a href="{{ route('admin.chefs.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> گەڕانەوە
        </a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">وێنەی چێشتکەر</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{ $chef->image_url }}" alt="{{ $chef->name }}" 
                         class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">کۆمەڵایەتی</h6>
                </div>
                <div class="card-body">
                    @if($chef->social_links)
                        <div class="d-flex justify-content-around">
                            @if(isset($chef->social_links['facebook']))
                                <a href="{{ $chef->social_links['facebook'] }}" target="_blank" class="btn btn-primary btn-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(isset($chef->social_links['twitter']))
                                <a href="{{ $chef->social_links['twitter'] }}" target="_blank" class="btn btn-info btn-circle">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if(isset($chef->social_links['instagram']))
                                <a href="{{ $chef->social_links['instagram'] }}" target="_blank" class="btn btn-danger btn-circle">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    @else
                        <p class="text-muted text-center">هیچ پەێوەندییەکی کۆمەڵایەتی دراو نیە</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">زانیاری سەرەکی</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ناو:</strong> {{ $chef->name }}</p>
                            <p><strong>پۆست:</strong> {{ $chef->position }}</p>
                            <p><strong>تایبەتمەندی:</strong> {{ $chef->specialty ?? '-' }}</p>
                            <p><strong>ساڵی ئەزموون:</strong> {{ $chef->experience_years }} ساڵ</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>ئیمەیڵ:</strong> {{ $chef->email ?? '-' }}</p>
                            <p><strong>مۆبایل:</strong> {{ $chef->phone ?? '-' }}</p>
                            <p><strong>ڕێزبەندی:</strong> {{ $chef->order }}</p>
                            <p>
                                <strong>دۆخ:</strong> 
                                <span class="badge badge-{{ $chef->is_active ? 'success' : 'danger' }}">
                                    {{ $chef->is_active ? 'چالاک' : 'ناچالاک' }}
                                </span>
                            </p>
                        </div>
                    </div>
                    
                    @if($chef->bio)
                    <div class="mt-4">
                        <strong>ژیاننامە:</strong>
                        <p class="mt-2">{{ $chef->bio }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">کردارەکان</h6>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                        <a href="{{ route('admin.chefs.edit', $chef) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> دەستکاری
                        </a>
                        <form action="{{ route('admin.chefs.toggle-status', $chef) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-{{ $chef->is_active ? 'warning' : 'success' }} ml-2">
                                <i class="fas fa-{{ $chef->is_active ? 'pause' : 'play' }}"></i> 
                                {{ $chef->is_active ? 'ناچالاک کردن' : 'چالاک کردن' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.chefs.destroy', $chef) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2" 
                                    onclick="return confirm('دڵنیای لە سڕینەوەی ئەم چێشتکەرە؟')">
                                <i class="fas fa-trash"></i> سڕینەوە
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection