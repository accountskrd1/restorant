@extends('backend.layouts.admin')

@section('title', 'تفاصيل العنصر: ' . $menuItem->name)

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">تفاصيل العنصر: {{ $menuItem->name }}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- الصورة -->
            <div class="col-md-4 text-center mb-4">
                @if($menuItem->image)
                    <img src="{{ asset('storage/' . $menuItem->image) }}" 
                         alt="{{ $menuItem->name }}" 
                         class="img-fluid rounded" 
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                         style="height: 300px;">
                        <span class="text-muted">لا توجد صورة</span>
                    </div>
                @endif
                
                <!-- البادجات -->
                <div class="mt-3">
                    @if($menuItem->is_featured)
                        <span class="badge bg-warning text-dark fs-6">⭐ مميز</span>
                    @endif
                    <span class="badge {{ $menuItem->is_available ? 'bg-success' : 'bg-danger' }} fs-6">
                        {{ $menuItem->is_available ? '🟢 متاح' : '🔴 غير متاح' }}
                    </span>
                </div>
            </div>

            <!-- التفاصيل -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%" class="bg-light">اسم العنصر:</th>
                                <td>{{ $menuItem->name }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">الفئة:</th>
                                <td>
                                    <span class="badge bg-info">{{ $menuItem->category->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">السعر:</th>
                                <td>
                                    <strong class="text-success fs-5">{{ number_format($menuItem->price, 2) }} ر.س</strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">وقت التحضير:</th>
                                <td>
                                    <span class="text-muted">⏱️ {{ $menuItem->preparation_time }} دقيقة</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th class="bg-light">الحالة:</th>
                                <td>
                                    <span class="badge {{ $menuItem->is_available ? 'bg-success' : 'bg-danger' }}">
                                        {{ $menuItem->is_available ? 'متاح للطلب' : 'غير متاح' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">التصنيف:</th>
                                <td>
                                    @if($menuItem->is_featured)
                                        <span class="badge bg-warning text-dark">عنصر مميز</span>
                                    @else
                                        <span class="badge bg-secondary">عادي</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">تاريخ الإنشاء:</th>
                                <td>{{ $menuItem->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">آخر تحديث:</th>
                                <td>{{ $menuItem->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- الوصف -->
                @if($menuItem->description)
                <div class="mb-4">
                    <h5 class="text-primary">📝 الوصف</h5>
                    <div class="p-3 bg-light rounded">
                        {{ $menuItem->description }}
                    </div>
                </div>
                @endif

                <!-- المكونات -->
                @if($menuItem->ingredients)
                <div class="mb-4">
                    <h5 class="text-primary">🥗 المكونات</h5>
                    <div class="p-3 bg-light rounded">
                        {{ $menuItem->ingredients }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- أزرار الإجراءات -->
        <div class="mt-4 pt-3 border-top">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.menu-items.edit', $menuItem) }}" 
                   class="btn btn-warning btn-lg">
                   ✏️ تعديل العنصر
                </a>
                <a href="{{ route('admin.menu-items.index') }}" 
                   class="btn btn-secondary btn-lg">
                   ← رجوع للقائمة
                </a>
                <form action="{{ route('admin.menu-items.destroy', $menuItem) }}" 
                      method="POST" 
                      style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger btn-lg"
                            onclick="return confirm('هل أنت متأكد من حذف هذا العنصر؟')">
                        🗑️ حذف العنصر
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- معلومات إضافية -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">📊 معلومات الفئة</h6>
            </div>
            <div class="card-body">
                <p><strong>اسم الفئة:</strong> {{ $menuItem->category->name }}</p>
                <p><strong>حالة الفئة:</strong> 
                    <span class="badge {{ $menuItem->category->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $menuItem->category->is_active ? 'نشطة' : 'غير نشطة' }}
                    </span>
                </p>
                @if($menuItem->category->description)
                    <p><strong>وصف الفئة:</strong> {{ $menuItem->category->description }}</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0">💰 معلومات السعر</h6>
            </div>
            <div class="card-body">
                <p><strong>السعر الأساسي:</strong> {{ number_format($menuItem->price, 2) }} ر.س</p>
                <p><strong>وقت التحضير:</strong> {{ $menuItem->preparation_time }} دقيقة</p>
                <p><strong>القيمة المضافة:</strong> 
                    @if($menuItem->is_featured)
                        <span class="text-success">عنصر مميز ⭐</span>
                    @else
                        <span class="text-muted">عنصر عادي</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection