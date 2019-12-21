<?php
require_once("Entities/UserEntity.php");
session_start();

if (!empty($_GET["logout"])) {
    session_destroy();
    unset($_COOKIE['USERHASH']);
    setcookie("USERHASH", "", 1, '/');
    header('location: /');
}

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header('Location: /');
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<?php include('sites/shoppingcartedit/shoppingcartadd.php') // needed to add items to cart initally   ?>
<!doctype html>
<html lang="de">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--  <link rel="stylesheet" href="css/MARKEDforDELETIONindex-stylesheet.css" type="text/css"> -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <?php require_once("sites/lib_include/fontawesome.php"); ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="js/ads.js"></script>


        <title>index.php!</title>
    </head>
    <body>
        <header>

            <?php include('sites/nav_footer/navbar.php'); ?>

        </header>
        <main>
            <?php
            if (!empty($_GET['viewme']) && $_GET['viewme'] == "checkout") {
                include('sites/checkout.php');
            } else {
                include('sites/dynamicshop.php');
            }
            ?>
        </main>
        <?php include('sites/nav_footer/quicklinks.php'); ?>
        <?php include('sites/nav_footer/footer.php'); ?>
    </body>
    <script>
        $(document).ready(function () {
            $("#checkoutform").submit(function (event) {
                if (confirm("Kauf Kostenpflichtig abschließen?")) {
                } else {
                    event.preventDefault();
                }
            });
        });
    </script>
</html>