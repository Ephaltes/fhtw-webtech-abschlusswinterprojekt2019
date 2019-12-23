<ul id="navbarul1" class="d-none d-md-block"><!-- in desktop show shopping cart if the amount of unique items is smaller or 3-->
                        <?php
                        if ($user->usertype == "user") {
                            if (!empty($_SESSION['cart'])) {
                                $checksum = 0;
                                foreach ($_SESSION['cart'] as $value) {
                                    $checksum++;
                                }
                                if ($checksum <= 3) { //cart limiter
                                    ?><li class="d-none d-md-block"><a href="shop.php?viewme=checkout" class="" tabindex="4"></a><?php include('sites/shoppingcart/shoppingcart.php');?></li><?php
                                } else {
                                    ?>
                                    <li class="d-none d-md-block"><a href="shop.php?viewme=checkout" tabindex="4" class="dropdown-toggle nav-link lead text-light"> <?php include('sites/shoppingcart/shoppingcartnavbarsymbol.php'); ?></a></li>
                                    <?php
                                }
                            }
                        } else {
                            include('sites/shoppingcart/adminshoppingcart.php');
                        }
                        ?>
</ul>
