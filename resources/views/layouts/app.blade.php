<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Portal</title>
</head>
<body>
    @include('partials.navbar');
    @include('partials.sidebar');
    @yield('content');
    @include('partials.footer');
    
</body>
</html>