<div>
    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <title>{{ $title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body>




        @include('layouts.header')






        {{ $slot }}



        @include('layouts.footer')



    </body>

    </html>
</div>
