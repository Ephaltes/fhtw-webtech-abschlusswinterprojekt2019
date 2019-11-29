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
                             <li class="nav-item active"><a class="nav-link text-success" href="sites/about.php">About</a></li>
                            <li class="nav-item active"><a class="nav-link text-success" href="sites/shop.php">Shop</a></li>
                            <li class="nav-item active">
                                <div id="shoppingcart" class="nav-collapse cart-collapse">
                                    <ul class="nav pull-right">
                                        <li class="dropdown open">
                                            <a href="#" data-toggle="dropdown"
                                               class="dropdown-toggle nav-link text-success">
                                                <i class="fas fa-shopping-basket"> <!-- see https://fontawesome.com/icons?d=gallery&q=shopping -->
                                                    <span class="badge badge-success text-dark">11</span>
                                                </i></a>

                                            <ul class="dropdown-menu border-dark p-2" style="right: 0; left: auto;">
                                                <form class=""> <!-- form need to keep open onklick, otherwise javascript needed -->
                                                    <li class="nav-header">reeeeeeeee</li>
                                                    <li>
                                                        <span class="">1x</span>
                                                        <span class="">Test Product </span>
                                                        <span class=""><a class="removefromcart" href="#">x</a></span>
                                                    </li>
                                                    <li><p>Total:</p></li>
                                                    <li><a href="">I wanna buy it daddy</a></li>
                                                </form>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php
                        }
                        if(!empty($_SESSION['userquack']))
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
                        <?php } ?>

                    </ul>
                </div>
            </nav>