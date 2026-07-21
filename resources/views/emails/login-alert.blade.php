@extends('layouts.email')
@section('content')

    <h2>Login Successful</h2>

    <p>Hello <strong>{{ $user->first_name }}</strong>,</p>

    <p>Your account has been logged in successfully.</p>

    <p><strong>Login Details</strong></p>

    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Login Time: {{ now() }}</li>
    </ul>

    <p>If this wasn't you, please contact the HR Administrator immediately.</p>

    <p>Thank you.</p>

    <p><strong>BFTech HR Portal Team</strong></p>

@endsection('content')