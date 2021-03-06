<?php
//integrate UserEntity Class
$root = $_SERVER['DOCUMENT_ROOT'];
$dep_inj = "/sites/dependency_include/include_user.php";
require_once($root . $dep_inj);
use Model\UserModel;

if (!empty($_SESSION["user"])) {
    if(UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}?>

<section id ="Impressum">
    <div class="container py-2">
        <h1 class="">Impressum</h1>
        <p class="">Informationspflicht laut §5 E-Commerce Gesetz, §14 Unternehmensgesetzbuch, §63 Gewerbeordnung und Offenlegungspflicht laut §25 Mediengesetz.</p>
        <p class="">LamIncorperated<br />Lukas Schweinberger<br />Musterstrasse 1, Stiege 5 Tür 7, <br />4321 Grünheim, <br />Österreich</p>
        <p class="">
            <strong>Unternehmensgegenstand:</strong> IT Dienstleistungen/Webshop<br />
            <strong>UID-Nummer:</strong> ATU12345678<br />
        </p>
        <p class="">
            <strong>Tel.:</strong> 01234/56789<br />
            <strong>Fax:</strong> 01234/56789-0<br />
            <strong>E-Mail:</strong> <a href="mailto:rothexD@gmail.com">rothexD@gmail.com</a>
        </p>
        <p class="">
            <strong>Mitglied bei:</strong> WKO<br />
            <strong>Berufsrecht:</strong> Gewerbeordnung: www.ris.bka.gv.at</p>
        <p class="">
            <strong>Aufsichtsbehörde/Gewerbebehörde:</strong> Bezirkshauptmannschaft Musterhausen<br />
            <strong>Berufsbezeichnung:</strong> Webdesigner, Newsportal, Webshop<br />
            <strong>Verleihungsstaat:</strong> Österreich</p>
        <p class="">
            <strong>Blattlinie</strong>
            <br>z.B. Informationen rund um Schönheitsbehandlungen und Schönheitsoperationen sowie kosmetische Behandlungen und Erfahrungsberichte darüber.</p>
        <p>Quelle: Erstellt mit dem <a rel="noreferrer" title="Impressum Generator von firmenwebseiten.at" href="https://www.firmenwebseiten.at/impressum-generator/" target="_blank" >Impressum Generator von firmenwebseiten.at</a> in Kooperation mit <a href="https://www.wallentin.cc" rel="noreferrer" target="_blank" rel="follow" title="Schönheitsbehandlungen in Wien - mit und ohne Operation bei Dr. Valentin" style="text-decoration:none;">wallentin.cc</a>
        </p>
        <h2 class="">EU-Streitschlichtung</h2>
        <p>Gemäß Verordnung über Online-Streitbeilegung in Verbraucherangelegenheiten (ODR-Verordnung) möchten wir Sie über die Online-Streitbeilegungsplattform (OS-Plattform) informieren.<br />
            Verbraucher haben die Möglichkeit, Beschwerden an die Online Streitbeilegungsplattform der Europäischen Kommission unter <a rel="noreferrer" class="" href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&lng=DE"  target="_blank"  class="external" rel="nofollow">http://ec.europa.eu/odr?tid=221108837</a> zu richten. Die dafür notwendigen Kontaktdaten finden Sie oberhalb in unserem Impressum.</p>
        <p>Wir möchten Sie jedoch darauf hinweisen, dass wir nicht bereit oder verpflichtet sind, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
        <h2 class="">Haftung für Inhalte dieser Webseite</h2>
        <p>Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen uns korrekte und aktuelle Informationen bereitzustellen. Leider können wir keine Haftung für die Korrektheit aller Inhalte auf dieser Webseite übernehmen, speziell für jene die seitens Dritter bereitgestellt wurden.</p>
        <p>Sollten Ihnen problematische oder rechtswidrige Inhalte auffallen, bitten wir Sie uns umgehend zu kontaktieren, Sie finden die Kontaktdaten im Impressum.</p>
        <h2 class="">Haftung für Links auf dieser Webseite</h2>
        <p>Unsere Webseite enthält Links zu anderen Webseiten für deren Inhalt wir nicht verantwortlich sind. Haftung für verlinkte Websites besteht laut <a rel="noreferrer" class="" href="https://www.ris.bka.gv.at/Dokument.wxe?Abfrage=Bundesnormen&Dokumentnummer=NOR40025813&tid=221108837" target="_blank" class="external">§ 17 ECG</a> für uns nicht, da wir keine Kenntnis rechtswidriger Tätigkeiten hatten und haben, uns solche Rechtswidrigkeiten auch bisher nicht aufgefallen sind und wir Links sofort entfernen würden, wenn uns Rechtswidrigkeiten bekannt werden.</p>
        <p>Wenn Ihnen rechtswidrige Links auf unserer Website auffallen, bitten wir Sie uns zu kontaktieren, Sie finden die Kontaktdaten im Impressum.</p>
        <h2 class="">Urheberrechtshinweis</h2>
        <p>Alle Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem Urheberrecht. Falls notwendig, werden wir die unerlaubte Nutzung von Teilen der Inhalte unserer Seite rechtlich verfolgen.</p>
        <h2 class="">Bildernachweis</h2>
        <p>Die Bilder, Fotos und Grafiken auf dieser Webseite sind urheberrechtlich geschützt.</p>
        <p>Die Bilderrechte liegen bei den folgenden Fotografen und Unternehmen:</p>
        <ul class="">
            <li class="">Lukas Schweinberger</li>
            <li class="">Lam Ey keine Ahnung wie man deinen Namen genau schreibt edit!!!</li>
        </ul>
    </div>
</section>