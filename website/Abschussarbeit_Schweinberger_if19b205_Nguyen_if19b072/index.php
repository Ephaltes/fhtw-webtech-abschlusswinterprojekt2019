<?php
session_start();
if (isset($_SESSION['Vorname'])) {
    $Vorname = $_SESSION['Vorname'];
} else {
    $Vorname = "anoym";
}
if (isset($_SESSION['Nachnahme'])) {
    $Nachnahme = $_SESSION['Nachnahme'];
} else {
    $Nachnahme = "";
}
if (isset($_SESSION['Privs'])) {
    $Privs = $_SESSION['Privs'];
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="nondynamicdata/css/index-stylesheet.css" type="text/css">

        <title>index.php!</title>
    </head>
    <body style="padding-top:60px;">
        <header>

            <nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
                <img src="nondynamicdata/img/342_logo_big_FH_only.png" class="pl-5 img-fluid " style="height:50px;">

                <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">
                        <li class="nav-item active"><span class="nav-link text-success"><?php echo"$Vorname $Nachnahme" ?></span></li> <!--shows name of logged in user -->
                        <?php
                        if (isset($_SESSION['Privs'])) {
                            echo ">About</a></li>\n";
                            echo "                        <li class=\"nav-item active\"><a class=\"nav-link text-success\" href=\"layer2/shop.php\">Shop</a></li>\n";
                            echo "                        <li class=\"nav-item active\">\n";
                            echo "                            <div id=\"shoppingcart\" class=\"nav-collapse cart-collapse\">\n";
                            echo "                                <ul class=\"nav pull-right\">\n";
                            echo "                                    <li class=\"dropdown open\">\n";
                            echo "                                        <a href=\"#\" data-toggle=\"dropdown\" class=\"dropdown-toggle nav-link text-success\"><img src=\"nondynamicdata/img/shopping-cart-icon.jpg\" alt=\"shopping-cart-icon\" style=\"width:20px;\"></a>\n";
                            echo "                                        <ul class=\"dropdown-menu p-2\" style=\"right: 0; left: auto;\">\n";
                            echo "                                            <li class=\"nav-header\">reeeeeeeee</li>\n";
                            echo "                                            <li>\n";
                            echo "                                                <span class=\"\">1x</span>\n";
                            echo "                                                <span class=\"\">Test Product </span>\n";
                            echo "                                                <span class=\"\"><a class=\"removefromcart\" href=\"#\">x</a></span>\n";
                            echo "                                            </li>\n";
                            echo "                                            <li><p>Total:</p></li>\n";
                            echo "                                            <li><a href=\"\">I wanna buy it daddy</a></li>\n";
                            echo "                                        </ul>\n";
                            echo "                                    </li>\n";
                            echo "                                </ul>\n";
                            echo "                            </div>\n";
                            echo "                        </li>\n";
                        }

                        if (!isset($_SESSION['Privs'])) {
                            echo "<li class=\"nav-item active\">\n";
                            echo "                            <div class=\"nav-item-dropdown dropdown\">                                \n";
                            echo "                                <span data-toggle=\"dropdown\" class=\"dropdown-toggle nav-link text-success\">Anmelden</span>\n";
                            echo "                                <div class=\"dropdown-menu drop-menu-right border-dark\" style=\"right: 0; left: auto;\">\n";
                            echo "                                    <form class=\"p-4\" methode=\"GET\" action=\"controller-index.php\">\n";
                            echo "                                        <div class=\"form-group\">\n";
                            echo "                                            <label for=\"User\">User</label>\n";
                            echo "                                            <input type=\"text\" class=\"form-control\" id=\"User\" name=\"username\" placeholder=\"admin\">\n";
                            echo "                                        </div>\n";
                            echo "                                        <div class=\"form-group\">\n";
                            echo "                                            <label for=\"Password\">Password</label>\n";
                            echo "                                            <input type=\"password\" class=\"form-control\" id=\"Password\" name=\"passwort\" placeholder=\"Password\">\n";
                            echo "                                        </div>\n";
                            echo "                                        <div class=\"form-check\">\n";
                            echo "                                            <input type=\"checkbox\" class=\"form-check-input\" id=\"dropdownCheck2\" name=\"forgetme\" value=\"plsdont\">\n";
                            echo "                                            <label class=\"form-check-label\" for=\"dropdownCheck2\">\n";
                            echo "                                                Remember me\n";
                            echo "                                            </label>\n";
                            echo "                                        </div>\n";
                            echo "                                        <button type=\"submit\" class=\"btn btn-primary\">Sign in</button>\n";
                            echo "                                    </form>\n";
                            echo "                                </div>\n";
                            echo "                            </div>\n";
                            echo "                           \n";
                            echo "                        </li> ";
                        }
                        if (isset($_SESSION['Privs'])) {
                            echo " <li class=\"nav-item active\"><a class=\"nav-link text-success\" href=\"abmelden.php\">Abmelden</a></li>\n";
                        }
                        ?>
                    </ul>
                </div>
            </nav>
            <div class="">
                <div id="quicklinks" class="bg-dark pt-1 pb-1 "> <!-- center this !!!edit-->
                    <ul class="d-flex align-content-start flex-wrap flex-xs-row pt-2">
                        <li class="col-1"><a class=" text-success" href="">randomNews1</a></li>
                        <li class="col-1"><a class=" text-success" href="">randomNews1</a></li>
                        <li class="col-1"><a class=" text-success" href="https://cis.technikum-wien.at/cis/index.php">CIS</a></li>
                        <li class="col-1"><a class=" text-success" href="https://www.technikum-wien.at/">FHTW</a></li>
                        <li class="col-1"><a class=" text-success" href="https://moodle.technikum-wien.at/">Moodle</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                        <li class="col-1"><a class=" text-success" href="">!!!edit</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <section id="News">
                <div class="container pt-5 pb-5">
                    <div class="row">
                        <div class="card border-success">
                            <div class="card-header">
                                <h5 class="text-center m-2 font-weight-bold" >FHTW NEWS</h5>
                            </div>
                            <div class="card mb-3 border-success border-left-0 border-right-0">
                                <div class="row no-gutters ">
                                    <div class="col-md-4">
                                        <img src="nondynamicdata/img/teammitglied1.jpg" class="card-img p-2 d-block mx-auto" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a class="card-title tect-success" href="layer2/dynamicnews.php"><h5>News1</h5></a>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 border-success  border-left-0 border-right-0">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="nondynamicdata/img/teammitglied1.jpg" class="card-img p-2 d-block mx-auto" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">News1</h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-success  border-left-0 border-right-0">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="nondynamicdata/img/teammitglied1.jpg" class="card-img p-2 d-block mx-auto" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">News1</h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


        <footer class="bg-dark pt-3 pb-3 text-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo1">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Social Networks</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3 "><a class="text-white" href="https://www.facebook.com" target="_blank">Facebook</a></li>
                            <li class="pl-3 pr-3"><a class="text-white" href="https://www.twitter.com" target="_blank">Twitter</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo2">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Kontact</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3"><a class="text-white" href="http://www.technikumwien.at" target="_blank">Webpage</a></li>
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo3">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">Terms of Use</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li class="pl-3 pr-3"><a class="text-white" href="">Copyright</a></li> <!-- Placeholder for Future use -->
                            <li class="pl-3 pr-3"><a class="text-white" href="">Privacy Policy</a></li> <!-- Placeholder for Future use-->
                        </ul>
                    </div>
                    <div class="border-dotted-left col-xs-12 col-sm-6 col-md-3 pt-2" id="hallo4">
                        <h4 class="pl-0 mb-0 pb-2 font-weight-bold">About</h4>
                        <ul class="d-flex align-content-start flex-wrap flex-xs-row flex-md-column pl-0">
                            <li  class="pl-3 pr-3">Technikum Wien</li>
                            <li  class="pl-3 pr-3">Bachelor of Informatics</li>
                            <li  class="pl-3 pr-3">1200 Wien</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>