<?php
//integrate UserEntity Class
require_once("sites/dependency_include/include_user.php");
use Model\UserModel;
session_start();

//If Logout is set delete everything
if (!empty($_GET["logout"])) {
    session_destroy();
    unset($_COOKIE['USERHASH']);
    setcookie("USERHASH", "", -(60 * 60 * 25), '/');
    header('location: /');
}

//if Cookie is there but not logged in
if (isset($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
}


if (!empty($_SESSION["user"])) {
    if(UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!doctype html>
<html lang="de">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Projektwebseite für die FH-Technikum">
        <meta name="keywords" content="FH,Technikum,wien,projekt,abschluss,about,term,legal,agb,datenschutz,privacy,manual,anleitung">
        <meta name="author" content="Lukas Schweinberger,Lam Nguyen">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="img/748989-200.png">
        <link rel="stylesheet" href="vendor/fontawesome/css/all.css" type="text/css">
        
        
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/popper-utils.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/site.js"></script>

        <title>FHTW Shop&News</title>
    </head>
    <body>
        <header>

            <?php include('sites/nav_footer/navbar.php'); ?>

            <section id="ads">
                <div role="img" aria-label="Unsere Werbung" class="d-xs-none d-md-block p-3">
                    <?php
                    $images = glob('data/advertisment/' . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    $Werbung = $images[array_rand($images)];
                    echo"<img  src=\"$Werbung\" class=\"d-none d-sm-block img-fluid mx-auto rounded\" alt=\"Please disable adblock\">";
                    ?>
                </div>
            </section>
        </header>

        <main>
            <?php
            if (!empty($_GET['viewme'])) {
                switch ($_GET['viewme']) {
                    case "About":
                        include('sites/legal_law_about/about.php');
                        break;
                    case "Impressum":
                        include('sites/legal_law_about/legal_notice.php');
                        break;
                    case "Datenschutz":
                        include('sites/legal_law_about/dataprivacy.php');
                        break;
                    case "AGB":
                        include('sites/legal_law_about/terms.php');
                        break;
                    case "Kontakt":
                        include("sites/legal_law_about/contact.php");
                        break;
                    case "Anleitung":
                        include("sites/legal_law_about/manual.php");
                        break;
                    default:
                        ?>
                        <div class="text-center py-3">
                            <h1 class="pb-2">Sorry, wir fanden keine passende Unterwebseite in unserer Datenbank!</h1>
                            <a class="btn btn-primary" tabindex="25" href="index.php">Zurück zur News-Übersicht</a>
                        </div>
                        <?php
                        break;
                }
            } else {
                if (empty($_GET["news"]))
                    include("sites/news/all_news.php");
                else
                    include("sites/news/news.php");
            }
            ?>
        </main>

        <footer class="container-fluid p-0 m-0">
            <?php include('sites/nav_footer/quicklinks.php'); ?>
            <?php include('sites/nav_footer/footer.php'); ?>
        </footer>

        <?php
        if (!empty($_SESSION['Einkaufdank'])) {
            echo"<script>$(document).ready(function () {alert(\"Vielen Dank! Ihre Bestellung wird schnellsmöglich bearbeitet <3\");});</script>";
            unset($_SESSION['Einkaufdank']);
        }
        ?>
    </body>
</html>
