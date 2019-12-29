<!--creates the navbar symbol-->
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