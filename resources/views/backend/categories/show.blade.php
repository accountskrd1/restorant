@extends('backend.layouts.admin')

@section('title', 'تفاصيل الفئة')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>تفاصيل الفئة: {{ $category->name }}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" 
                         alt="{{ $category->name }}" 
                         style="width: 200px; height: 200px; object-fit: cover;" class="rounded mb-3">
                @else
                    <div style="width: 200px; height: 200px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;" class="rounded mb-3 mx-auto">
                        <span class="text-muted">لا توجد صورة</span>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">اسم الفئة:</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>الوصف:</th>
                        <td>{{ $category->description ?: '---' }}</td>
                    </tr>
                    <tr>
                        <th>الحالة:</th>
                        <td>
                            <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $category->is_active ? 'نشط' : 'غير نشط' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>عدد العناصر:</th>
                        <td>
                            <span class="badge bg-primary">{{ $category->menuItems->count() }} عنصر</span>
                        </td>
                    </tr>
                    <tr>
                        <th>تاريخ الإنشاء:</th>
                        <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    <tr>
                        <th>آخر تحديث:</th>
                        <td>{{ $category->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">✏️ تعديل</a>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">← رجوع للقائمة</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection