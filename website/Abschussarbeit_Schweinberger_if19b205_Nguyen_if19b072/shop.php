<?php
require_once("sites/dependency_include/include_user.php");

use Model\UserModel;

session_start();

if (!empty($_GET["logout"])) {
    session_destroy();
    unset($_COOKIE['USERHASH']);
    setcookie("USERHASH", "", 1, '/');
    header('location: /');
}

if (!empty($_SESSION["user"])) {
    if (UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<?php include('sites/shop/shoppingcartadd.php') // needed to add items to cart initally     ?>
<!doctype html>
<html lang="de">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Shop für die FH-Technikum">
        <meta name="keywords" content="shop,merchandise,kaufen,buy">
        <meta name="author" content="Lukas Schweinberger,Lam Nguyen">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" type="text/css">
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

        </header>
        <main>
            <?php
            if (!empty($_GET['viewme']) && $_GET['viewme'] == "checkout") {
                include('sites/shop/checkout.php');
            } else {
                include('sites/shop/shopitem.php');
            }
            ?>
        </main>

        <footer class="container-fluid p-0 m-0">
            <?php include('sites/nav_footer/quicklinks.php'); ?>
            <?php include('sites/nav_footer/footer.php'); ?>
        </footer>
        
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
    </body>
</html>