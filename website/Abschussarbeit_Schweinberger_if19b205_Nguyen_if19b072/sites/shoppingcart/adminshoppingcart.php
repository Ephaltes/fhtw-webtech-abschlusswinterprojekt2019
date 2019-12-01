<li class="nav-item active">
    <div id="shoppingcart" class="nav-collapse cart-collapse">
        <ul class="nav pull-right">
            <li class="dropdown open ">
                <a href="#" data-toggle="dropdown"
                   class="dropdown-toggle nav-link text-success"
                   aria-expanded="false"> <!-- php needed to keep dropdown open onklick/remove/add-->
                    <i class="fas fa-shopping-basket">
                        <!-- see https://fontawesome.com/icons?d=gallery&q=shopping -->
                        <span class="badge badge-success text-dark">0 
                        </span>
                    </i>
                </a>

                <ul class="dropdown-menu border-dark p-2" style="right: 0; left: auto;">
                    <!-- php needed to keep dropdown open onklick/remove/add-->
                    <form class=""> <!-- form need to keep open onklick, otherwise javascript needed -->
                        <li class="nav-header"><strong>Your Shoppingcart</strong></li>
                        <p> Admin accounts dont support the shoppingcart feature, sorry for the inconveiniance<P>
                        <li><a href=\"shop.php\">Visit the shop anyways</a></li>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</li>
