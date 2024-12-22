<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>