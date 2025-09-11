
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موبوکس - ورود | ثبت‌نام</title>
    @vite('resources/css/login.css')
    <!-- Font Awesome Free -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-T5A+hF+ZqE8H6ED5x2d1Yv6G9+PqxL7jVpzqR6AQpCJ+2D5Q4xDp4X9b9nCej8QK+0wUe1kJdq2Mx1TkYqXGsw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<x-auth-form :type="$type ?? 'login'" />



</html>