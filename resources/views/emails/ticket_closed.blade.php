
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Closed</title>
</head>
<body>
    <h1>Your Ticket Has Been Closed</h1>
    <p>Hello {{ $ticket->user->name }},</p>
    <p>We are writing to inform you that your ticket titled "<strong>{{ $ticket->Title }}</strong>" has been closed.</p>
    <p>If you have any further issues, feel free to open a new ticket.</p>
    <p>Thank you!</p>
    <p>Best Regards,<br>Oli Ullah</p>
</body>
</html>
