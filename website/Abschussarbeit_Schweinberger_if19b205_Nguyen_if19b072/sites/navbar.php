<nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
    <img src="img/342_logo_big_FH_only.png" class="pl-5 img-fluid " style="height:50px;">

    <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav d-flex flex-wrap align-content-end ml-auto">
            <li class="nav-item active"><span class="nav-link text-success"><?php
                    if (empty($user)) {
                        echo "anonym";
                    } else {
                        echo $user->firstname . $user->lastname;
                    }
                    ?></span></li> <!--shows name of logged in user -->
            <?php if (!empty($user)) { ?>
                <li class="nav-item active"><a class="nav-link text-success" href="index.php?view=About">About</a></li>
                <li class="nav-item active"><a class="nav-link text-success" href="shop.php">Shop</a></li>
                <li class="nav-item active">
                    <div id="shoppingcart" class="nav-collapse cart-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown open">
                                <a href="#" data-toggle="dropdown"
                                   class="dropdown-toggle nav-link text-success">
                                    <i class="fas fa-shopping-basket"> <!-- see https://fontawesome.com/icons?d=gallery&q=shopping -->
                                        <span class="badge badge-success text-dark"> 
                                            <?php
                                            $all = 0;
                                            if (!empty($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart']as $key){                                                
                                                    $wert = $key['quantity'];
                                                    $all = $all + $wert;
                                                }
                                            }
                                            echo"$all";
                                            ?>
                                        </span>
                                    </i>
                                </a>

                                <ul class="dropdown-menu border-dark p-2" style="right: 0; left: auto;">
                                    <form class=""> <!-- form need to keep open onklick, otherwise javascript needed -->
                                        <li class = "nav-header">reeeeeeeee</li>
                                        <?php
                                        $gesamtpreis = 0;
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart']as $key) {
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
                                                        echo"<li>";
                                                        echo"<span class = \"pr-2\">$anzahl</span>";
                                                        echo"<span class = \"\">";
                                                        echo"$data->titel";
                                                        $gesamtpreis += ($data->preis) * $anzahl;

                                                        echo"</span>";
                                                        $objectremove = $data->id;
                                                        $linkme = $_SESSION['currentpage'];
                                                        echo"<span class = \"ml-2\"><a class = \"removefromcart\" href =\"sites/removefromcart.php?itemtoremove=$objectremove&site=$linkme\">x</a></span>";
                                                        echo"</li>";
                                                    }
                                                }
                                            }
                                        } else {
                                            echo"<h1>nothing found</h1>";
                                        }

                                        echo"<li><p>Total: $gesamtpreis €</p></li>";
                                        ?>
                                        <li><a href="">I wanna buy it daddy</a></li>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
            }
            if (!empty($_SESSION['userquack']))
                echo"hereka";

            if (empty($user)) {
                ?>
                <li class="nav-item active">
                    <div class="nav-item-dropdown dropdown">
                        <span data-toggle="dropdown" class="dropdown-toggle nav-link text-success">Anmelden</span>
                        <div class="dropdown-menu drop-menu-right border-dark" style="right: 0; left: auto;">
                            <form class="p-4" method="POST" action="sites/logincheck.php">
                                <div class="form-group">
                                    <label for="User">User</label>
                                    <input type="text" class="form-control" id="user" name="username"
                                           placeholder="admin">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dropdownCheck2"
                                           name="dontforgetme" value="plsdont">
                                    <label class="form-check-label" for="dropdownCheck2">
                                        Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>

                </li>
                <?php
            }
            if (!empty($user)) {
                ?>
                <li class="nav-item active"><a class="nav-link text-success" href="index.php?logout=true" ?>Abmelden</a></li>
                <?php } 
                        if (empty($user)) {
                            ?>
                          <!--  <li class="nav-item active">
                                <div class="nav-item-dropdown dropdown">
                                    <span data-toggle="dropdown" class="dropdown-toggle nav-link text-success">Anmelden</span>
                                    <div class="dropdown-menu drop-menu-right border-dark" style="right: 0; left: auto;">
                                        <form class="p-4" method="POST" action="sites/logincheck.php">
                                            <div class="form-group">
                                                <label for="User">User</label>
                                                <input type="text" class="form-control" id="user" name="username"
                                                       placeholder="admin">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                       placeholder="Password">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="dropdownCheck2"
                                                       name="dontforgetme" value="plsdont">
                                                <label class="form-check-label" for="dropdownCheck2">
                                                    Remember me
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                        </form>
                                    </div>
                                </div>
                            </li> -->
                            <li class="nav-item active"><a class="nav-link text-success" href="login.html" ?>Login</a></li>


                            <?php
                        }
                            if (!empty($user)) {
                            ?>
                            <li class="nav-item active"><a class="nav-link text-success" href="index.php?logout=true>Abmelden</a></li>
                        <?php } ?>

        </ul>
    </div>
</nav>