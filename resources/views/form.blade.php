<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Array Form</title>
</head>
<body>
<form action="{{ route('search') }}" method="POST">
    @csrf
    <input type="text" name="search" placeholder="Search products">
    <button type="submit">Search</button>
</form>













</body>
</html>
