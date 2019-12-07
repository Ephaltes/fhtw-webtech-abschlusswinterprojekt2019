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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index-stylesheet.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="img/748989-200.png">
        <?php require_once("sites/lib_include/fontawesome.php"); ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://kit.fontawesome.com/34bdaf57ad.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>



        <title>1nicer shop</title>
    </head>
    <body style="padding-top:40px;">
        <header>

            <?php include('sites/nav_footer/navbar.php'); ?>

            <section id="ads">
                <div class="p-3">
                    <?php
                    $images = glob('data/advertisment/' . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    $Werbung = $images[array_rand($images)];
                    echo"<img src=\"$Werbung\" class=\"d-none d-sm-block img-fluid mx-auto rounded\" alt=\"Unsere Werbung\"></img>";
                    ?>

                </div>
            </section>
        </header>
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
                default:
                    echo"couldnt match a view";
                    break;
            }
        } else {
            if (empty($_GET["news"]))
                include("sites/news/all_news.php");
            else
                include("sites/news/news.php");
        }
        ?>

        <?php include('sites/nav_footer/quicklinks.php'); ?>
        <?php include('sites/nav_footer/footer.php'); ?>


    </body>
</html>
