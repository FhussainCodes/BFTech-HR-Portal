<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">

    <div class="container-fluid">

        <h4 class="fw-bold text-primary mb-0">
            HR Dashboard
        </h4>

        <ul class="navbar-nav ms-auto align-items-center">

            {{-- Language --}}
            <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    🌐 English
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">English</a></li>
                    <li><a class="dropdown-item" href="#">Urdu</a></li>
                </ul>
            </li>

            {{-- Notification --}}
            <li class="nav-item me-3">
                <a href="#" class="nav-link position-relative">

                    <i class="bi bi-bell fs-5"></i>

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>

                </a>
            </li>

            {{-- Settings --}}
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle d-flex align-items-center"
                   href="#"
                   role="button"
                   data-bs-toggle="dropdown">

                    <img src="{{ asset('images/default-profile.png') }}"
                         width="35"
                         height="35"
                         class="rounded-circle me-2">

                    HR

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="#">
                            Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Settings
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item text-danger" href="#">
                            Logout
                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>