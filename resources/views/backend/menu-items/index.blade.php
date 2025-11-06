@extends('backend.layouts.admin')

@section('title', 'إدارة القائمة')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>إدارة عناصر القائمة</h3>
    <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">
        ➕ إضافة عنصر جديد
    </a>
</div>

@if($menuItems->count() > 0)
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الصورة</th>
                <th>اسم العنصر</th>
                <th>الفئة</th>
                <th>السعر</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             alt="{{ $item->name }}" 
                             style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                    @else
                        <div style="width: 50px; height: 50px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;" class="rounded">
                            <small>لا يوجد</small>
                        </div>
                    @endif
                </td>
                <td>
                    <strong>{{ $item->name }}</strong>
                    @if($item->is_featured)
                        <span class="badge bg-warning text-dark">مميز</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-info">{{ $item->category->name }}</span>
                </td>
                <td>
                    <strong>{{ number_format($item->price, 2) }} ر.س</strong>
                </td>
                <td>
                    <span class="badge {{ $item->is_available ? 'bg-success' : 'bg-danger' }}">
                        {{ $item->is_available ? 'متاح' : 'غير متاح' }}
                    </span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.menu-items.show', $item) }}" 
                           class="btn btn-sm btn-info">👁️ عرض</a>
                        <a href="{{ route('admin.menu-items.edit', $item) }}" 
                           class="btn btn-sm btn-warning">✏️ تعديل</a>
                        <form action="{{ route('admin.menu-items.destroy', $item) }}" 
                              method="POST" 
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('هل أنت متأكد من حذف هذا العنصر؟')">
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
    <h4>لا توجد عناصر في القائمة حالياً</h4>
    <p>ابدأ بإضافة عناصر جديدة للقائمة الطعام</p>
    <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">إضافة أول عنصر</a>
</div>
@endif
@endsection