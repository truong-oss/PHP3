@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    {{-- hiển thị thông báo  --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a href="{{route('admin.customers.create')}}" class="btn btn-primary">Create</a>
    <a href="{{route('admin.customers.deleted')}}" class="btn btn-danger">Thùng rác</a>
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Tên</th>
                <th>email</th>
               <th>số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $product)
                <tr>
                    <td>{{ $product->ten }}</td>
                    <td>{{ $product->email }}</td>
                    <td>{{ $product->sdt }}</td>
                    <td>{{$product->dia_chi}}</td>
                    <td>
                        <a href="{{ route('admin.customers.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{route('admin.customers.destroy', $product->id)}}" method="POST"
                            onsubmit="return confirm('bạn muốn xóa ko')" class="d-inline"
                            >
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3">
        {{ $customers->links('pagination::bootstrap-5') }}
    </div>
@endsection
