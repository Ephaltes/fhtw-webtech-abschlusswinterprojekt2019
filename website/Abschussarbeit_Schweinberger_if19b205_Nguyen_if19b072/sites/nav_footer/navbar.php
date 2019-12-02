<?php

require_once ("Entities/UserEntity.php");

?>

<nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
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
           <?php
                    if (empty($user) ) { ?>
                        <li class="nav-item active"><span class="nav-link text-success">anonym</span></li>
                 <?php   } else if($user->usertype=="user") { ?>
                        <li class="nav-item active"><span class="nav-link text-success"><?php echo $user->firstname . $user->lastname; ?> </span></li>
               <?php     }else
                    { ?>
                        <li class="dropdown">
                            <a href="/" class="nav-link dropdown-toggle text-success" id="adminmenu" data-toggle="dropdown" aria-expanded="false">
                                <?php echo $user->firstname . $user->lastname; ?> <b class="caret"></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="adminmenu">
                                <a class="dropdown-item" href="news_admin.php"><i class="fas fa-newspaper"></i>   News Verwaltung</a>
                            </div>
                        </li>
                <?php    }
                    ?> <!--shows name of logged in user -->
                <li class="nav-item active"><a class="nav-link text-success" href="index.php">News</a></li>        
                <li class="nav-item active"><a class="nav-link text-success" href="index.php?viewme=About">About</a></li>    
          <?php  if (!empty($user->usertype)) {
                ?>
                <li class="nav-item active"><a class="nav-link text-success" href="shop.php">Shop</a></li>
                <?php
                if ($user->usertype == "user") {
                    include('sites/shoppingcart/shoppingcart.php');
                } else {
                    include('sites/shoppingcart/adminshoppingcart.php');
                }
            }

            if (empty($user)) {
                ?>
                <li class="nav-item active"><a class="nav-link text-success" href="login.html">Login</a></li>
            <?php }
            if (!empty($user)) {
                ?>
                <li class="nav-item active"><a class="nav-link text-success" href="index.php?logout=true">Abmelden</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<?php unset($_SESSION['keepopen']); ?>  <!-- keepopen to show dropdown onklick reset  -->