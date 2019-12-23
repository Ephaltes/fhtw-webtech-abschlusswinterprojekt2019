<?php
require_once("Entities/UserEntity.php");
?>
<?php
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
<nav class="navbar navbar-dark navbar-expand-md bg-dark rounded-bottom fixed-top">
    <a href="/">
        <img src="img/342_logo_big_FH_only.png" class="pl-5 img-fluid" id="brand" alt="brandlogo">
    </a>
    <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">

            <li class="nav-item active"><a class="nav-link lead text-light" href="index.php" tabindex="1">News</a></li>
            <li class="nav-item active"><a class="nav-link lead text-light" href="index.php?viewme=About" tabindex="2">About</a></li>
            <?php if (!empty($user->usertype)) {
                ?>
                <li class="nav-item active"><a class="nav-link lead text-light" href="shop.php" tabindex="3">Shop</a></li>
                <li class="d-md-none d-xs-block"><a href="shop.php?viewme=checkout" class="dropdown-toggle nav-link lead text-light" tabindex="4"><?php include('sites/shoppingcart/shoppingcartnavbarsymbol.php'); ?></a></li><!-- creates 2 navbar shopping icons, displays 1 of them depending on width of screen, mobil instant directs to checkout, desktop shows cart -->
                <li class="d-none d-md-block"><?php include('sites/shoppingcart/shoppingcartmobilvsdesktop.php'); ?></li> <!-- creates 2 navbar shopping icons, displays 1 of them depending on width of screen, mobil instant directs to checkout, desktop shows cart -->
                <?php
                }
                if (empty($user)) {
                    ?>
                <li class="nav-item active"><a class="nav-link lead text-light" href="login.php" tabindex="5">Login</a></li>
                <?php
            }
            
           
            if (!empty($user)) {
                ?>
                <li class="dropdown">
                    <a href="/" class="nav-link lead dropdown-toggle text-light" id="adminmenu" data-toggle="dropdown"
                       aria-expanded="false" tabindex="5">
                        <?php echo $user->firstname . $user->lastname; ?> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="adminmenu">
                        <!-- position-absolute entfernt -->
                        <?php if ($user->usertype == "admin") { ?>
                            <a class="dropdown-item" href="news_admin.php" tabindex="6"><i class="fas fa-newspaper" ></i> News
                                Verwaltung</a>
                        <?php } ?>
                        <a class="dropdown-item" href="index.php?logout=true" tabindex="7"><i class="fas fa-sign-out-alt"></i>
                            Abmelden</a>
                    </div>

                </li>
            <?php } ?> <!--shows name of logged in user -->


        </ul>
    </div>
</nav>
<?php $_SESSION['keepopen'] = "false"; ?>  <!-- keepopen to show dropdown onklick reset  -->