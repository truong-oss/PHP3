@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm danh mục Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                    <input type="text" id="ten_danh_muc" value="{{ old('ten_danh_muc') }}" name="ten_danh_muc" class="form-control @error('ten_danh_muc') is-invalid @enderror">
                    @error('ten_danh_muc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <div>
                        <input type="radio" id="con_hang" name="trang_thai" value="1" checked>
                        <label for="con_hang">Hoạt động</label>
                        <input type="radio" id="het_hang" name="trang_thai" value="0">
                        <label for="het_hang">Ẩn</label>
                        @error('trang_thai')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Nút Submit -->
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu sản phẩm
                </button>
            </form>
        </div>
    </div>
@endsection
