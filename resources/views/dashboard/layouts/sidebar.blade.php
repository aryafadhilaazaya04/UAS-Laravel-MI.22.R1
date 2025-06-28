<div class="sidebar offcanvas offcanvas-end d-xl-flex flex-column align-items-start p-3 p-xl-0" 
     tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel"
     style="max-width:220px;width:100%;min-width:180px;">
    
    <!-- Header hanya muncul di mode offcanvas -->
    <div class="offcanvas-header d-xl-none">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Arya Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="position: relative; margin-left: 2.5rem;"></button>
    </div>

    <!-- Sidebar content -->
    <aside class="w-100">
        <div class="d-flex flex-column pt-3 overflow-y-auto">
            <ul class="nav flex-column mb-auto">
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
            <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">ADMINISTRATOR</h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 {{ Request::is('dashboard/categories*') ? 'active' : 'text-black' }}" href="/dashboard/categories">
                        <i class="bi bi-grid-fill"></i> Post Categories
                    </a>
                </li>
            </ul>
            @endcan

            <hr class="my-3 mx-1" />
            <ul class="nav flex-column mb-auto">
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
    </aside>
</div>