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

<section id="Anleitung">
    <div class="container-fluid">
        <h1 class="text-center">Anleitung zur besten Website der Welt</h1>
        <div class="mt-5 container">
            <section class="mt-3"><h2>Allgemeines</h2>
                <p>Die Website ist über Tastatur erreichbar. News Karusell nur switchbar wenn News geöffnet jedoch nicht über die News Übersichtseite.
                    Eingeloggte User haben zugriff auf unseren Shop.
                    Admins können aus Internen gründen, den shop sowie shoppingcart und checkout aufrufen jedoch nichts kaufen.
            </section>
            <section class="mt-3"><h2>Nav-bar</h2>
                <h3>Warenkorbsymbol</h3>
                <p> Je nachdem wie viele gegenstände sich im Warenkorb befinden, nimmt die Navbar verschiedene Zustände an.</p>
                <ol>
                    <li> Sollte der Warenkorb leer sein, wird dieser <strong>Nicht</strong> als Symbol in der Navigationsleiste angezeigt.</li>
                    <li> Befinden sich weniger als 4 unterschiedliche gegenstände im Warenkorb so wird dieser als Dropdownmenü angezeigt. Sollten Sie sich auf einem Endgerät mit gerigner Bildschirmbreite befinden, so wird punkt 3 angezeigt ohne berücksichtigung der Warenanzahl.</li>
                    <li> Sollten sich mehr als 3 unterschiedliche Gegenstände im Warenkorb befinden so wird ein linksymbol angezeigt das direkt in den Checkoutbereich verlinkt. Sollten Sie sich auf einem Endgeräte mit gerringer Bildschirmbreite befinden so ist dies der Default zustand.
                </ol>
                <h3>Shoppingcart</h3>
                <ul>
                    <li>Durch klicken der <small><i  title="Entferne Ware" class=" text-danger fas fa-trash-alt"></i></small><span class="d-none">Entferne Ware</span> Wird die entsprechende Ware aus dem Warenkorb gelöscht</li>
                    <li>Durch klicken des <small><i  title="Ware um 1 erhöhen" class=" text-dark fas fa-plus"></i></small><span class="d-none">Ware um 1 erhöhren</span> Wird die entsprechende Ware um 1 erhöht</li>
                    <li>Durch klicken des <small><i  title="Ware um 1 verringern" class=" text-dark fas fa-minus"></i></small><span class="d-none">Ware um 1 verringern</span> Wird die entsprechende Ware um 1 verringert</li>
                </ul>    
            </section>
            <section class="mt-3">
                <h2>Colorhelper/Farbmodus</h2>
                <p> Unsere Website unterstützt alternative Farbmoduse. Sollten Sie nicht eingloggt sein, so finden sie unter login/settings eine Webpage zum Auswählen eines Passenden Farbmoduses, andernfalls im Dropdown-Menü ihres Namens. Dieser wird bei Ihnen als Cookie gespeichert und ist mindestens 1 Jahr gültig bis Sie ihn erneuern müssen.
                    Sollten Sie ihre Cookies löschen, so müsste der Farbenmodus von Ihnen neu gesetzt werden. Wenn sie den Standard-Farbenmodus wieder wollen so können sie dies auch im gleichen Menü vornehmen.
                    
            </section>
            <section class="mt-3"><h2>News</h2>
            <p>
                In der News übersicht, wird man durch ein klick auf das Bild zur jeweiligen News gebracht.
                <br>
                Der Admin kann über das DropDown Menü an seinem Namen in der Navbar zur News Verwaltung geleitet werden,
                <br>
                wo er dann eine Übersicht der News sieht, welche ihm die Möglichkeit gibt, diese zu bearbeiten , löschen
                <br>
                oder eine neue News zu erstellen. Beim erstellen wird dem Admin über eine Eingabemaske geholfen eingaben zu tätigen.
                
            <h3>Upload Bilder-Carousell-titelbild</h3>
                Sollten Sie nur ein Bild hochladen wollen so ist dies einfach über den upload-button zu tun, wenn Sie mehrere Titelbilder in das Carousell hochladen wollen, so wählen sie beim Upload mehrere Bilder gleichzeitig aus.
            </section>
            <section class="mt-3"><h2>Shop</h2>
                <p>
                    Legen sie Gegenstände in Ihren Warenkorb und klicken Sie anschließend im navbar auf den Warenkorb bzw im dortigen dropdown Menü auf Kaufen.
                    <br>Zum Löschen aus dem Warenkorb, Klicken Sie entweder im Shop-bereich auf Kaufen und anschließen in der Übersicht auf die Mülltonne. <br><small>Siehe Punkt: Nav-bar Warenkorb.</small> 
                    <br><br>Bei geringer Warenanzahl besteht die möglichkeit in der Navbarb direkt zu Löschen,<br><small>Siehe Punkt: Nav-bar Warenkorbymbol.</small> 
                </p></section>
            <section class="mt-3"><h2>Footer</h2>
                <p>
                    In Footer-bereich haben Sie Zugriff auf Kontakt möglichkeiten und Social-media präsenz sowie verwandte Websites des FHTW.
                    Durch klicken auf Zufällige News, werden sie auf eine zufällige News geleitet, der Button wird bei jedem seiten aufruf Verändert.

                </p>
            </section>
        </div>
    </div>
</section>