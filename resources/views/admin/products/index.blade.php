@extends('layouts.admin')



@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    {{-- <h2>Danh Sách Sản Phẩm</h2> --}}
    {{-- hiển thị tb --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.products.create')}}" class="btn btn-success">thêm sản phẩm</a>
<!-- Form tìm kiếm -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm sản phẩm</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.products.index') }}">
            <div class="row g-3">
                <!-- Mã sản phẩm -->
                <div class="col-md-3">
                    <label class="form-label">Mã sản phẩm</label>
                    <input type="text" name="ma_san_pham" class="form-control" placeholder="Nhập mã sản phẩm"
                        value="{{ request('ma_san_pham') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm"
                        value="{{ request('ten_san_pham') }}">
                </div>
                

{{-- Danh mục --}}
<div class="col-md-3">
    <label class="form-label">Danh mục</label>
    <select name="danh_muc" class="form-select"> <!-- Đổi tên từ category_id thành danh_muc -->
        <option value="">-- Chọn danh mục --</option>
        @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('danh_muc') == $category->id ? 'selected' : '' }}>
                    {{ $category->ten_danh_muc }}
                </option>
            @endforeach
        @else
            <option value="">Không có danh mục</option>
        @endif
    </select>
</div>

                <!-- Khoảng giá -->
                <div class="col-md-3">
                    <label class="form-label">Khoảng giá</label>
                    <div class="input-group">
                        <input type="number" name="gia_min" class="form-control" placeholder="Từ"
                            value="{{ request('gia_min') }}">
                        <span class="input-group-text">-</span>
                        <input type="number" name="gia_max" class="form-control" placeholder="Đến"
                            value="{{ request('gia_max') }}">
                    </div>
                </div>

                <!-- Ngày nhập -->
                <div class="col-md-3">
                    <label class="form-label">Ngày nhập</label>
                    <input type="date" name="ngay_nhap" class="form-control" value="{{ request('ngay_nhap') }}">
                </div>

                <!-- Trạng thái -->
                <div class="col-md-3">
                    <label class="form-label">Trạng thái</label>
                    <select name="trang_thai" class="form-select">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="1" {{ request('trang_thai') == '1' ? 'selected' : '' }}>Còn hàng</option>
                        <option value="0" {{ request('trang_thai') == '0' ? 'selected' : '' }}>Hết hàng</option>
                    </select>
                </div>

                <!-- Nút tìm kiếm & Làm mới -->
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 me-1">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100 ms-1">
                        <i class="fas fa-sync"></i> Làm mới
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
    <table class="table table-striped" border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Giá Khuyến Mại</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">ngày nhập</th>
                <th scope="col">trạng thái</th>

                <th scope="col">thao tác</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td scope="row">{{ $product->ma_san_pham }}</td>
                    <td scope="row">{{ $product->ten_san_pham }}</td>
                    <td scope="row">{{ $product->category->ten_danh_muc ?? 'Không có' }}</td>
                    <td scope="row">
                        <img src="{{ asset('storage/' . $product->hinh_anh) }}" width="80">
                    </td>
                    <td scope="row">{{ number_format($product->gia, 0, ',', '.') }}đ</td>
                    <td scope="row">{{ number_format($product->gia_khuyen_mai, 0, ',', '.') }}đ</td>
                    <td scope="row">{{ $product->so_luong }}</td>
                    <td scope="row">{{ Str::limit($product->mo_ta, 50) }}</td>
                    <td scope="row">{{ $product->ngay_nhap }}</td>
                    
                    <td scope="row">
                        @if($product->trang_thai)
                            <span class="badge bg-success">Còn hàng</span>
                        @else
                            <span class="badge bg-danger">Hết hàng</span>
                        @endif
                    </td>

                    <td scope="row">
                        <a href="{{ route('admin.products.show', $product->id)}}" class="btn btn-primary">show</a>
                        <a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-primary">edit</a>
                        {{-- <a href="{{ route('admin.products.destroy', $product->id)}}" class="btn btn-primary">delete</a>
                         --}}
                        <form action="{{route('admin.products.destroy', $product->id)}}" method="POST"
                            onsubmit="return confirm('muốn xoá ko')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">xoá</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3" >
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
