<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('bftech-favicon.png') }}">

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        html, body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        body.rtl-mode {
            text-align: right;
        }
    </style>
</head>

<body class="{{ app()->getLocale() == 'ur' ? 'rtl-mode' : '' }} d-flex flex-column min-vh-100">

    <!-- Guest Top Header (Only Language Switcher) -->
    <header class="p-3 border-bottom bg-white d-flex justify-content-between align-items-center">
        <!-- Logo / App Name -->
        <div class="fw-bold fs-5 text-primary">
            BFTech HR Portal
        </div>

        <!-- Language Switcher Dropdown -->
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1" 
                    type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-globe me-1"></i>
                <span>{{ app()->getLocale() == 'ur' ? 'اردو' : 'English' }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                <li>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" 
                       href="{{ route('change.lang', 'en') }}">
                        English
                        @if(app()->getLocale() == 'en')
                            <i class="bi bi-check2 text-primary"></i>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" 
                       href="{{ route('change.lang', 'ur') }}">
                        اردو
                        @if(app()->getLocale() == 'ur')
                            <i class="bi bi-check2 text-primary"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow-1 d-flex align-items-center justify-content-center py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-2 mt-auto text-center">
        <p class="mb-0 text-muted small" style="font-size: 0.75rem;">
            © {{ date('Y') }} {{ __('footer.rights_reserved') }}
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>