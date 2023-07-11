<!DOCTYPE html>
<html>
<head>
    <title>ZenZone</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Click the following link to reset your password:</p>

    <a href="{{ $resetUrl }}">Reset Password</a>

    <br> Remember to use your new password when logging in. <br>
</body>
</html>
