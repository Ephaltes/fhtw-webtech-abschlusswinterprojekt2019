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

<section id ="AGB">
    <div class="container py-2">
        <h1 class="text-break"> Allgemeine Geschäftsbedingungen (AGB)</h1>
        <h3 class="mt-1">§ 1 Verwender</h3>
        Als Verwender dieser AGB gilt:

        LamIncorperated
        Musterstrasse 1 
        Stiege 5 Tür 7
        4321 Grünheim
        Österreich
        Registernummer: 7891011
        Registergericht: Amtsgericht Wiesenau

        <h3 class="mt-1">§ 2 Geltungsbereich</h3>
        Diese Allgemeinen Geschäftsbedingungen gelten für alle Rechtsgeschäfte zwischen dem Verwender und einem Verbraucher (Gemäß § 13 BGB einer „natürlichen Person, die ein Rechtsgeschäft zu Zwecken abschließt, die überwiegend weder ihrer gewerblichen noch ihrer selbständigen beruflichen Tätigkeit zugerechnet werden können“).

        <h3 class="mt-1"> § 3 Vertragsschluss und Speicherung des Vertragstextes</h3>
        Die Bestimmungen dieser AGB gelten für Bestellungen, welche Verbraucher über die Website localhost-domain des Onlineshops Modellshop abschließen.

        Der Vertrag kommt mit dem Verwender (siehe § 1) zustande.

        Die Vorstellung und Beschreibung der Waren auf der Internetseite des Modellshops localhost-domain  stellt kein Vertragsangebot dar.

        Mit der Bestellung einer Ware durch einen Klick auf den Button „kostenpflichtig bestellen“ am Ende des Bestellvorgangs gibt ein Verbraucher ein verbindliches Angebot auf einen Kaufvertragsabschluss ab. Erst mit dem Versand einer Auftragsbestätigung per E-Mail durch den Verwender kommt der Vertragsschluss zustande.

        Der Vertragstext wird bei Bestellungen gespeichert. Verbraucher erhalten eine E-Mail mit den Bestelldaten und den geltenden AGB. Nach Vertragsschluss sind die Bestelldaten nicht mehr online einsehbar.

        <h3 class="mt-1"> § 4 Zahlung</h3>
        Die gesetzliche Umsatzsteuer sowie weitere Preisbestandteile sind in den angegebenen Preisen inbegriffen. Versandkosten sind nicht im angezeigten Preis enthalten und können ggf. zusätzlich anfallen.
        Verbrauchern stehen folgende Zahlungsoptionen zur Verfügung:
        <ol class="mt-1">
            <li>Paypal</li>
            <li>Überweisung</li>
            <li>Nachnahme</li>
            <li>Bei Abholung an der FHTW</li>
        </ol>

        <h3 class="mt-1"> § 5 Lieferung, Lieferungsbeschränkungen</h3>
        Die Lieferung erfolgt – sofern die Beschreibung eines gewählten Produkts nicht explizit Abweichendes festlegt – innerhalb von 7 Werktagen.
        Diese Frist beginnt im Falle der Zahlung via Überweisung oder Paypal am Tag nach Erteilung des Zahlungsauftrages zu laufen.

        <h3 class="mt-1"> § 6 Gefahrenübergang</h3>
        Das Risiko einer zufälligen Verschlechterung oder einem zufälligen Verlust der Ware liegt bis zur Übergabe der Ware beim Verwender und geht es mit der Übergabe auf den Verbraucher über.

        <h3 class="mt-1">  § 7 Eigentumsvorbehalt</h3>
        Bis zum vollständigen Empfang des Kaufpreises behält sich der Verwender das Eigentum an der Ware vor.

        <h3 class="mt-1">  § 8 Gewährleistung</h3>
        Die gesetzlichen Gewährleistungsregelungen gelten.
    </div>
</section>