<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Password Reset OTP</title>
</head>

<body>

    <h2>BFTech HR Portal</h2>

    <p>Hello,</p>

    <p>
        We received a request to reset your password.
    </p>

    <p>
        Your One-Time Password (OTP) is:
    </p>

    <h1>{{ $otp }}</h1>

    <p>
        This OTP will expire in <strong>5 minutes</strong>.
    </p>

    <p>
        If you did not request a password reset, please ignore this email.
    </p>

    <br>

    <p>Regards,</p>

    <strong>BFTech HR Portal</strong>

</body>

</html>