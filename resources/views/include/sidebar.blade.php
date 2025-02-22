<!-- sidebar -->
<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="" class="d-flex align-items-center text-decoration-none">
                        {{-- <img src="{{ asset('style/assets/compiled/png/webapp_image.png') }}" alt="Logo"
                            style="width: 70px; height: 70px;"> --}}
                        <span class="ms-2 fs-4">Perincian</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Mode Siang/Malam -->
        <div class="sidebar-menu">
            <div class="theme-toggle d-flex gap-1  align-items-center mt-2"
                style="position: absolute; top:120px ; right: 0; margin: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--system-uicons" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                        <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                            </path>
                        </g>
                    </g>
                </svg>
                <div class="form-check form-switch fs-6 gap-1">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>

            <!-- Sidebar Menu -->
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item ">
                    <a href="{{ route('index.perincian') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('index.add.perincian') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>perincian</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('index.kapal') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manajemen kapal</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
