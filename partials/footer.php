 <section class="newsletter">
        <h2>Ihr Coop-Newsletter</h2>
        <p>Erhalten Sie wöchentlich Informationen über Aktionen, Promotionen, exklusive Rabatte sowie aktuelle News rund
            um Ihren Einkauf auf coop.ch.</p>
        <form action="">
            <label>
                <input type="email" placeholder="Ihre E-Mail-Adresse">
            </label>
            <button type="submit" class="primary">Abonnieren</button>
        </form>
    </section>

    <div class="modal">
        <div class="modal_overlay"></div>
        <div class="modal_content">
            <div class="modal_close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h3>Melden Sie sich an</h3>
            <p>Mit dem Supercard ID Login anmelden, um bei coop.ch alle Vorteile zu nutzen.</p>
            <a href="new_id_login.php" class="blue_btn"><i class="fa-solid fa-credit-card"></i>Supercard ID Login</a>
            <ul class="modal_list">
                <li><i class="fa-solid fa-circle-check"></i>Digitale Bons einlösen und profitieren</li>
                <li><i class="fa-solid fa-circle-check"></i>Mit Digitaler Zahlkarte / Superpunkten bezahlen</li>
                <li><i class="fa-solid fa-circle-check"></i>Jederzeit Digitale Kassenzettel aller Einkäufe einsehen</li>
                <li><i class="fa-solid fa-circle-check"></i>Ein Login für alle Coop-Services</li>
            </ul>
            <a href="#" class="modal_link">Jetzt Supercard ID Login erstellen</a>
            <div class="line_text">oder</div>
            <p>Mit dem coop.ch Login anmelden für den einfachen Einkauf bei coop.ch.</p>
            <a href="#" class="primary coop_btn">coop.ch Login</a>
            <a href="#" class="modal_link">Jetzt neu registrieren</a>
        </div>



    </div>
    <div class="modal login_modal" style="display: none">
        <div class="modal_content">
            <div class="modal_close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h3> Melden Sie sich mit Ihrem coop.ch Login an</h3>
            <form action="" class="login_form">
                <div class="form_item ">
                    <label for="login-modal__email" class="form__label ">E-Mail-Adresse</label>
                    <input class="form-item-input login-modal__input" type="email" name="e_main" id="login-modal__email" value="" >
                </div>
                <div class="form_item form_item_pass">
                    <div class="password_label" >
                        <label for="login-modal__password" class="form__label ">Passwort</label>
                        <a href="#">Passwort vergessen?</a>
                    </div>

                    <input   class="form-item-input login-modal__input" type="password" name="e_main" id="login-modal__password" value="" >

                </div>

                <div class="form_item_check">
                    <input type="checkbox" id="login-modal__checkbox">
                    <label for="login-modal__checkbox">Angemeldet bleiben</label>
                </div>
                <div class="form_item_btn">
                    <button>Anmelden</button>
                </div>
                <div class="form_item_link">
                    <a href="#">Zurück</a>
                </div>

            </form>

        </div>
    </div>



</main>
<footer>
    <div class="footer_top">
        <ul class="footer_top_links">
            <li><a href="#">Highlights <span></span></a></li>
            <li><a href="#">Bei coop.ch einkaufen <span></span></a></li>
            <li><a href="#">Services <span></span></a></li>
            <li><a href="#">Supercard und Clubs <span></span></a></li>
            <li><a href="#">Unternehmen <span></span></a></li>
        </ul>
    </div>
    <div class="footer_middle">
        <div class="footer_label">Kundendienst</div>
        <a href="#" target="_blank" class="footer_link">Kontaktformular</a>
        <p class="footer_paragraph">Telefonnummer</p>
        <a href="#" class="footer_link">0848 888 444</a>
        <div class="footer_widget">
            <div class="footer_label">Adresse</div>
            <p class="footer_address">Coop Genossenschaft<br>Kundendienst<br>Postfach 2550<br>4002 Basel</p>
        </div>
        <div class="footer_widget">
            <div class="footer_label">Coop Apps</div>
            <div class="footer_apps">
                <a href="#">
                    <img src="https://www.coop.ch/etc.clientlibs/insieme/clientlibs/headerlibs/resources/img/core/button/img/app-store/appstore-button_de.png"
                         alt="App Store">
                </a>
                <a href="#">
                    <img src="https://www.coop.ch/etc.clientlibs/insieme/clientlibs/headerlibs/resources/img/core/button/img/gle/de_badge_web_generic.png"
                         alt="Google Play">
                </a>
            </div>
            <div class="footer_label">Folgen Sie uns:</div>
            <div class="footer_socials">
                <a href="#">
                    <i class="fa-brands fa-facebook-square"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
            <div class="footer_award">
                <img src="https://www.coop.ch/content/insieme/de/_jcr_content/_072-pageFooter/imageSiegel.68.jpg/1682497777417.jpg/-1690289365.jpg"
                     alt="Award">
            </div>
        </div>
    </div>
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
            <li><a href="#">23.4.0.269 | 23.4.0.4</a></li>
            <li><a href="#">P03</a></li>
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


<script type="application/javascript">
    let login_modal = document.querySelector('.coop_btn');
    let login_modal_div = document.querySelector('.login_modal')
    let modal_content = document.querySelector('.modal_content')

    login_modal.addEventListener('click', ()=>{
        modal_content.style.display = 'none'
        login_modal_div.style.display = 'flex'

    })
</script>
</body>

</html>