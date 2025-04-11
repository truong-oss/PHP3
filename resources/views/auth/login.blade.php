@extends('layouts.auth')

@section('title', 'Đăng nhập')

@section('content')
<div class="auth-card bg-white">
    <h2 class="text-center mb-4">Đăng nhập</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
 @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
            
        @endforeach
        </ul>
       
    </div>
        
    @endif
    
    <form method="POST" action="{{ route('loginpost') }}">
        @csrf
        
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

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
    </div>
</div>
@endsection