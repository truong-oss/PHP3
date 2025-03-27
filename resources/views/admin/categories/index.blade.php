@extends('layouts.admin')
@section('title', 'danh sach danh muc')
@section('contents')
<div class="container">
    <h2>Danh Sách Danh Mục</h2>
    {{-- <a href="{{route('categories.create')}}">Them Danh Muc</a> --}}
    <form method="GET">
        <div class="input-group">
            <input class="form-control" type="text" name="search" placeholder="Tìm kiếm Danh Mục"
                   value="{{request('search')}}">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Ten Danh Muc</th>
        <th>Trang Thai</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
        <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $category->status == 1 ? 'Active' : 'Inactive' }}</span>
        </td>
        <td>
            {{-- <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{route('categories.show',$category->id)}}" class="btn btn-secondary">Details</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa danh mục này?')">
                    Delete
                </button>
            </form> --}}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    {{ $categories->links('pagination::bootstrap-5') }}
</div>
@endsection
