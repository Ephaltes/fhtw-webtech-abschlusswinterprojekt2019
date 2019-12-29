<!--<li class="nav-item active">
    <div id="shoppingcart" class="nav-collapse cart-collapse">
        <ul class="nav pull-right">
            <li class="dropdown open ">
                <a href="#" data-toggle="dropdown"
                   class="dropdown-toggle nav-link text-success"
                   aria-expanded="false">
                    <i class="fas fa-shopping-basket">
                        <span class="badge badge-success text-dark">0
                        </span>
                    </i>
                </a>

                <ul class="dropdown-menu  position-absolute border-dark p-2" style="right: 0; left: auto;">
                    <form class="">
                        <li class="nav-header"><strong>Your Shoppingcart</strong></li>
                        <p> Admin accounts dont support the shoppingcart feature, sorry for the inconveiniance<P>
                        <li><a href="shop.php">Visit the shop anyways</a></li>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</li>
-->

<li class="dropdown ">
    <a href="#" class="nav-link dropdown-toggle text-light lead" id="adminbasket" data-toggle="dropdown"
       aria-expanded="false" tabindex="4">
        <i class="fas fa-shopping-basket">
            <span class="badge badge-light text-dark">0</span>
        </i>
    </a>
    <div class="dropdown-menu p_basket dropdown-menu-right position-absolute" aria-labelledby="adminbasket">
     <div class="dropdown-item-text">
         <b>Your Shoppingcart</b>
     </div>
        <div class="dropdown-item-text">
            Shoppingcart feature is not supported on admin accounts!
        </div>
        <div class="dropdown-item">
            <a href="shop.php" class="btn btn-primary" tabindex="4">
                Visit the shop anyways!
            </a>
        </div>
    </div>
</li>