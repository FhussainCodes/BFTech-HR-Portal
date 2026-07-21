@extends('layouts.app')
@section('content')

 <div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card shadow-lg rounded-4 p-5 w-50" >
        <h2 class="text-center mb-3" >
                Register Page
        </h2>

        <form action="{{route('registerUser')}}" method="POST" >
            @csrf
          
             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    First Name
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="first_name"
                placeholder="e.g. Austin"
                class="form-control w-100 @error('first_name') is-invalid @enderror "
                required
                >

                @error('first_name')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

              <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Last Name
                </label>

                <input 
                type="text"
                name="last_name"
                placeholder="e.g. Jane"
                class="form-control w-100 @error('last_name') is-invalid @enderror"
                >

                 @error('last_name')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

            
              <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Email
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="email"
                name="email"
                placeholder="name@example.com" 
                class="form-control @error('email') is-invalid @enderror"
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
                    Age
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="age"
                placeholder="e.g., 20"
                class="form-control @error('age') is-invalid @enderror"
                >

                @error('age')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Designation
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="designation"
                placeholder="e.g., Senior Software Engineer"
                class="form-control @error('designation') is-invalid @enderror"
                required
                >

                @error('designation')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Phone Number
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="phone_number"
                placeholder="03001234567"
                class="form-control @error('phone_number') is-invalid @enderror"
                required
                >

                @error('phone_number')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    City
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="city"
                placeholder="Enter your city"
                class="form-control @error('city') is-invalid @enderror"
                required
                >

                @error('city')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Country
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="country"
                placeholder="Enter you country"
                class="form-control @error('country') is-invalid @enderror"
                required
                >

                @error('country')
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
                type="password"
                name="password"
                placeholder="Enter your password"
                class="form-control @error('password') is-invalid @enderror"
                autocomplete="new-password"
                required
                >

                @error('password')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Confirm Password
                </label>

                <input 
                type="password"
                name="confirm_password"
                placeholder="Re-enter your password"
                class="form-control @error('password') is-invalid @enderror"
                >

                @error('confirm_password')
                <div class="invalid-feedback" >
                    {{$message}}
                </div>
                @enderror
             </div>

             <button 
             type="submit"
             class="btn btn-primary w-100"
             >
                Register
             </button>

             <div class="text-center mt-3">
                <p class="text-muted">
                    Already have an account? 
                <a href="/login" class="text-decoration-none fw-bold">Login here</a>
                </p>
            </div>

        </form>

    </div>

</div>

@endsection('content')