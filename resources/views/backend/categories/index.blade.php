@extends('backend.layouts.admin')

@section('title', 'إدارة الفئات')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>قائمة الفئات</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        ➕ إضافة فئة جديدة
    </a>
</div>

@if($categories->count() > 0)
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الصورة</th>
                <th>اسم الفئة</th>
                <th>الوصف</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" 
                             alt="{{ $category->name }}" 
                             style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                    @else
                        <div style="width: 50px; height: 50px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;" class="rounded">
                            <small>لا يوجد</small>
                        </div>
                    @endif
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ? Str::limit($category->description, 50) : '---' }}</td>
                <td>
                    <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $category->is_active ? 'نشط' : 'غير نشط' }}
                    </span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.categories.show', $category) }}" 
                           class="btn btn-sm btn-info">👁️ عرض</a>
                        <a href="{{ route('admin.categories.edit', $category) }}" 
                           class="btn btn-sm btn-warning">✏️ تعديل</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" 
                              method="POST" 
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟')">
                                🗑️ حذف
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info text-center">
    <h4>لا توجد فئات حالياً</h4>
    <p>ابدأ بإضافة فئات جديدة لتنظيم قائمة الطعام</p>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">إضافة أول فئة</a>
</div>
@endif
@endsection