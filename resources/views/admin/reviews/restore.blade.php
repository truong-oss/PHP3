@extends('layouts.admin')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('title', 'Danh Sách Đánh Giá')

@section('content')
   

    <!-- Hiển thị thông báo -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Người Đánh Giá</th>
                <th>Xếp Hạng</th>
                <th>Bình Luận</th>
                <th>Bài Viết</th>
                <th>Ngày Tạo</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedReviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->reviewer_name }}</td>
                    <td>{{ str_repeat('⭐', $review->rating) }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->post->tieu_de ?? 'Không có' }}</td>
                    <td>{{ $review->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('admin.reviews.restore', ['id' => $review->id]) }}" method="POST"
                            onsubmit="return confirm('Bạn có muốn khôi phục đánh giá này không?')" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3">
        {{ $deletedReviews->links('pagination::bootstrap-5') }}
    </div>
@endsection
