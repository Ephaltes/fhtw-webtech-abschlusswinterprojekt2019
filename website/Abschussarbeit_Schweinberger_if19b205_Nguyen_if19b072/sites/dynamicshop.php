
<form action="shop.php" method="POST">
    <div class="container pt-3 mb-5" style="min-height: 500px;">
        <h1 class="">FH-Technikum Merch-Shop <3</h1>
        <div class="card-columns">

            <?php
            $read = file_get_contents("data/shop/json_datein/produkte.json"); //gets a string
            if ($read === false) {
                // deal with error...
            } else {
                // var_dump($read);
                $data = json_decode($read); //decodes string to array
                //echo " <br>";
                //echo "<br>";
                //var_dump($data);
                foreach ($data as $data) {
                    echo "<div class = \"card col-xs-4 mb-2 mt-2\" style = \"\">\n";
                    echo "     <div class=\"\">";
                    echo "        <img class = \"card-img-top p-1 d-block mx-auto img-fluid\" src = \"data/shop/bilder/$data->bild\" style=\"width:75%;\"alt = \"Card image cap\">\n";
                    echo "        <div class = \"card-body\">\n";
                    echo "          <h5 class = \"card-title\">$data->titel</h5>\n";
                    echo "          <p class = \"card-text\">$data->beschreibung</p>\n";
                    echo "          <p>Price: <em>$data->preis €</em></p>\n";
                    if ($user->usertype == "user") {
                        echo "          <button type=\"submit\" name=\"id\" value=\"$data->id\"class=\"btn btn-primary\">add to cart</button>\n";
                    }
                    if ($user->usertype == "admin"){
                        echo "          <button type=\"submit\" name=\"id\" value=\" \"class=\"btn btn-primary\" disabled>Admins cant add</button>\n";
                    }
                    echo "        </div>\n";
                    echo "      </div>";
                    echo "</div>";
                }
            }
            var_dump($_SESSION['cart']);
            ?>


        </div>
    </div>
</form>