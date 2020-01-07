<?php unset($_SESSION['TOTALPREIS']); // needed later on or on refresh wont show new price      ?>
<section class="px-4 pt-2 px-lg-0 bg-white">
    <div class="container text-dark py-5 text-center">
        <h1 class="display-4"><i class="fas fa-shopping-cart"></i>Warenkorb</h1>
    </div>
    <div class="">
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
                                        <div class="py-2 ">PREIS</div>
                                    </th>
                                    <th scope="col" class="border-0 ">
                                        <div class="py-2 ">BEARBEITEN</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // show what items in cart
                                if (!empty($_SESSION['cart'])) {
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
                                                $gesamtpreis += ($data->preis) * $anzahl;
                                                $item = $data->id;
                                                ?>
                                                <tr class="border">
                                                    <td class="ml-2">
                                                        <div class="d-flex flex-wrap flex-column">
                                                            <img src="data/shop/bilder/<?php echo $data->bild; ?>"
                                                                 class="mr-2 float-left img-fluid checkoutimg" alt="Ware: <?php echo $data->titel;?>">
                                                            <div class="flex-md-column flex-xs-row"><h4
                                                                    class=""><?php echo $data->titel ?>
                                                                </h4>
                                                                <small>
                                                                    <i><?php echo $data->beschreibung ?></i>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="ml-2"><?php echo $anzahl ?></td>
                                                    <td class="ml-2"><?php echo $data->preis ?>&#x20AC;</td>


                                                    <td class="text-nowrap">
                                                        <span class="ml-2"><a tabindex="25" class="removefromcart p-1" href="sites/shop/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=x&dontkeepopen=true"><small><i  title="Aus dem Warenkorb löschen" class="fas fa-trash-alt text-danger"></i></small><span class="d-none">Aus dem Warenkorb löschen</span></a></span>
                                                        <span class="ml-2"><a tabindex="25" class="removefromcart text-dark  p-1" href="sites/shop/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=u&dontkeepopen=true"><small><i  title="Ware um 1 erhöhen" class="fas fa-plus"></i></small><span class="d-none">Ware um 1 erhöhren</span></a></span>
                                                        <span class="ml-2"><a tabindex="25" class="removefromcart text-dark  p-1" href="sites/shop/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=d&dontkeepopen=true"><small><i  title="Ware um 1 verringern" class="fas fa-minus"></i></small><span class="d-none">Ware um 1 verringern</span></a></span>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    $_SESSION['TOTALPREIS'] = $gesamtpreis;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if (empty($_SESSION['cart']) && $user->usertype == 'user') { ?>
                            <div class="pt-3 text-center ">
                                <p class="lead">Der Warenkorb ist Leer, besuch doch unseren Shop!
                                <p>
                                    <a class="btn-primary btn-lg" tabindex="26" href="shop.php">Shop</a>
                            </div>
                            <?php
                        }
                        if (empty($_SESSION['cart']) && $user->usertype == 'admin') {
                            ?>
                            <div class="pt-3 text-center ">
                                <p class="lead">Der Einkauf ist auf Admin-Accounts nicht unterstützt!
                                <p>
                                    <a class="btn-primary btn-lg" tabindex="26" href="shop.php">Zurück zum Shop</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <form action="data/shop/buy_requests/checkout_bought_writeinfile.php" role="form" class="form mx-auto"
                      method="POST"
                      id="checkoutform">
                    <div class="row py-5 p-4 bg-white rounded text-center">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">An den Webshopbetreiber
                            </div>
                            <div class="p-4">
                                <label for="checkouttextarea"><small class="font-italic mb-4">Wenn  Sie eine Nachricht mit ihrem Einkauf an den Verkäufer senden wollen, benutzen Sie bitte das Textfeld unterhalb. (1400 Zeichen)</small>
                                </label>
                                <textarea  maxlength="1400" name="feedback" cols="30"  id="checkouttextarea" rows="2" class="form-control" <?php
                                    if ((!empty($user) && $user->usertype == 'admin') || empty($_SESSION['TOTALPREIS'])) {
                                        echo " disabled tabindex=\"-1\"";
                                    } else {
                                        echo"tabindex=\"25\"";
                                    }
                                    ?>></textarea>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Zusammenfassung
                            </div>
                            <div class="p-4">
                                <small class="font-italic mb-4">Shiping und Steuer sind Variabel bezogen auf das
                                    Eingekaufte.</small>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Steuer</strong><strong>0.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Shipping</strong><strong>0.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Total</strong><strong>
                                                <?php
                                                if (!empty($_SESSION['TOTALPREIS'])) {
                                                    echo "$_SESSION[TOTALPREIS]&#8364;";
                                                }
                                                ?>
                                        </strong></li>
                                </ul>
                                <button aria-label="Kauf Kostenpflichtig abschließen" title="Kauf Kostenpflichtig abschließen" type="submit" class="btn btn-primary rounded-pill py-2 btn-block"<?php
                                               if ((!empty($user) && $user->usertype == 'admin') || empty($_SESSION['TOTALPREIS'])) {
                                                   echo " disabled tabindex=\"-1\"";
                                               } else {
                                                   echo" tabindex=\"27\"";
                                               }
                                               ?>>
                                        Bestellen           
                                    </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
