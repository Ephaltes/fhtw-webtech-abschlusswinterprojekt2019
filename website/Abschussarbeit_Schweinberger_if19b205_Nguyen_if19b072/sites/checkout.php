<?php unset($_SESSION['TOTALPREIS']); // needed later on or on refresh wont show new price   ?>
<div class="px-4 pt-2 px-lg-0 bg-white">
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
                                            <tr scope="row rounded-pill" class="border">
                                                <td scope="row" class="ml-2">
                                                    <div class="d-flex flex-wrap flex-column">
                                                        <img src="data/shop/bilder/<?php echo $data->bild ?>"
                                                             class="mr-2 float-left img-fluid checkoutimg">
                                                        <div class="flex-md-column flex-xs-row"><h4
                                                                    class=""><?php echo $data->titel ?>
                                                            </h4>
                                                            <small>
                                                                <i><?php echo $data->beschreibung ?></i>
                                                            </small>
                                                        </div>
                                                </td>
                                                <td scope="row" class="ml-2"><?php echo $anzahl ?></td>
                                                <td scope="row" class="ml-2"><?php echo $data->preis ?>&#x20AC</td>


                                                <td>
                                                <span class="ml-2"><a class="removefromcart"
                                                                      href="sites/shoppingcartedit/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=x&dontkeepopen=true">
                                                <small>
                                                <button class="btn p-0 btn text-danger">
                                                    <i class="fas fa-trash-alt">
                                                </i>
                                                </button>
                                                </small>
                                                </a>
                                                </span>
                                                    <span class="ml-2"><a class="removefromcart"
                                                                          href="sites/shoppingcartedit/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=u&dontkeepopen=true">
                                                <small>
                                                <button class="btn ml-2 p-0 btn"><i
                                                            class="fas fa-plus"></i></button></small></a></span>
                                                    <span class="ml-2"><a class="removefromcart"
                                                                          href="sites/shoppingcartedit/editcart.php?item=<?php echo $item ?>&site=<?php echo $link ?>&action=d&dontkeepopen=true">
                                                <small>
                                                <button class="btn ml-md-2 p-0 btn"><i class="fas fa-minus">
                                                </i>
                                                </button>
                                                </small>
                                                </a>
                                                </span>
                                                </td>
                                            </tr>
                                        <?php }
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
                                    <a class="btn-primary btn-lg" href="shop.php">Shop</a>
                            </div>
                        <?php }
                        if (empty($_SESSION['cart']) && $user->usertype == 'admin') { ?>
                            <div class="pt-3 text-center ">
                                <p class="lead">Der Einkauf ist auf Admin-Accounts nicht unterstützt!
                                <p>
                                    <a class="btn-primary btn-lg" href="shop.php">Zurück zum Shop</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <form action="data/shop/buy_requests/checkout_bought_writeinfile.php" role="form" class="form"
                      method="POST"
                      id="checkoutform">
                    <div class="row py-5 p-4 bg-white rounded ">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions
                                for
                                seller
                            </div>
                            <div class="p-4">
                                <small class="font-italic mb-4">If you have some information for the seller you can
                                    leave
                                    them in the box below</small>
                                <textarea name="feedback" cols="30" rows="2" class="form-control" <?php
                                if ((!empty($user) && $user->usertype == 'admin') || empty($_SESSION['TOTALPREIS'])) {
                                    echo "disabled";
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
                                                echo "$_SESSION[TOTALPREIS]&#8364";
                                            }
                                            ?>
                                        </strong></li>
                                </ul>
                                <button type="submit" class="btn btn-primary rounded-pill py-2 btn-block"<?php
                                if ((!empty($user) && $user->usertype == 'admin') || empty($_SESSION['TOTALPREIS'])) {
                                    echo "disabled";
                                }
                                ?>>
                                    Procceed to checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

