@extends('layouts.admin')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Thêm Đánh Giá</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reviews.store') }}" method="POST">
                @csrf

                <!-- Tên người đánh giá -->
                <div class="mb-3">
                    <label for="reviewer_name" class="form-label">Tên người đánh giá</label>
                    <input type="text" id="reviewer_name" value="{{ old('reviewer_name') }}" name="reviewer_name" class="form-control @error('reviewer_name') is-invalid @enderror">
                    @error('reviewer_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Xếp hạng -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Xếp hạng</label>
                    <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror">
                        <option value="">Chọn xếp hạng</option>
                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐</option>
                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                    </select>
                    @error('rating')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bình luận -->
                <div class="mb-3">
                    <label for="comment" class="form-label">Bình luận</label>
                    <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror" rows="4">{{ old('comment') }}</textarea>
                    @error('comment')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Chọn bài viết để đánh giá -->
                <div class="mb-3">
                    <label for="post_id" class="form-label">Bài viết</label>
                    <select id="post_id" name="post_id" class="form-select @error('post_id') is-invalid @enderror">
                        <option value="">Chọn bài viết</option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                                {{ $post->tieu_de }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nút Submit -->
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu đánh giá
                </button>
            </form>
        </div>
    </div>
@endsection
