<?php // counts items and either makes a direct link block or creates the dropdown shop.
    // in desktop show shopping cart if the amount of unique items is smaller or 3, for mobil go to navbar id="mobilshopsymbol"
?>

<ul id="navbarul1" class="d-none d-md-block">
                        <?php
                        if ($user->usertype == "user") {
                            if (!empty($_SESSION['cart'])) {
                                $checksum = 0;
                                foreach ($_SESSION['cart'] as $value) {
                                    $checksum++;
                                }
                                if ($checksum <= 3) { //cart limiter
                                    ?><li class="d-none d-md-block"><ul id="shoppingcart-ul"><?php include('sites/shop/shoppingcart.php');?></ul></li><?php
                                } else {
                                    ?>
                                    <li class="d-none d-md-block"><a href="shop.php?viewme=checkout" tabindex="4" class=" nav-link lead text-light"> <?php include('sites/shop/shoppingcartnavbarsymbol.php'); ?></a></li>
                                    <?php
                                }
                            }
                        } else {
                            include('sites/shop/adminshoppingcart.php');
                        }
                        ?>
                             
</ul>
