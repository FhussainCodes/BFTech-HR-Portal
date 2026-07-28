<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('bftech-favicon.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

<style>
    /* Urdu Text Alignment Rules via CSS Class */
    body.rtl-mode {
        text-align: right;
        direction: rtl !important;
    }

    body.rtl-mode .form-control,
    body.rtl-mode .form-select,
    body.rtl-mode .card-header,
    body.rtl-mode .card-body,
    body.rtl-mode label {
        text-align: right !important;
    }

    /* Table, Header (#) aur Cells Translation/Alignment Fix */
    body.rtl-mode table,
    body.rtl-mode table th,
    body.rtl-mode table td {
        text-align: right !important;
    }

    /* Sidebar Container Fix */
    .sidebar-container {
        width: 220px;
        min-height: 100vh;
        flex-shrink: 0;
    }
</style>
</head>

<body class="{{ app()->getLocale() == 'ur' ? 'rtl-mode' : '' }}">

<div class="d-flex min-vh-100">

    @include('partials.sidebar')

    <div class="flex-grow-1 d-flex flex-column bg-light">

        @include('partials.navbar')

        <main class="flex-grow-1 p-3">
            @yield('content')
        </main>

        @include('partials.footer')

    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
    </script>
</body>
</html>