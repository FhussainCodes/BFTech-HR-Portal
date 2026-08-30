<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->first_name }} {{ $user->last_name }}</title>

    <meta property="og:title" content="{{ $user->first_name }} {{ $user->last_name }}">
    <meta property="og:description" content="{{ $user->role }}">

    @if($user->profile_image)
        <meta property="og:image" content="https://fragrance-legroom-bannister.ngrok-free.dev/storage/{{ $user->profile_image }}">
    @endif

    <meta property="og:url" content="https://fragrance-legroom-bannister.ngrok-free.dev/profile/{{ $user->id }}">
    <meta property="og:type" content="profile">
</head>

<body>
    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>

    @if($user->profile_image)
        <img src="https://fragrance-legroom-bannister.ngrok-free.dev/storage/{{ $user->profile_image }}" width="300">
    @endif

    <p>{{ $user->role }}</p>
</body>
</html>