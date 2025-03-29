@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> sửa banners</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banners.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <!-- Tên sản phẩm -->
                  <div class="mb-3">
                    <label for="tieu_de" class="form-label">Tiêu đề</label>
                    <input type="text" id="tieu_de" value="{{$banners->tieu_de}}" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror">
                    @error('tieu_de')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="image_url" class="form-label">ảnh banner</label>
                    <input type="file" id="image_url" value="{{ old('image_url') }} {{$banners->image_url}}" name="image_url"
                        class="form-control @error('image_url') is-invalid @enderror">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if ($banners->image_url)
                    <img src="{{asset('storage/'. $banners->image_url)}}" alt="" width="200px">
                    @else 
                    Không có hình ảnh
                    @endif
                </div>
               

                <!-- Giá và Giá Khuyến Mại -->
                {{-- <div class="mb-3 ">
                    
                        <label for="link" class="form-label @error('link') is-invalid @enderror">link banner</label>
                        <input type="text" id="link" value="{{ old('link') }} {{$banners->link}}" name="link" class="form-control" min="0">
                        @error('link')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <div>
                        <input type="radio" id="con_hang" name="trang_thai" value="1"
                            {{ (old('trang_thai', isset($banners) ? $banners->trang_thai : null) == 1) ? 'checked' : '' }}>
                        <label for="con_hang">Hoạt động</label>
                
                        <input type="radio" id="het_hang" name="trang_thai" value="0"
                            {{ (old('trang_thai', isset($banners) ? $banners->trang_thai : null) == 0) ? 'checked' : '' }}>
                        <label for="het_hang">Ẩn</label>
                    </div>
                </div>

                <!-- Nút Submit -->
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu banners
                </button>
            </form>
        </div>
    </div>
@endsection
