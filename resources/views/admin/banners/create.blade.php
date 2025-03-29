@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm banner</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="tieu_de" class="form-label">Tiêu đề</label>
                    <input type="text" id="tieu_de" value="{{ old('tieu_de') }}" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror">
                    @error('tieu_de')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="image_url" class="form-label">ảnh banner</label>
                    <input type="file" id="image_url" value="{{ old('image_url') }}" name="image_url"
                        class="form-control @error('image_url') is-invalid @enderror">
                    @error('image_url')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
               

                <!-- Giá và Giá Khuyến Mại -->
                {{-- <div class="mb-3 ">
                    
                        <label for="link" class="form-label @error('link') is-invalid @enderror">link banner</label>
                        <input type="text" id="link" value="{{ old('link') }}" name="link" class="form-control" min="0">
                        @error('link')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    
                </div> --}}
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
                    <i class="fas fa-save"></i> Lưu banner
                </button>
            </form>
        </div>
    </div>
@endsection
