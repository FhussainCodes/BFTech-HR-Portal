<nav class="navbar navbar-expand-lg bg-white shadow-sm hr-navbar">

    <div class="container-fluid">

        <h3 class="fw-bold text-primary mb-0">

            HR Dashboard

        </h3>

        <ul class="navbar-nav ms-auto align-items-center">

            <li class="nav-item dropdown me-3">

                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                    🌐 English

                </a>

                <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="#">English</a></li>

                    <li><a class="dropdown-item" href="#">Urdu</a></li>

                </ul>

            </li>

            <li class="nav-item me-3">

                <a href="#" class="nav-link position-relative">

                    <i class="bi bi-bell fs-5"></i>

                    <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">

                        3

                    </span>

                </a>

            </li>

            <li class="nav-item dropdown">

                                @php
    $user = \App\Models\Register::find(session('user')['id']);
@endphp

<a class="nav-link dropdown-toggle d-flex align-items-center"
    href="#"
    data-bs-toggle="dropdown">

    @if($user && $user->profile_image)
        <img src="{{ asset('storage/'.$user->profile_image) }}"
             width="35"
             height="35"
             class="rounded-circle me-2"
             style="object-fit:cover;">
    @else
        <img src="{{ asset('images/default-profile.png') }}"
             width="35"
             height="35"
             class="rounded-circle me-2">
    @endif

    {{ $user->first_name }}

</a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item" href="{{route('hr.profile.index')}}">

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

<form action="{{ route('logoutPage') }}" method="POST">

    @csrf

    <button type="submit"
            class="dropdown-item text-danger">

        Logout

    </button>

</form>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>