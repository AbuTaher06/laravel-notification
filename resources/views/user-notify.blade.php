<!-- resources/views/user-notify.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Notification</title>
</head>
<body>
    <h1>Notification for {{ $user->name }}</h1>
    <p>{{ $messages['hi'] }}</p>
    <p>{{ $messages['wish'] }}</p>
</body>
</html>
