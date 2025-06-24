<div class="sidebar border-end col-md-3 col-lg-2 p-0 bg-body-tertiary min-vh-100">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header d-md-none">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Arya Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="d-flex flex-column flex-shrink-0 p-3">
            <ul class="nav mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 active" href="#">
                        <i class="bi bi-house-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 active" href="#">
                        <i class="bi bi-file-earmark"></i> My Post
                    </a>
                </li>
            </ul>
            <hr class="my-3" />
            <ul class="nav mb-auto">
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link d-flex gap-2 text-danger bg-transparent border-0" type="submit">
                            <i class="bi bi-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>