<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Lang::has('layout.title') ? __('layout.title') : 'HR Portal' }}</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hr.css') }}">

    <style>
        /* Global Horizontal Overflow Block */
        html, body {
            max-width: 100%;
            overflow-x: hidden !important;
        }

        /* Flex Containers Fix */
        .d-flex, 
        .flex-grow-1 {
            min-width: 0;
        }

        /* Base Urdu Text Alignment */
        body.rtl-mode {
            text-align: right;
        }

        body.rtl-mode .form-control,
        body.rtl-mode .form-select,
        body.rtl-mode .card-header,
        body.rtl-mode .card-body,
        body.rtl-mode table,
        body.rtl-mode label {
            text-align: right !important;
        }
    </style>
</head>
<body class="{{ app()->getLocale() == 'ur' ? 'rtl-mode' : '' }}">

    <div class="app-layout d-flex min-vh-100 w-100 overflow-hidden">
        
        @if(app()->getLocale() == 'ur')

            <!-- Main Content Area (Left side in Urdu) -->
            <div class="app-right-wrapper flex-grow-1 d-flex flex-column bg-light">
                @include('partials.hr-navbar')

                <main class="main-content flex-grow-1 p-3">
                    @include('partials.alerts')
                    @yield('content')
                </main>

                @include('partials.footer')
            </div>

            <!-- HR Sidebar Container (Right side in Urdu) -->
            <div class="sidebar-container border-start bg-white">
                @include('partials.hr-sidebar')
            </div>

        @else

            <!-- HR Sidebar Container (Left side in English) -->
            <div class="sidebar-container border-end bg-white">
                @include('partials.hr-sidebar')
            </div>

            <!-- Main Content Area (Right side in English) -->
            <div class="app-right-wrapper flex-grow-1 d-flex flex-column bg-light">
                @include('partials.hr-navbar')

                <main class="main-content flex-grow-1 p-3">
                    @include('partials.alerts')
                    @yield('content')
                </main>

                @include('partials.footer')
            </div>

        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>