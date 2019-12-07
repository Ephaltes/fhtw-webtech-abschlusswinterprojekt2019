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
                    <i class="fas fa-shopping-basket">
                        <!-- see https://fontawesome.com/icons?d=gallery&q=shopping -->
                        <span class="badge badge-light text-dark"> 
                            <?php
                            $all = 0; //show quanity in navbar
                            $gesamtpreis = 0;
                            if (!empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key) {
                                    $anzahl = $key['quantity'];
                                    $all = $all + $anzahl;
                                    $item = $key['item'];

                                    //json read needed here no clue why ????? will say not a object if somewhere else
                                    $shop = file_get_contents("data/shop/json_datein/produkte.json"); //gets a string
                                    if ($shop === false) {
                                        // deal with error...
                                    } else {
                                        // var_dump($read);
                                        $shop = json_decode($shop); //decodes string to array
                                    }
                                    foreach ($shop as $data) {
                                        if ($data->id == $item) {
                                            $gesamtpreis += ($data->preis) * $anzahl;
                                        }
                                    }
                                }
                            }
                            echo "<span class=\"border-right border-dark\">$all </span>";
                            echo "<span class=\"ml-1\">$gesamtpreis €</span>";
                            ?>
                        </span>
                    </i>
                </a>

                <ul class="dropdown-menu position-absolute p_basket border-dark p-2 <?php
                if (!empty($_SESSION['keepopen']) && $_SESSION['keepopen'] == "true") {
                    echo "show";
                }
                ?>" style="right: 0; left: auto;">
                    <!-- php needed to keep dropdown open onklick/remove/add-->
                    <form class=""> <!-- form need to keep open onklick, otherwise javascript needed -->
                        <li class="nav-header">Your Shoppingcart</li>
                        <table class="table">
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
                                            $data = json_decode($read); //decodes string to array
                                        }
                                        foreach ($data as $data) {
                                            if ($data->id == $item) {
                                                echo "<tr scope=\"row\" class=\"border\">";
                                                echo "<td scope=\"row\" class=\"ml-2\"><img src=\"data/shop/bilder/$data->bild\" class=\"img-fluid\" style=\"width:25px;\">";
                                                echo "<td scope=\"row\" class = \"ml-2\">$anzahl</td>";
                                                echo "<td scope=\"row\" class=\"ml--2\">$data->titel</td>";
                                                echo "<td scope=\"row`\" class=\"ml--2\">$data->preis&#x20AC</td>";
                                                $gesamtpreis += ($data->preis) * $anzahl;
                                                $item = $data->id;


                                                echo "<td><span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=x\"><small><i class=\"fas fa-trash-alt\"></i></small></a></span>";
                                                echo "<span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=u\"><small><i class=\"fas fa-plus\"></i></small></a></span>"; //u = up increase + cant be trasnfered with get
                                                echo "<span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=d\"><small><i class=\"fas fa-minus\"></i></small></a></span></td>"; //d = down decrease by 1 cant be transfered with get
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
                                    echo "<li><a href=\"shop.php?viewme=checkout\">I wanna buy it daddy</a></li>";
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