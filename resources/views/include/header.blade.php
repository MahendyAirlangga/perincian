<header style="position: relative; z-index: 2;">
    <a href="#" class="burger-btn d-block">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </a>
    <nav class="navbar navbar-expand  navbar-light navbar-top" style="position: relative; z-index: 2;">
        <div class="container-fluid">
           
            <div>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                @auth
                                <h6 class="mb-0 text-gray-600"></h6>
                                <p class="mb-0 text-sm text-gray-600"></p>
                                @endauth
                            </div>
                            <div class="user-img d-flex align-items-center">
                                {{-- <div class="avatar avatar-md">
                                    <img src="{{ asset('style/assets/compiled/jpg/1.jpg')}}">
                                </div> --}}
                            </div>
                        </div>
                    </a>
                    

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, Admin!</h6>
                        </li>
                        <li><a class="dropdown-item" href=""><i class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <hr class="dropdown-divider">
                        <li>
                            <a class="dropdown-item" href="">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</header>