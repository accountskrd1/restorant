@extends('backend.layouts.admin')

@section('title', 'بەڕێوەبردنی چێشتکەرەکان')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <a href="{{ route('admin.chefs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> چێشتکەری تازە
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">هەموو چێشتکەرەکان</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>وێنە</th>
                            <th>ناو</th>
                            <th>پۆست</th>
                            <th>تایبەتمەندی</th>
                            <th>ساڵی ئەزموون</th>
                            <th>ڕێزبەندی</th>
                            <th>دۆخ</th>
                            <th>کردارەکان</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($chefs as $chef)
                        <tr>
                            <td>
                                <img src="{{ $chef->image_url }}" alt="{{ $chef->name }}" 
                                     class="img-fluid rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->position }}</td>
                            <td>{{ $chef->specialty ?? '-' }}</td>
                            <td>{{ $chef->experience_years }} ساڵ</td>
                            <td>{{ $chef->order }}</td>
                            <td>
                                <span class="badge badge-{{ $chef->is_active ? 'success' : 'danger' }}">
                                    {{ $chef->is_active ? 'چالاک' : 'ناچالاک' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.chefs.show', $chef) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.chefs.edit', $chef) }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.chefs.toggle-status', $chef) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $chef->is_active ? 'warning' : 'success' }}">
                                            <i class="fas fa-{{ $chef->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.chefs.destroy', $chef) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                onclick="return confirm('دڵنیای لە سڕینەوەی ئەم چێشتکەرە؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">هیچ چێشتکەرێک نیە</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection