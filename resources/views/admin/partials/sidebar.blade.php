<!-- resources/views/admin/partials/sidebar.blade.php -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar text-center">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.products.index') }}">
                    <i class="bi bi-house-door"></i>
                    <span class="ms-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-file-earmark-text"></i>
                    <span class="ms-2">Đơn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-cart"></i>
                    <span class="ms-2">Người dùng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">Cài đặt</span>
                </a>
            </li>
           
        </ul>
    </div>
</nav>
