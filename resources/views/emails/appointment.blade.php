<!DOCTYPE html>
<html>
<head>
    <title>Appointment Notification</title>
</head>
<body>
<h1>Hello {{ $recipientType === 'client' ? $appointment->client->fullname : $appointment->consultant->fullname }}</h1>
<p>You have a new appointment scheduled.</p>
<p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
<p>Thank you!</p>
</body>
</html>
