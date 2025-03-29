@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Đánh Giá')

@section('content')
    
    {{-- hiển thị thông báo  --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Thêm Đánh Giá</a>
    <a href="{{ route('admin.reviews.deleted') }}" class="btn btn-danger">Thùng rác</a>
    
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Tên Người Đánh Giá</th>
                <th>Rating</th>
                <th>Bình Luận</th>
                <th>Bài Viết</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->reviewer_name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->post->tieu_de ?? 'Không xác định' }}</td>
                    <td>
                       
                        <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3">
        {{ $reviews->links('pagination::bootstrap-5') }}
    </div>
@endsection
