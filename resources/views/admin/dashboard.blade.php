<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Quản Trị')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin.products.index') }}">Sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.categories.index') }}">Danh mục </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Người dùng</a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
            </li>
          </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      
        <header>
            <h1>@yield('title', 'Dashboard')</h1>
        </header>

        {{-- <main>
            @yield('content')
        </main> --}}
    </div>
   <div class="">
     @yield('footer')
    </div>
</body>
</html>
