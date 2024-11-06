<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Registration</title>
</head>
<body>
    <h1>Hello, {{ $name }}!</h1>
    <p>Thank you for registering with us. Please confirm your registration by clicking the link below:</p>
    <a href="{{ $confirmationUrl }}">Confirm Your Registration</a>
</body>
</html>
