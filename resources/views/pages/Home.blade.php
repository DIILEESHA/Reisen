<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/home.css">
    <title>Document</title>
</head>

<body>
    {{-- Social Media Integration --}}
    @include('components.nav')

    {{-- Include the header --}}

    @include('components.header')
    @include('components.who')
    @include('components.choose')
    @include('components.customers')
    @include('components.footer')
</body>

</html>
