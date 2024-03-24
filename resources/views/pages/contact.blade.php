<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/custom.css">

    <link rel="stylesheet" href="/css/contact.css">

    <title>Document</title>
</head>

<body>
    @include('components.nav')
    <div class="conta">
        <div class="about_description">
            <h2 class="abouter">contact us </h2>
            <div class="about_fg">
                <h2 class="dg"><a class="linka" href="/">home </a></h2>

                <h2 class="dg">></h2>
                <h2 class="dg">contact us</h2>

            </div>
        </div>
    </div>

    <div class="conto">

        <h1 class="customer_title">CONTACT INFORMATION</h1>
        <div class="contact_form_grid">
            <div class="contra one">
                <div class="contras">
                    <h2 class="location">our location</h2>
                    <h3 class="loca">775 Avenu<br />Brooklyn, NY 1001</h3>
                </div>
                <div class="contras">
                    <h2 class="location">our Phone</h2>
                    <h3 class="loca jks">
                        +1 (800) 123 4567
                        <br />
                        +1 (800) 123 4568
                    </h3>
                </div>
                <div class="contras">
                    <h2 class="location">E-mail

                    </h2>
                    <h3 class="loca">
                        <a class="loca jks" href="mailto:info@site.com">

                            info@yoursite.com
                        </a>
                    </h3>
                </div>
            </div>
            <div class="contra two">

                <form action="" class="contra_form">
                    <div class="form_credentails">
                        <input required type="text" class="form_input" placeholder="Name">
                    </div>
                    <div class="form_credentails">
                        <input required type="text" class="form_input placeholder="Email">
                    </div>
                    <div class="form_credentails">
                        <textarea required class="form_text" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div class="form_credentails">
                        <button>send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.footer')

</body>

</html>
