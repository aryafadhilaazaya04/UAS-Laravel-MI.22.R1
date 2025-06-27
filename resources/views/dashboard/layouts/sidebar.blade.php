<div class="sidebar border-end col-md-3 col-lg-2 p-0 bg-body-tertiary min-vh-100">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header d-md-none">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Arya Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="d-flex flex-column flex-shrink-0 p-3">
            <ul class="nav mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard') || Request::is('dashboard/show*') ? 'active' : 'text-black' }}" href="/dashboard">
                        <i class="bi bi-house-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard/posts*') ? 'active' : 'text-black' }}" href="/dashboard/posts">
                        <i class="bi bi-file-text-fill"></i> My Post
                    </a>
                </li>
            </ul>
            @can('admin-only')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>ADMINISTRATOR</span>
            </h6>
            <ul class="nav mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard/categories*') ? 'active' : 'text-black' }}" href="/dashboard/categories">
                        <i class="bi bi-grid-fill"></i> Post Categories
                    </a>
                </li>
            </ul>
            @endcan
            <hr class="my-3" />
            <ul class="nav mb-auto">
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link d-flex gap-2 text-danger bg-transparent border-0" type="submit">
                            <i class="bi bi-door-closed-fill"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>