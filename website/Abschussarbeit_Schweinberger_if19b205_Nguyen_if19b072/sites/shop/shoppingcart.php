<li class="nav-item active">
    <div id="shoppingcart" class="nav-collapse cart-collapse">
        <ul class="nav">
            <li class="dropdown open <?php
            if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {// php needed to keep dropdown open onklick/remove/add
                echo "show";
            }
            ?>">
                <a href="#" data-toggle="dropdown" tabindex="4"
                   class="dropdown-toggle nav-link lead text-light"
                   aria-expanded="<?php
                   if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {
                       echo "true";
                   } else {
                       echo "false";
                   }
                   ?>"> <!-- php needed to keep dropdown open onklick/remove/add-->

                    <?php include('sites/shop/shoppingcartnavbarsymbol.php'); ?>


                </a>
                <form><!-- form need to keep open onklick, otherwise javascript needed -->
                    <ul id="navbardropdown" class="dropdown-menu position-absolute p_basket border-dark p-3 <?php
                    if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {
                        echo "show";
                    }
                    ?>">
                        <!-- php needed to keep dropdown open onklick/remove/add-->

                        <li class="nav-header"><h5 class="text-center"><i class="fas fa-shopping-cart"></i> Warenkorb
                            </h5></li>
                        <li>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Bild</th>
                                        <th scope="col">Anzahl</th>
                                        <th scope="col">Titel</th>
                                        <th scope="col">Preis</th>
                                        <th scope="col">Aktion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php {
                                        // show what items in cart
                                        $gesamtpreis = 0;
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $key) {
                                                $anzahl = $key['quantity'];
                                                $item = $key['item'];


                                                //json read needed here no clue why ????? will say not a object if somewhere else
                                                $read = file_get_contents("data/shop/json_datein/produkte.json"); //gets a string
                                                if ($read === false) {
                                                    // deal with error...
                                                } else {
                                                    // var_dump($read);
                                                    $data = json_decode($read, false, 512, JSON_UNESCAPED_UNICODE); //decodes string to array
                                                }
                                                foreach ($data as $data) {
                                                    if ($data->id == $item) {
                                                        $gesamtpreis += ($data->preis) * $anzahl;
                                                        $item = $data->id;
                                                        ?>
                                                        <tr class="border">
                                                            <td  class="ml-2"><img
                                                                    src="data/shop/bilder/<?php echo $data->bild; ?>"
                                                                    class="img-fluid shoppingcartimg" alt="<?php echo $data->titel; ?>">
                                                            <td  class="ml-2"><?php echo $anzahl; ?></td>
                                                            <td  class="ml--2"><?php echo $data->titel; ?></td>
                                                            <td  class="ml--2"><?php echo $data->preis; ?>&#x20AC;</td>


                                                            <td><span class="ml-2"><a tabindex="4" class="removefromcart"
                                                                                      href="sites/shop/editcart.php?item=<?php echo $item; ?>&site=<?php echo $link; ?>&action=x"><small><i
                                                                                title="Aus dem Warenkorb l??schen"
                                                                                class=" text-danger fas fa-trash-alt"></i></small><span
                                                                            class="d-none">Aus dem Warenkorb l??schen</span></a></span>
                                                                <span class="ml-2"><a tabindex="4" class="removefromcart"
                                                                                      href="sites/shop/editcart.php?item=<?php echo $item; ?>&site=<?php echo $link; ?>&action=u"><small><i
                                                                                title="Ware um 1 erh??hen"
                                                                                class=" text-dark fas fa-plus"></i></small><span
                                                                            class="d-none">Ware um 1 erh??hren</span></a></span> <?php //u = up increase + cant be trasnfered with get         ?>
                                                                <span class="ml-2"><a tabindex="4" class="removefromcart"
                                                                                      href="sites/shop/editcart.php?item=<?php echo $item; ?>&site=<?php echo $link; ?>&action=d"><small><i
                                                                                title="Ware um 1 verringern"
                                                                                class=" text-dark fas fa-minus"></i></small><span
                                                                            class="d-none">Ware um 1 verringern</span></a></span>

                                                            </td> <?php //d = down decrease by 1 cant be transfered with get         ?>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        } else {
                                            ?>
                                        <h3>sadly your basket is empty</h3>
                                    <?php } ?></tbody>
                                </table>
                            </li>
                            <li><p>Total: <?php echo $gesamtpreis; ?> ???</p></li>

                            <?php if ($gesamtpreis != 0) { ?>
                                <li><a href="shop.php?viewme=checkout" tabindex="4" class="btn-primary btn-lg">Kaufen</a></li>
                                <?php } else { ?>
                                <li><a href="shop.php" tabindex="4">Lets go shopping <3 </a></li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </form>            
            </li>
        </ul>
    </div>
</li>