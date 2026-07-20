<h1>Register Page</h1>

@if($errors->any())

    @foreach($errors->all() as $error)

        {{ $error }}

    @endforeach

@endif

<form action="{{route('registerUser')}}" method="Post" >
    @csrf
    <label for="">Please Enter Your First Name</label>
    <input type="text" name="first_name"  > <br>
    <label for="">Please Enter Your Last Name</label>
    <input type="text" name="last_name" ><br>
    <label for="">Please Enter Your Email</label>
    <input type="text" name="email" ><br>
    <label for="">Please Enter Your Age </label>
    <input type="text" name="age" ><br>
    <label for="">Please Enter Your Designation</label>
    <input type="text" name="designation" ><br>
    <label for="">Please Enter Your Phone Number</label>
    <input type="text" name="phone_number" ><br>
    <label for="">Please Enter Your City</label>
    <input type="text" name="city" ><br>
    <label for="">Please Enter Your Country </label>
    <input type="text" name="country" ><br>
    <label for="">Please Enter Your Password</label>
    <input type="text" name="password" ><br>
    <label for="">Please Enter Your Confirm Password</label>
    <input type="text" name="confirm_password" ><br>
    <label for="">Already have an account</label>
    <button type="submit" >Click here to Register</button>
</form>