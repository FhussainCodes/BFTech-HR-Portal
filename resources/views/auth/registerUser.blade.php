@extends('layouts.app')
@section('content')
<h2>Regiter Page</h2>

<form action="{{route('registerUser')}}" method="Post">
    @csrf

</form>

@endsection('content')