@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="ten" class="form-label">Name</label>
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
                    <label for="phone" class="form-label @error('phone') is-invalid @enderror">Số điện thoại</label>
                    <input type="number" id="phone" value="" name="phone" class="form-control">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="tin_nhan" class="form-label">Tin nhắn</label>
                    <input type="text" id="tin_nhan" value="" name="tin_nhan" class="form-control @error('tin_nhan') is-invalid @enderror">
                    @error('tin_nhan')
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
