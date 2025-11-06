@extends('backend.layouts.admin')

@section('title', 'تعديل الفئة')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>تعديل الفئة: {{ $category->name }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الفئة</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">صورة الفئة</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($category->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     style="width: 100px; height: 100px; object-fit: cover;" class="rounded">
                                <small class="text-muted d-block">الصورة الحالية</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">وصف الفئة</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                       {{ $category->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">فئة نشطة</label>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">← رجوع</a>
                <button type="submit" class="btn btn-warning">✏️ تحديث الفئة</button>
            </div>
        </form>
    </div>
</div>
@endsection