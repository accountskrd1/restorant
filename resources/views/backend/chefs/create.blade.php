@extends('backend.layouts.admin')

@section('title', 'زیادکردنی چێشتکەری تازە')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">زیادکردنی چێشتکەری تازە</h1>
        <a href="{{ route('admin.chefs.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> گەڕانەوە
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">زانیاری چێشتکەر</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.chefs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">ناوی چێشتکەر *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">پۆست *</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                   id="position" name="position" value="{{ old('position') }}" required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="specialty">تایبەتمەندی</label>
                            <input type="text" class="form-control @error('specialty') is-invalid @enderror" 
                                   id="specialty" name="specialty" value="{{ old('specialty') }}">
                            @error('specialty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="experience_years">ساڵی ئەزموون</label>
                            <input type="number" class="form-control @error('experience_years') is-invalid @enderror" 
                                   id="experience_years" name="experience_years" value="{{ old('experience_years', 0) }}" min="0" max="50">
                            @error('experience_years')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bio">ژیاننامە</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror" 
                              id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
                    @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">ئیمەیڵ</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">ژمارەی مۆبایل</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="order">ڕێزبەندی</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" value="{{ old('order', 0) }}" min="0">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image">وێنە</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">
                                    چالاک
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="facebook">فەیسبووک</label>
                            <input type="url" class="form-control @error('facebook') is-invalid @enderror" 
                                   id="facebook" name="facebook" value="{{ old('facebook') }}">
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="twitter">تویتەر</label>
                            <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                                   id="twitter" name="twitter" value="{{ old('twitter') }}">
                            @error('twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="instagram">ئیستاگرام</label>
                            <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                                   id="instagram" name="instagram" value="{{ old('instagram') }}">
                            @error('instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">پاشەکەوت کردنی چێشتکەر</button>
                <a href="{{ route('admin.chefs.index') }}" class="btn btn-secondary">هەڵوەشاندنەوە</a>
            </form>
        </div>
    </div>
</div>
@endsection