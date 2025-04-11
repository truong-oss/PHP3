@extends('layouts.auth')

@section('title', 'Đăng ký')

@section('content')
<div class="auth-card bg-white">
    <h2 class="text-center mb-4">Đăng ký</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
 @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
            
        @endforeach
        </ul>
       
    </div>
        
    @endif
    
    <form method="POST" action="{{ route('register-post') }}">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" 
                   id="password_confirmation" name="password_confirmation" >
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
    </div>
</div>
@endsection