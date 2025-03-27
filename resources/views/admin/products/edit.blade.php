@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Cập nhật Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                    <input type="text" id="ten_san_pham" value="{{ old('ten_san_pham', $product->ten_san_pham) }}" name="ten_san_pham" class="form-control @error('ten_san_pham') is-invalid @enderror">
                   
                </div>

                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                    <input type="text" id="ma_san_pham" value="{{ old('ma_san_pham', $product->ma_san_pham) }}" name="ma_san_pham"
                        class="form-control @error('ma_san_pham') is-invalid @enderror">
                    @error('ma_san_pham')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- hiển thị lỗi ở các ô tiếp --}}
                <div class="mb-3">
                    <label for="ngay_nhap" class="form-label @error('ngay_nhap') is-invalid @enderror">Ngày nhập</label>
                    <input type="date" id="ngay_nhap" value="{{ old('ngay_nhap', $product->ngay_nhap) }}" name="ngay_nhap" class="form-control">
                    @error('ngay_nhap')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                              
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->ten_danh_muc }}
                                </option>
                                
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Giá và Giá Khuyến Mại -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="gia" class="form-label @error('gia') is-invalid @enderror">Giá</label>
                        <input type="number" id="gia" value="{{ old('gia',$product->gia) }}" name="gia" class="form-control" min="0">
                        @error('gia')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gia_khuyen_mai" class="form-label">Giá Khuyến Mại</label>
                        <input type="number" value="{{ old('gia_khuyen_mai',$product->gia_khuyen_mai) }}" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" min="0">
                        
                    </div>
                </div>

                <!-- Số lượng -->
                <div class="mb-3">
                    <label for="so_luong" class="form-label @error('so_luong') is-invalid @enderror">Số lượng</label>
                    <input type="number" value="{{ old('so_luong',$product->so_luong) }}" id="so_luong" name="so_luong" class="form-control" min="1">
                    @error('so_luong')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="mo_ta" class="form-label">Mô tả</label>
                    <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4">{{ $product->mo_ta}}</textarea>

                </div>

                <!-- Hình ảnh -->
                <div class="mb-3">
                    <label for="hinh_anh" class="form-label">Hình ảnh</label>
                    <input type="file" id="hinh_anh" name="hinh_anh" class="form-control" >
                    @error('hinh_anh')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    @if ($product->hinh_anh)
                        {{-- <img src="{{asset('storage/') . $product->hinh_anh}}" alt=""> --}}
                        <img src="{{ asset('storage/' . $product->hinh_anh) }}" alt="Hình ảnh sản phẩm" width="150">

                        @else
                        ko có ảnh
                    @endif
                </div>

                <!-- Trạng thái -->
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <div>
                        <input type="radio" id="con_hang" name="trang_thai" value="1" checked>
                        <label for="con_hang">Còn hàng</label>
                        <input type="radio" id="het_hang" name="trang_thai" value="0">
                        <label for="het_hang">Hết hàng</label>
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