@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm Bài Viết</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <!-- Tiêu đề -->
                <div class="mb-3">
                    <label for="tieu_de" class="form-label">Tiêu đề</label>
                    <input type="text" id="tieu_de" name="tieu_de"
                        class="form-control @error('tieu_de') is-invalid @enderror" value="{{ old('tieu_de') }}">
                    @error('tieu_de')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bài viết -->
                <div class="mb-3">
                    <label for="bai_viet" class="form-label">Nội dung bài viết</label>
                    <textarea id="bai_viet" name="bai_viet" class="form-control @error('bai_viet') is-invalid @enderror" rows="6">{{ old('bai_viet') }}</textarea>
                    @error('bai_viet')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tác giả -->
                <div class="mb-3">
                    <label for="tac_gia" class="form-label">Tác giả</label>
                    <input type="text" id="tac_gia" name="tac_gia"
                        class="form-control @error('tac_gia') is-invalid @enderror" value="{{ old('tac_gia') }}">
                    @error('tac_gia')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trạng thái -->
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="hien_thi" name="trang_thai" value="1" class="form-check-input"
                                {{ old('trang_thai', '1') == '1' ? 'checked' : '' }}>
                            <label for="hien_thi" class="form-check-label">Hiển thị</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="an" name="trang_thai" value="0" class="form-check-input"
                                {{ old('trang_thai') == '0' ? 'checked' : '' }}>
                            <label for="an" class="form-check-label">Ẩn</label>
                        </div>
                    </div>
                    @error('trang_thai')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nút Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Lưu bài viết
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
