<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Created</title>
</head>
<body>
    <h1>Ticket Created</h1>
    <p>Hello {{ $ticket->user->name }},</p>
    <p>Your ticket titled "<strong>{{ $ticket->title }}</strong>" has been created successfully.</p>
    <p>Thank you for reaching out to us!</p>
    <p>Best Regards,<br>Admin</p>
</body>
</html>