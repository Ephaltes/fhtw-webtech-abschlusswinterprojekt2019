<?php

require_once("Entities/UserEntity.php");

session_start();

if (empty($_COOKIE['USERHASH']) && empty($_SESSION["user"])) {
    header('location: sites/logincheck.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css" type="text/css">


    <?php require_once("sites/lib_include/fontawesome.php");?>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/popper-utils.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>


    <title>News Verwaltung</title>

</head>
<body style="padding-top:40px;">
<header>
    <?php include('sites/nav_footer/navbar.php'); ?>
</header>

<div>

    <div class="d-flex" id="wrapper">


        <!-- Sidebar
        <nav class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center list-group-item">Menü</div>
            <div class="list-group list-group-flush">
                <a href="news_admin.php" class="list-group-item list-group-item-action pl-3">News Verwaltung</a>
                <a href="news_admin.php?menu=create" class="list-group-item list-group-item-action pl-3">News
                    erstellen</a>
                <a href="index.php" class="list-group-item list-group-item-action pl-3">Hauptseite</a>
            </div>
        </nav>
        /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
         <!--   <nav class="navbar navbar-expand-lg navbar-light  ">
                <button class="btn btn-lg" id="menu-toggle">&#9776;</button>
            </nav> -->
            <div class="col-md-12 display-4 text-center mb-5">News Verwaltung</div>
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
