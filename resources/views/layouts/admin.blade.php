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
    
    <div class="container-fluid">
      @include('admin.partials.header')
      <div class="row">
          {{-- <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          @include('admin.partials.sidebar')
            @yield('content')
        </main> --}}
        <aside class="col-md-3 col-lg-2 px-md-4 py-4 bg-light">
          @include('admin.partials.sidebar')
      </aside>
    
      <!-- Main Content -->

      <main class="col-md-9 col-lg-10 px-md-4 py-4">
          @yield('content')
      </main>
      </div>
       

       
    </div>
   <div class="">
     @include('admin.partials.footer')
    </div>
</body>
</html>
