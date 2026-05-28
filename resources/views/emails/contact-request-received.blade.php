<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Cerere nouă RentRide</title>
</head>
<body style="font-family: Arial, sans-serif; color: #0f172a; line-height: 1.6;">
<h2>Cerere nouă primită pe RentRide</h2>

<p><strong>Data:</strong> {{ $contactRequest->created_at->format('d.m.Y H:i') }}</p>
<p><strong>Nume:</strong> {{ $contactRequest->name }}</p>
<p><strong>Telefon:</strong> {{ $contactRequest->phone }}</p>
<p><strong>Email:</strong> {{ $contactRequest->email ?: '-' }}</p>
<p><strong>Interes:</strong> {{ $contactRequest->vehicle_type ?: '-' }}</p>

<p><strong>Mesaj:</strong></p>
<p>{{ $contactRequest->message ?: '-' }}</p>

<hr>

<p>
    Poți vedea cererea și în admin:
    <br>
    <a href="{{ url('/admin/contact-requests') }}">{{ url('/admin/contact-requests') }}</a>
</p>
</body>
</html>
