<?php
require_once("Entities/UserEntity.php");
session_start();

if (!empty($_GET["logout"])) {
    session_destroy();
    unset($_COOKIE['USERHASH']);
    setcookie("USERHASH", "", -(60 * 60 * 25), '/');
    header('location: /');
}

if (isset($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
}
//check usermodel for cookiemonster and logincheck.php for call of function

if (!empty($_SESSION["user"])) {
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
        <meta name="keywords" content="FH,Technikum,wien,projekt,abschluss">
        <meta name="author" content="Lukas Schweinberger,Lam Nguyen">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- <link rel="stylesheet" href="css/MARKEDforDELETIONindex-stylesheet.css" type="text/css"> -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="img/748989-200.png">
        <?php require_once("sites/lib_include/fontawesome.php"); ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="js/site.js"></script>

        <title>FHTW Shop&News</title>
    </head>
    <body>
        <header>

            <?php include('sites/nav_footer/navbar.php'); ?>

            <section id="ads">
                <div class="d-xs-none d-md-block p-3">
                    <?php
                    $images = glob('data/advertisment/' . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    $Werbung = $images[array_rand($images)];
                    echo"<img src=\"$Werbung\" class=\"d-none d-sm-block img-fluid mx-auto rounded\" alt=\"Please disable adblock\"></img>";
                    ?>
                </div>
            </section>
        </header>

        <main>
            <?php
            if (!empty($_GET['viewme'])) {
                switch ($_GET['viewme']) {
                    case "About":
                        include('sites/about.php');
                        break;
                    case "Impressum":
                        include('sites/Legal_law/Impressum.php');
                        break;
                    case "Datenschutz":
                        include('sites/Legal_law/Datenschutz.php');
                        break;
                    case "AGB":
                        include('sites/Legal_law/AGB.php');
                        break;
                    case "Kontakt":
                        include("sites/contact.php");
                        break;
                    case "Anleitung":
                        include("sites/Anleitung.php");
                        break;
                    default:
                        ?>
                        <div class="text-center py-3">
                            <h1 class="pb-2">Sorry, wir fanden keine passende View in unserer Datenbank!</h1>
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
            echo"<script>$(document).ready(function () {confirm(\"Vielen Dank! Ihre Bestellung wird schnellsmöglich bearbeitet <3\");});</script>";
            unset($_SESSION['Einkaufdank']);
        }
        ?>
    </body>
</html>
