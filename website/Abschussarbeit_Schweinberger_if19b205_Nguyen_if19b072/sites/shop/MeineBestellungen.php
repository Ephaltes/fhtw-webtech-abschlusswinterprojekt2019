
<section id="MeineBestellung" class=" px-5 container-fluid">
    <h1 class="text-center pt-3 mb-5 mt-2">Meine Bestellungen</h1>  
    <?php

    use Model\UserModel;

if (!(UserModel::hasaescrypt())) {
        ?>
        <div class="text-center p-5 border">
            <h2 class="mb-3">Interner Fehler: Verschlüsselung nicht Installiert, bitte Kontaktieren Sie den Support</h2>
            <a class="btn-primary btn" href="index.php?viewme=Kontakt" tabindex="25">Kontakt</a>
        </div>
        <?php
    } else {
        $path = "data/shop/buy_requests";
        $userid = trim("$user->username");
        $file = glob($path . '/' . $userid . '*', GLOB_BRACE);
        if (!empty($file)) {

            echo"<div class=\"card-columns\">";
            foreach ($file as $link) {
                $data = file_get_contents($link); //gets a string
                if ($data === false) {
                    // deal with error...
                } else {
                    // var_dump($read);
                    $key = $user->username;
                    $key .= 'FHTWWIEN';
                    $data = openssl_decrypt($data, "AES-128-CTR", $key, 0, '1234567891011121'); // comment this if u want unencrypted form of bestellungen siehe readme in checkout_bought
                    $data = json_decode($data, false, 512, JSON_UNESCAPED_UNICODE);
                }
                $bestellungsid = basename($link, ".json");
                $timeutc = preg_replace('/\D/', '', $bestellungsid);
                $dateInLocal = date("Y-m-d H:i:s", $timeutc);
                ?>
                    <div class="card p-0 ">
                        <div class="card-header bg-primary text-center"><h2>BestellungsID</h2><br><h3><?php echo $bestellungsid; ?></h3></div>
                        <div class="card-body">
                            <p>Aufgegeben am <?php echo $dateInLocal; ?>
                                <?php
                                foreach ($data as $onlyone) {
                                    if (!(array_key_exists('feedback', $onlyone))) {
                                        echo"<p><strong class=\"card-text\">$onlyone->titel</strong></p>";
                                        echo"<ul>";
                                        echo"<li><span class=\"card-text\">Preis: $onlyone->Price&#x20AC;</span></li>";
                                        echo"<li><span class=\"card-text\">Anzahl: $onlyone->Anzahl</span></li> ";
                                        echo " </ul>";
                                    } else {
                                        if (!empty($onlyone->feedback)) {
                                            echo"<p class=\"card-text\">Nachricht an uns war:<br> $onlyone->feedback</p>";
                                        } else {
                                            echo"<p class=\"card-text\">Nachricht an den Besteller wurde Leer gelassen.</p>";
                                        }
                                        $gesamtpreis = round($onlyone->Gesamtpreis, 2);
                                        echo"<p class=\"card-text\">Gesamtpreis der Bestellung: <strong> $gesamtpreis&#x20AC;</strong></p>";
                                        echo"<p> Bei Problemen, Kontaktieren Sie uns gerne und Erwähen Sie bitte die BestellungsID!</p>";
                                        ?><a class="btn-primary btn" href="index.php?viewme=Kontakt" tabindex="25">Kontakt</a><?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                <?php
            }
            echo"</div>";
        } else {
            ?>
            <div class="text-center p-5 border">
                <?php if ($user->usertype == "admin") { ?>
                    <h2 class="mb-3">Admins können keine Bestellungen machen!</h2>
                <?php } else {
                    ?>
                    <h2 class="mb-3">Sie haben noch keine Bestellung bei uns!</h2>
                <?php } ?>
                <a class="btn-primary btn" tabindex="25" href="shop.php">Zurück zum Shop</a>
            </div>
            <?php
        }
    }
    ?>
</section>

