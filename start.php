<?php
/**
 * Created by PhpStorm.
 * User: lotus
 * Date: 31/05/2018
 * Time: 20:28
 */

session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Music WebShop</title>
    <link rel='stylesheet' href='styles.css'/>
</head>
<body>
<div class="wrapper">
    <div class="contentwrapper">
        <header>
            <div class="row">
                <div class="leftcolumn">
                    <img src="images/logo_icoon_tuneshop.png" id="logo" alt="Logo TuneShop">
                </div>
                <div class="middlecolumn">
                    <img src="images/logo_tuneshop.png" id="logoText" alt="TuneShop">
                </div>
                <div class="rightcolumn">
                    <?php if ($_SESSION_["loggedIn"]): ?>
                        Welkom <?=$_SESSION["userName"]?>
                    <?php else: ?>
                        <form action="/login.php" method="post">
                            <!--<div class="imgcontainer">-->
                            <img src="images/avatar.png" alt="Avatar" class="avatar">
                            <!--</div>-->
                            <h3>LOGIN</h3>
                            <div class="container">
                                <input type="text" placeholder="Gebruikersnaam" name="uname" required>
                                <input type="password" placeholder="Wachtwoord" name="psw" required>
                            </div>
                            <div class="container">
                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Onthouden
                                </label>
                                <button type="submit">Login</button>
                            </div>
                            <div class="container">
                                <span class="psw"><a href="#">Vergeten?</a></span>
                                <a href="#">Registreer</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <div class="topnav">
                <a class="active" href="#home">Home</a>
                <a href="#nieuws">Nieuws</a>
                <a href="#acties">Contact</a>
                <a href="#overons">Over ons</a>
                <a href="#vacatures">Vacatures</a>
                <a href="#webshop">Webshop</a>
            </div>
        </header>
        <main>
            <article>
                <h1>Over Ons</h1>
                <h2>Wie zijn wij</h2>
                <div class="clearfix">
                    <img src="images/muziekwinkel.jpg" id="whoAreWe" alt="Muziekwinkel">
                    <p>Op deze website is een breed assortiment aan professionele muziekinstrumenten,
                        geluidsinstallaties en
                        andere
                        benodigdheden voor de muziek zoals bladmuziek te vinden. Music Webshop is een betrouwbare online
                        webwinkel
                        met
                        service, vakkennis en passie voor muziek!
                        Wij staan bekend om deskundig advies en een goede, vertrouwde service. Ons assortiment bestaat
                        uit
                        acoustische
                        en
                        elektrische instrumenten van gerenommeerde fabrikanten zoals Yamaha, Roland, Kawai, Fender en
                        Ibanez.
                        Wij verkopen muziekinstrumenten tegen een lage prijs. Als u op zoek bent naar goede
                        muziekinstrumenten
                        of
                        geluidsinstallaties dan kunnen wij u helpen met aantrekkelijke aanbiedingen. Topprijzen zijn
                        gegarandeerd!
                    </p></div>
            </article>
            <article>
                <h2>Routebeschrijving</h2>
                <div class="clearfix">
                    <iframe class="routeMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d548.9793552276695!2d5.862302858947662!3d51.84572267227551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7084371b5c6f7%3A0xc3a579dda0fbe9b7!2sEethuis+Plein+1944!5e0!3m2!1snl!2snl!4v1526668803475"
                            align="right" width="600" height="450" frameborder="0" style="border:0"
                            allowfullscreen></iframe>
                    <p>Music Webshop is dé plek voor al jouw muziek gerelateerde gear. Dit nieuwe pand is een
                        servicepunt
                        voor
                        alle
                        Nijmeegse muzikanten, producers en dj's. Onze 800 vierkante meter grote muziekwinkel is op
                        loopafstand
                        van
                        Nijmegen
                        Centraal Station, is zes dagen per week geopend en goed te bereiken per de auto.<br><br>
                        <em>Adres</em>:&nbsp;&nbsp;Plein 44-20<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6511 JC Nijmegen<br>
                        <em>Telefoonnummer</em>: 024-1122334<br>
                        <em>E-mailadres</em>: info@music_webshop.nl<br><br>
                        OPENINGSTIJDEN<br>
                        Maandag - vrijdag 10:00 - 18:00<br>
                        Donderdag 10:00-21:00<br>
                        Zaterdag 10:00-17:00<br></p>
                </div>
            </article>
        </main>
    </div>
    <div class="advertisementwrapper">
    </div>
</div>
</body>
</html>
