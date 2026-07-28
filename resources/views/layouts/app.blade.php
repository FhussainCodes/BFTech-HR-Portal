<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('bftech-favicon.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
<style>
    /* 1. Global Horizontal Overflow Block */
    html, body {
        max-width: 100%;
        overflow-x: hidden !important;
    }

    /* 2. Flex Containers Fix (Min-width 0 fixes flex child overflow issue) */
    .d-flex, 
    .flex-grow-1 {
        min-width: 0;
    }

    /* 3. Sidebar Container Fix */
    .sidebar-container {
        width: 220px;
        min-height: 100vh;
        flex-shrink: 0;
    }

    /* 4. Base Urdu Text Alignment */
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
    .main-content-scroll {
    max-height: calc(100vh - 120px); /* Screen ki height ke hisab se scroll set karega */
    overflow-y: auto;
}
</style>
</head>

<body class="{{ app()->getLocale() == 'ur' ? 'rtl-mode' : '' }}">

<div class="d-flex min-vh-100 w-100 overflow-hidden">

    {{-- Urdu me Sidebar Right par, English me Left par --}}
    @if(app()->getLocale() == 'ur')

        <div class="flex-grow-1 d-flex flex-column bg-light">
            @include('partials.navbar')

            <main class="flex-grow-1 p-3 main-content-scroll">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

        <div class="sidebar-container border-start bg-white">
            @include('partials.sidebar')
        </div>

    @else

        <div class="sidebar-container border-end bg-white">
            @include('partials.sidebar')
        </div>

        <div class="flex-grow-1 d-flex flex-column bg-light">
            @include('partials.navbar')

            <main class="flex-grow-1 p-3 main-content-scroll">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

    @endif

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>