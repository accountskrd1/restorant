@extends('backend.layouts.admin')

@section('title', 'تعديل العنصر: ' . $menuItem->name)

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">تعديل العنصر: {{ $menuItem->name }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.menu-items.update', $menuItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم العنصر <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $menuItem->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">الفئة <span class="text-danger">*</span></label>
                        <select class="form-control @error('category_id') is-invalid @enderror" 
                                id="category_id" name="category_id" required>
                            <option value="">اختر الفئة</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">السعر (ر.س) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" value="{{ old('price', $menuItem->price) }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="preparation_time" class="form-label">وقت التحضير (دقيقة) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('preparation_time') is-invalid @enderror" 
                               id="preparation_time" name="preparation_time" 
                               value="{{ old('preparation_time', $menuItem->preparation_time) }}" required>
                        @error('preparation_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">وصف العنصر</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $menuItem->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">المكونات</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" 
                          id="ingredients" name="ingredients" rows="3">{{ old('ingredients', $menuItem->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة العنصر</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                @if($menuItem->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $menuItem->image) }}" 
                             alt="{{ $menuItem->name }}" 
                             style="width: 150px; height: 150px; object-fit: cover;" 
                             class="rounded border">
                        <p class="text-muted small mt-1">الصورة الحالية</p>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_available" 
                               name="is_available" value="1" 
                               {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">متاح للطلب</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_featured" 
                               name="is_featured" value="1" 
                               {{ old('is_featured', $menuItem->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">عنصر مميز</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">← رجوع</a>
                <button type="submit" class="btn btn-warning">✏️ تحديث العنصر</button>
            </div>
        </form>
    </div>
</div>
@endsection