<!-- resources/views/admin/partials/sidebar.blade.php -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar text-center">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    <span class="ms-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span class="ms-2">Quan Ly Danh Muc</span>
            {{-- <a href="{{route('categories.index')}}" class="btn btn-primary">Quan Ly Danh Muc</a> --}}

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="bi bi-cart"></i>
                    <span class="ms-2">Sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.banners.index') }}">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">Banner</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">Contacts</span>
                </a>
            </li>   <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.customers.index') }}">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.posts.index') }}">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">post</span>
                </a>
            </li>
        </li>   <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                <i class="bi bi-people"></i>
                <span class="ms-2">reviews</span>
            </a>
        </li>
            
           
        </ul>
    </div>
</nav>
