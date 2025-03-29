@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="ten" class="form-label">Tên</label>
                    <input type="text" id="ten" value="" name="ten" class="form-control @error('ten') is-invalid @enderror">
                    @error('ten')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" id="email" value="" name="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- hiển thị lỗi ở các ô tiếp --}}
                <div class="mb-3">
                    <label for="sdt" class="form-label @error('sdt') is-invalid @enderror">số điện thoại</label>
                    <input type="number" id="sdt" value="" name="sdt" class="form-control">
                    @error('sdt')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dia_chi" class="form-label">dia_chi</label>
                    <input type="text" id="dia_chi" value="" name="dia_chi"
                        class="form-control @error('dia_chi') is-invalid @enderror">
                    @error('dia_chi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Nút Submit -->
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu sản phẩm
                </button>
            </form>
        </div>
    </div>
@endsection
