@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Bài Viết')

@section('content')

    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Thêm bài viết</a>
    <a href="{{ route('admin.posts.deleted') }}" class="btn btn-danger">Thùng rác</a>

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Tác Giả</th>
                <th>Trạng Thái</th>
                <th>Ngày Tạo</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->tieu_de }}</td>
                    <td>{{ $post->tac_gia }}</td>
                    <td>
                        <span class="badge {{ $post->trang_thai ? 'bg-success' : 'bg-danger' }}">
                            {{ $post->trang_thai ? 'Hiển thị' : 'Ẩn' }}
                        </span>
                    </td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                      
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" class="d-inline">
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
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

@endsection
