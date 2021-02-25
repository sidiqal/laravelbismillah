<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Yuk</title>
</head>
<body>
    <h1>Login Yuk</h1>
    @if(session('error'))
        {{ session('error') }}
    @endif
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <input type="text" name="username" value="{{ old('username') }}">
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>