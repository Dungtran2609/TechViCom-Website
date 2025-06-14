<header class="topbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="d-flex align-items-center">
                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <button type="button" class="button-toggle-menu me-2">
                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Welcome Message -->
                <div class="topbar-item">
                    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Welcome!</h4>
                </div>
            </div>

            <div class="d-flex align-items-center gap-1">
                <!-- Theme Toggle -->
                <div class="topbar-item">
                    <button type="button" class="topbar-button" id="light-dark-mode">
                        <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- Notification -->
                <div class="dropdown topbar-item">
                    <button type="button" class="topbar-button position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <iconify-icon icon="solar:bell-bing-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold">Notifications</h6>
                                </div>
                                <div class="col-auto">
                                    <a href="javascript:void(0);" class="text-dark text-decoration-underline"><small>Clear All</small></a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 280px;">
                            <a href="javascript:void(0);" class="dropdown-item py-3 border-bottom text-wrap">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('admin/images/users/avatar-1.jpg') }}" class="img-fluid me-2 avatar-sm rounded-circle" alt="avatar-1">
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0">
                                            <span class="fw-medium">Josephine Thompson</span> commented on admin panel
                                            <span>" Wow 😍! this admin looks good and awesome design"</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="text-center py-3">
                            <a href="#" class="btn btn-primary btn-sm">View All Notifications <i class="bx bx-right-arrow-alt ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Theme Settings -->
                <div class="topbar-item d-none d-md-flex">
                    <button type="button" class="topbar-button" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                        <iconify-icon icon="solar:settings-bold-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown topbar-item">
                    <a type="button" class="topbar-button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle" width="32" src="{{ asset('admin/images/users/avatar-1.jpg') }}" alt="avatar">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Welcome, Admin!</h6>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user-circle text-muted fs-18 align-middle me-1"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-message-dots text-muted fs-18 align-middle me-1"></i> Messages
                        </a>
                        <div class="dropdown-divider my-1"></div>
                        <a class="dropdown-item text-danger" href="#">
                            <i class="bx bx-log-out fs-18 align-middle me-1"></i> Logout
                        </a>
                    </div>
                </div>

                <!-- Search -->
                <form class="app-search d-none d-md-block ms-2">
                    <div class="position-relative">
                        <input type="search" class="form-control" placeholder="Search..." autocomplete="off">
                        <iconify-icon icon="solar:magnifer-linear" class="search-widget-icon"></iconify-icon>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
