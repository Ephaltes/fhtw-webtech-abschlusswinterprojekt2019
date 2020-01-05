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
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') { // get link of website needed for shoppingcart actions
    $link = "https";
} else {
    $link = "http";
}
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];

// Print the link 
//echo $link;
?>
<nav class="navbar navbar-dark navbar-expand-md bg-dark rounded-bottom fixed-top header-graphic" role="navigation">
    <a href="/" tabindex="-1" role="link">
        <img src="img/342_logo_big_FH_only.png" class="pl-5 img-fluid" id="brand" alt="brandlogo">
    </a>
    <button class="navbar-toggler justify-content-end" role="button" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse" >
        <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">

            <li class="nav-item active"><a class="nav-link lead text-light" role="link" href="index.php" tabindex="1">News</a></li>
            <li class="nav-item active"><a class="nav-link lead text-light" role="link" href="index.php?viewme=About" tabindex="2">About</a></li>
            <?php if (!empty($user->usertype)) {
                ?>
                <li class="nav-item active"><a role="link" class="nav-link lead text-light" href="shop.php" tabindex="3">Shop</a></li>
                <li id="mobileshopymbol" class="d-md-none d-xs-block"><a role="link" href="shop.php?viewme=checkout" class="nav-link lead text-light" tabindex="4"><?php include('sites/shop/shoppingcartnavbarsymbol.php'); ?></a></li><!-- creates 2 navbar shopping icons, displays 1 of them depending on width of screen, mobil instant directs to checkout, desktop shows cart -->
                <li id="desktopshopymbol" class="d-none d-md-block"><?php include('sites/shop/shoppingcartitemcount.php'); ?></li> <!-- creates 2 navbar shopping icons, displays 1 of them depending on width of screen, mobil instant directs to checkout, desktop shows cart -->
                <?php
                }
                if (empty($user)) {
                    ?>
                <li class="dropdown">
                    <a href="" class="nav-link lead dropdown-toggle text-light" id="adminmenu" role="link" data-toggle="dropdown"
                       aria-expanded="false" tabindex="5">
                        Login/settings
                    </a>
                    <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="adminmenu">
                        <!-- position-absolute entfernt -->
                        <a role="link" class="dropdown-item" href="login.php" tabindex="5"><i title="Login" class="fas fa-sign-in-alt"></i> Login</a>
                        <a role="link" class="dropdown-item" href="index.php?viewme=Colorhelper" tabindex="7"><i title="Farbenhilfe" class="fas fa-palette"></i> Farbenhilfe</a>                     
                    </div>

                </li>
                <?php
            }
            
           
            if (!empty($user)) {
                ?>
                <li class="dropdown">
                    <a href="" class="nav-link lead dropdown-toggle text-light" id="adminmenu" role="link" data-toggle="dropdown"
                       aria-expanded="false" tabindex="5">
                        <?php echo $user->firstname . $user->lastname; ?> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="adminmenu">
                        <!-- position-absolute entfernt -->
                        <?php if ($user->usertype == "admin") { ?>
                            <a role="link" class="dropdown-item" href="news_admin.php" tabindex="6"><i title="link to news edit" class="fas fa-newspaper" ></i> News
                                Verwaltung</a>
                        <?php } ?>
                        <a role="link" class="dropdown-item" href="shop.php?viewme=MeineBestellungen" tabindex="7"><i class="far fa-sticky-note"></i> Bestellungen</a>
                        <a role="link" class="dropdown-item" href="index.php?viewme=Colorhelper" tabindex="8"><i title="Farbenhilfe" class="fas fa-palette"></i> Farbenhilfe</a>
                        <a role="link" class="dropdown-item" href="index.php?logout=true" tabindex="9"><i title="Abmelden" class="fas fa-sign-out-alt"></i> Abmelden</a>
                    </div>

                </li>
            <?php } ?> <!--shows name of logged in user -->


        </ul>
    </div>
</nav>
<?php $_SESSION['keepopen'] = "false"; ?>  <!-- keepopen to show dropdown onklick reset  -->