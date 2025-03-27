@extends('layouts.admin')



@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    <h2>chi tiết Sản Phẩm</h2>

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
               

            </tr>
        </thead>
        <tbody>
            
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
                    <td scope="row">
                        <a href="{{ route('admin.products.index')}}" class="btn btn-primary">return</a>
                    </td>
                </tr>
           
        </tbody>
    </table>

    <!-- Phân trang -->
  
@endsection
