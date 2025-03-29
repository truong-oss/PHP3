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
    
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
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
            @foreach ($deletedPosts  as $key => $post)
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
                       
                        <form action="{{ route('admin.posts.restore', ['id' => $post->id]) }}" method="POST"
                            onsubmit="return confirm('Bạn có muốn khôi phục không?')" class="d-inline">
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
        {{ $deletedPosts->links('pagination::bootstrap-5') }}
    </div>
@endsection
