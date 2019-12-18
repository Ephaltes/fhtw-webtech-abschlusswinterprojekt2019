<?php
require_once("Entities/UserEntity.php");
?>
<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
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
        <img src="img/342_logo_big_FH_only.png" class="pl-5 img-fluid " style="height:50px;">
    </a>
    <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">

            <li class="nav-item active"><a class="nav-link lead text-light" href="index.php">News</a></li>
            <li class="nav-item active"><a class="nav-link lead text-light" href="index.php?viewme=About">About</a></li>
            <?php if (!empty($user->usertype)) {
                ?>
                <li class="nav-item active"><a class="nav-link lead text-light" href="shop.php">Shop</a></li>
                <?php
                if ($user->usertype == "user") {
                    if (!empty($_SESSION['cart'])) {
                        $checksum = 0;
                        foreach ($_SESSION['cart'] as $value) {
                            $checksum++;
                        }
                        if ($checksum <= 4) {
                            include('sites/shoppingcart/shoppingcart.php');
                        } else {
                            ?>
                            <li><a href="shop.php?viewme=checkout" class="dropdown-toggle nav-link lead text-light"> <?php include('sites/shoppingcart/shoppingcartnavbarsymbol.php'); ?></a></li>

                            <?php
                        }
                    }
                } else {
                    include('sites/shoppingcart/adminshoppingcart.php');
                }
            }

            /*   if (empty($user)) {
              ?>
              <li class="nav-item active"><span class="nav-link lead text-light">anonym</span></li>
              <?php
              } */

            if (empty($user)) {
                ?>
                <li class="nav-item active"><a class="nav-link lead text-light" href="login.php">Login</a></li>
                <?php
            }
            if (!empty($user)) {
                ?>
                <li class="dropdown">
                    <a href="/" class="nav-link lead dropdown-toggle text-light" id="adminmenu" data-toggle="dropdown"
                       aria-expanded="false">
                        <?php echo $user->firstname . $user->lastname; ?> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="adminmenu">
                        <!-- position-absolute entfernt -->
                        <?php if ($user->usertype == "admin") { ?>
                            <a class="dropdown-item" href="news_admin.php"><i class="fas fa-newspaper"></i> News
                                Verwaltung</a>
                        <?php } ?>
                        <a class="dropdown-item" href="index.php?logout=true"><i class="fas fa-sign-out-alt"></i>
                            Abmelden</a>
                    </div>

                </li>
            <?php } ?> <!--shows name of logged in user -->


        </ul>
    </div>
</nav>
<?php $_SESSION['keepopen'] = "false"; ?>  <!-- keepopen to show dropdown onklick reset  -->