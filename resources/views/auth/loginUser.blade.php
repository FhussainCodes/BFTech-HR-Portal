@extends('layouts.app')
@section('content')

 <div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg rounded-4 p-5 w-50" >
        <h2 class="text-center mb-3" >
                Login Page
        </h2>

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

        <form action="{{route('registerUser')}}" method="POST">
                        @csrf   
              <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Email
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="email"
                name="email"
                placeholder="name@example.com" 
                class="form-control"
                required
                >

                @error('email')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>     

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Password
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="password"
                placeholder="Enter your password"
                class="form-control"
                required
                >

                @error('password')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <button 
             type="submit"
             class="btn btn-primary w-100"
             >
                LOG IN
             </button>

             <div class="text-center mt-3">
                <p class="text-muted">
                    Forget password
                <a href="#" class="text-decoration-none fw-bold">Click here</a>
                </p>
            </div>

             <div class="text-center mt-3">
                <p class="text-muted">
                    Don't have an account?
                <a href="/register" class="text-decoration-none fw-bold">Register</a>
                </p>
            </div>

        </form>

    </div>

</div>

@endsection('content')