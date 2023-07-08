<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify your email address</title>
</head>

<body>
    <h1>Welcome to MyApp!</h1>
    <p>Please click on the link below to verify your email addressss:</p>

    <a href="{{ url('verify-email/' . $user->email_verification_token) }}">Verify Email Address</a>
</body>

</html>
