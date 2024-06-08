<!DOCTYPE html>
<html>
<head>
    <title>New User Registered</title>
</head>
<body>
    <h2>New User Registered</h2>
    <p>A new user has registered on your website:</p>

    <ul>
        <li><strong>Name:</strong> {{ $user->fullname }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>

    </ul>

    <p>Thank you!</p>
</body>
</html>
