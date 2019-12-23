
<li class="nav-item active">
    <div id="shoppingcart" class="nav-collapse cart-collapse">
        <ul class="nav">
            <li class="dropdown open <?php
            if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {// php needed to keep dropdown open onklick/remove/add
                echo "show";
            }
            ?>"> 
                <a href="#" data-toggle="dropdown"
                   class="dropdown-toggle nav-link lead text-light"
                   aria-expanded="<?php
                   if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {
                       echo "true";
                   } else {
                       echo "false";
                   }
                   ?>"> <!-- php needed to keep dropdown open onklick/remove/add-->

                    <?php include('sites/shoppingcart/shoppingcartnavbarsymbol.php'); ?>


                </a>

                <ul id="navbardropdown" class="dropdown-menu position-absolute p_basket border-dark p-3 <?php
                if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {
                    echo "show";
                }
                ?>">
                    <!-- php needed to keep dropdown open onklick/remove/add-->
                    <form class=""> <!-- form need to keep open onklick, otherwise javascript needed -->
                        <li class="nav-header"><h5 class="text-center"><i class="fas fa-shopping-cart"></i>Warenkorb</h5></li>

                        <table class="table table-sm">
                            <thead>
                            <th class="col-scope">Bild</th>
                            <th class="col-scope">Anzahl</th>
                            <th class="col-scope">Titel</th>
                            <th class="col-scope">Preis</th>
                            <th class="col-scope">Action</th>
                            </thead>
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
                                                echo "<tr scope=\"row\" class=\"border\">";
                                                echo "<td scope=\"row\" class=\"ml-2\"><img src=\"data/shop/bilder/$data->bild\" class=\"img-fluid shoppingcartimg\" >";
                                                echo "<td scope=\"row\" class = \"ml-2\">$anzahl</td>";
                                                echo "<td scope=\"row\" class=\"ml--2\">$data->titel</td>";
                                                echo "<td scope=\"row`\" class=\"ml--2\">$data->preis&#x20AC</td>";
                                                $gesamtpreis += ($data->preis) * $anzahl;
                                                $item = $data->id;


                                                echo "<td><span class = \"ml-2\"><a tabindex=\"\" class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=x\"><small><i aria-hidden=\"true\" title=\"Aus dem Warenkorb löschen\" class=\" text-danger fas fa-trash-alt\"></i></small><span class=\"d-none\">Aus dem Warenkorb löschen</span></a></span>";
                                                echo "<span class = \"ml-2\"><a tabindex=\"4\" class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=u\"><small><i aria-hidden=\"true\" title=\"Ware um 1 erhöhen\" class=\" text-dark fas fa-plus\"></i></small><span class=\"d-none\">Ware um 1 erhöhren</span></a></span>"; //u = up increase + cant be trasnfered with get
                                                echo "<span class = \"ml-2\"><a tabindex=\"4\" class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=d\"><small><i aria-hidden=\"true\" title=\"Ware um 1 verringern\" class=\" text-dark fas fa-minus\"></i></small><span class=\"d-none\">Ware um 1 verringern</span></a></span></td>"; //d = down decrease by 1 cant be transfered with get
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                } else {
                                    echo "<h3>sadly your basket is empty :(</h3>";
                                }
                                echo"</table>";

                                echo "<li><p>Total: $gesamtpreis €</p></li>";

                                if ($gesamtpreis != 0) {
                                    echo "<li><a href=\"shop.php?viewme=checkout\" class=\"btn-primary btn-lg\">Kaufen</a></li>";
                                } else {
                                    echo "<li><a href=\"shop.php\">Lets go shopping <3 </a></li>";
                                }
                            }
                            ?>

                    </form>
                </ul>
            </li>
        </ul>
    </div>
</li>