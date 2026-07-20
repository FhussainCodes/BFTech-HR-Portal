@extends('layouts.app')
@section('content')

 <div class="contanier vh-70 d-flex justify-content-center align-items-center ">
    <div class="card shadow-lg p-4 rounded-4 w-75" >
        <h2 class="text-center mb-4" >
                Register Page
        </h2>
@if($errors->any())

    @foreach($errors->all() as $error)

        {{ $error }}

    @endforeach

@endif
        <form action="{{route('registerUser')}}" method="POST" >
            <!-- First Name -->
             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    First Name
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="first_name"
                placeholder="e.g. Austin"
                class="form-control"
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
                    <!-- <span class="text-danger">*</span> -->
                </label>

                <input 
                type="text"
                name="last_name"
                placeholder="e.g. Jane"
                class="form-control"
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
                    Age
                    <span class="text-danger">*</span>
                </label>

                <input 
                type="text"
                name="age"
                placeholder="e.g., 20"
                class="form-control"
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
                class="form-control"
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
                class="form-control"
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
                class="form-control"
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
                class="form-control"
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

             <div class="mb-3" >
                <label for="" class="form-label fw-semibold" >
                    Confirm Password
                    <!-- <span class="text-danger">*</span> -->
                </label>

                <input 
                type="text"
                name="confirm_password"
                placeholder="Re-enter your password"
                class="form-control"
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

        </form>

    </div>

</div>

@endsection('content')