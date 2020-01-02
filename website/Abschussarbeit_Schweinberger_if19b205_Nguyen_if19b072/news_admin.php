<?php

require_once("sites/dependency_include/include_user.php");
use Model\UserModel;
session_start();

if (empty($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
}

if (!empty($_SESSION["user"])) {
    if(UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}else{
    header('location: /');
}
if($user->usertype!='admin'){
    header('location: /');
}
?>

<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administratorbereich für die News der Projektabgabge für die FH-Technikum">
    <meta name="keywords" content="FH,Technikum,wien,projekt,abschluss,administrator,news,admin,news erstelle,create news">
    <meta name="author" content="Lukas Schweinberger,Lam Nguyen">
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css" type="text/css">


    <link rel="stylesheet" href="vendor/fontawesome/css/all.css" type="text/css">


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/popper-utils.js"></script>
    <script src="js/bootstrap.js"></script>


    <title>News Verwaltung</title>

</head>
<body>
<header>
    <?php include('sites/nav_footer/navbar.php'); ?>
</header>

<div>

    <div class="d-flex" id="wrapper">



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="col-md-12 display-4 mt-3 text-center mb-5">News Verwaltung</div>
            <main class="container-fluid m-2 h-auto" id="body_partial">
                <?php
                if ( (!empty($_GET["menu"]) && $_GET["menu"] == "create") || !empty($_GET["edit"]) )
                    require("sites/news/createnews.php");
                else
                    {
                    require("sites/news/display_news_admin.php");
                }
                ?>
            </main>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
</div>


<!-- Optional JavaScript -->

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>
