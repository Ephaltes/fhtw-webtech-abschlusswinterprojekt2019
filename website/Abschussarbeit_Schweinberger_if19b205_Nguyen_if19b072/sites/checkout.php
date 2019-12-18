
<div class="px-4 px-lg-0 bg-white">
    <div class="container text-dark py-5 text-center">
        <h1 class="display-4"><i class="fas fa-shopping-cart"></i>Warenkorb</h1>
    </div>
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-4 bg-white mb-2">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="border">
                                <tr>
                                    <th scope="col" class="border-0 ">
                                        <div class="p-2 px-3 ">PRODUKT</div>
                                    </th>
                                    <th scope="col" class="border-0 ">
                                        <div class="py-2 ">ANZAHL</div>
                                    </th>
                                    <th scope="col" class="border-0 ">
                                        <div class="py-2 ">ANZAHL</div>
                                    </th>
                                    <th scope="col" class="border-0 ">
                                        <div class="py-2 ">EDIT</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // show what items in cart
                                $gesamtpreis = 0;

                                foreach ($_SESSION['cart'] as $key) {
                                    $anzahl = $key['quantity'];
                                    $item = $key['item'];


                                    //json read needed here no clue why ????? will say not a object if somewhere else
                                    $read = file_get_contents("data/shop/json_datein/produkte.json"); //gets a string
                                    if ($read === false) {
                                        // deal with error...
                                    } else {
                                        // var_dump($read);
                                        $read = json_decode($read, false, 512, JSON_UNESCAPED_UNICODE);
                                    }
                                    foreach ($read as $data) {
                                        if ($data->id == $item) {
                                            echo "<tr scope=\"row rounded-pill\" class=\"border\">";
                                            echo "<td scope=\"row\" class=\"ml-2\"><div class=\"d-flex flex-wrap flex-column\"><img src=\"data/shop/bilder/$data->bild\" class=\"mr-2 float-left img-fluid\" style=\"width:75px;\"><div class=\"flex-column\"><h4 class=\"\">$data->titel</h4><small><i>$data->beschreibung</i></small></div></td>";
                                            echo "<td scope=\"row\" class = \"ml-2\">$anzahl</td>";
                                            echo "<td scope=\"row`\" class=\"ml--2\">$data->preis&#x20AC</td>";
                                            $gesamtpreis += ($data->preis) * $anzahl;
                                            $item = $data->id;

                                            echo "<td><span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=x&dontkeepopen=true\"><small><i class=\"fas fa-trash-alt\"></i></small></a></span>";
                                            echo "<span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=u&dontkeepopen=true\"><small><i class=\"fas fa-plus\"></i></small></a></span>";
                                            echo "<span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/shoppingcartedit/editcart.php?item=$item&site=$link&action=d&dontkeepopen=true\"><small><i class=\"fas fa-minus\"></i></small></a></span></td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                                $_SESSION['TOTALPREIS'] = $gesamtpreis;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form action="data/shop/buy_requests/checkout_bought_writeinfile.php" method="POST" onsubmit="return sure();">
                <div class="row py-5 p-4 bg-white rounded ">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                        <div class="p-4">
                            <small class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</small>
                            <textarea name="feedback" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Zusammenfassung </div>
                        <div class="p-4">
                            <small class="font-italic mb-4">Shiping und Steuer sind Variabel bezogen auf das Eingekaufte.</small>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Steuer</strong><strong>0.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping</strong><strong>0.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><strong> <?php echo"$_SESSION[TOTALPREIS]&#8364"; ?></strong></li>
                            </ul><button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

