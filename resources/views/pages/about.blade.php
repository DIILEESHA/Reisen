<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/about.css">
    <title>About us</title>
</head>

<body>
    @include('components.nav')
    <div class="about_header">
        <div class="about_description">
            <h2 class="abouter">about us </h2>
            <div class="about_fg">
                <h2 class="dg"><a class="linka " href="/">home </a></h2>

                <h2 class="dg">></h2>
                <h2 class="dg">about us</h2>

            </div>
        </div>
    </div>
    @include('components.who')
    @include('components.choose')
    @include('components.footer')


</body>

</html>
