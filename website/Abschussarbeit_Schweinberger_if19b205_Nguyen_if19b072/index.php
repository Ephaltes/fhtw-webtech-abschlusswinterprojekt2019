<?php
require_once ("Entities/UserEntity.php");
session_start();

if (!empty($_GET["logout"])) {
    session_destroy();
    unset($_COOKIE['USERHASH']);
    setcookie("USERHASH", "", 1, '/');
    header('location: /');
}

//check usermodel for cookiemonster and logincheck for call of function
if (isset($_COOKIE['USERHASH'])) {
    $xml = simplexml_load_file("data/xml/user.xml") or die("Error: Cannot access database");
    foreach ($xml->xpath('//user') as $hashcheck) {
        $compare = strval($hashcheck->username);
        $hashme = preg_replace("/[^a-z0-9A-Z]/", "", $compare);
        $hashed = hash('sha256', "$hashme");
        if ($hashed == $_COOKIE['USERHASH']) {
            //var_dump($hashed);
        }
    }
}

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>
<!doctype html>
<html lang="de">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/index-stylesheet.css" type="text/css">

        <title>index.php!</title>
    </head>
    <body style="padding-top:60px;">
        <header>

            <?php include('sites/navbar.php'); ?>
            <?php include('sites/quicklinks.php'); ?>
        </header>
        <main>
            <?php include('sites/dynamicnews.php'); ?>
        </main>


        <?php include('sites/footer.php'); ?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>