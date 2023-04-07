<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="{{ asset('images/medical-book.png') }}" class="navbar-brand-img h-100" alt="main_logo" />
            <span class="ms-1 font-weight-bold">PharmaMate</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/users') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <iconify-icon icon="mdi:user"></iconify-icon>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/tables.html">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <iconify-icon icon="mdi:medicine-bottle"></iconify-icon>
                    </div>
                    <span class="nav-link-text ms-1">Obat</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 position-absolute bottom-0 start-0 end-0">
        {{-- logout --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Logout</button>
        </form>
    </div>
</aside>
