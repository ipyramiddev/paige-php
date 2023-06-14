<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/new_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha384-{hash}" crossorigin="anonymous">
</head>
<body>
<header class="login_header">
    <div class="header_bacK_link">
        <span><i class="fa-sharp fa-solid fa-angle-left"></i> Zurück zu coop.ch</span>
    </div>
    <div class="login_header_logo">
        <img src="assets/images/logo_coop.png" alt="Logo">
    </div>
</header>
<main>

    <div class="login_bg"></div>

    <section class="login_content_section">
        <div class="login_page_content">
            <h3>Supercard ID Login</h3>
            <p>Mit Supercard ID auf coop.ch einloggen.</p>
            <form action="" class="login_form_supercard">
                <div class="login_page_inputs">
                    <div class="form_control">
                        <input class="main_input" type="email" name="email" placeholder="E-Mail-Adresse">
                    </div>
                    <div class="form_control">
                        <input class="main_input" type="password" name="password" placeholder="Passwort">
                    </div>
                </div>

                <a href="#" class="password_reset">Passwort vergessen</a>

                <div class="form_item_check supercard-checked">
                    <input type="checkbox" id="supercard_modal__checkbox">
                    <label for="supercard_modal__checkbox">Angemeldet bleiben</label>
                </div>

                <button class="gray_btn">Anmelden</button>

                <a href="#" class="login_bottom_link">Noch keine Supercard ID? <i class="fa-regular fa-circle-question"></i></a>

            </form>
        </div>
    </section>

    <div class="login_process_step">SC-2a</div>

    <section class="login_infobox">
        <img src="https://login.supercard.ch/cas/svg/questionmark.svg" alt="Infobox icon">
        <p>Hier Supercard ID mit <br>  Videoanleitung erstellen</p>
    </section>

</main>
<footer class="login_footer">
    <div class="footer_bottom">
        <ul class="locales">
            <li><a href="#">DE</a></li>
            <li><a href="#">FR</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">EN</a></li>
        </ul>
        <ul class="footer_bottom_links">
            <li><a href="#">Impressum</a></li>
            <li><a href="#">Datenschutz</a></li>
            <li><a href="#">© 2023</a></li>
            <li>
                <a href="#">
                    <img src="https://www.coop.ch/etc.clientlibs/insieme/clientlibs/headerlibs/resources/img/core/global-images/img/coop_logo.svg"
                         alt="Footer logo" class="footer_logo">
                </a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>