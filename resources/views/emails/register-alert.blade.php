<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Alert</title>
</head>
<body>

     <h2>Welcome to BFTech HR Portal</h2>

    <p>Hello {{ $user->first_name }} {{ $user->last_name }},</p>

    <p>
        Your account has been created successfully.
    </p>

    <p>You can now log in to the BFTech HR Portal.</p>
    <p>
    <a href="{{ route('loginPage') }}">Login to BFTech HR Portal</a>
    </p>

    <h3>Account Details</h3>

    <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Designation:</strong> {{ $user->designation }}</p>

    <p><strong>City:</strong> {{ $user->city }}</p>

    <p>
        If you did not create this account, please contact the HR Administrator.
    </p>

    <br>

    <p>Thank you.</p>

    <p>BFTech HR Portal Team</p>
    
</body>
</html>