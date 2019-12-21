
<form action="shop.php" method="POST">
    <div class="container-fluid pt-3 mb-5 mt-2">
        <h1 class="">FH-Technikum Merch-Shop &lt;3</h1>
        <div class="card-columns">

            <?php
            $shop = file_get_contents("data/shop/json_datein/produkte.json"); //gets a string
            if ($shop === false) {
                // deal with error...
            } else {
                // var_dump($read);
                $shop = json_decode($shop, false, 512, JSON_UNESCAPED_UNICODE); //decodes string to array
                //echo " <br>";
                //echo "<br>";
                //var_dump($data);
                foreach ($shop as $data) { ?>
                    <div class = "card col-xs-4 mb-2 mt-2" style = "">
                   <div class="">
                    <img class = "card-img-top m-2 d-block mx-auto img-fluid shopimg" src = "data/shop/bilder/<?php echo $data->bild; ?>" alt="<?php echo $data->bild; ?>">
                   <div class = "card-body">
                    <h5 class = "card-title"><?php echo  $data->titel;?></h5>
                    <p class = "card-text"><?php echo $data->beschreibung ;?></p>
                    <p>Price: <em><?php echo $data->preis; ?> €</em></p>
                 <?php   if ($user->usertype == "user") { ?>
                        <button type="submit" name="id" value="<?php echo $data->id; ?>" class="btn btn-primary">add to cart</button>
                 <?php    }
                    if ($user->usertype == "admin"){ ?>
                        <button type="submit" name="id" value="" class="btn btn-primary" disabled>Admin-accounts cant buy</button>
                 <?php   } ?>
                   </div>
                    </div>
                   </div>
                <?php }
            }
            ?>
        </div>
    </div>
</form>