<?php

//needs to be infront of navbar otherwise refresh wont work
//add item and counter up
if (!empty($_POST['id'])) {
    if (!key_exists($_POST['id'], $_SESSION['cart'])) {
        $_SESSION['cart'][$_POST['id']] = array("item" => $_POST['id'], "quantity" => 1);
    } else {
        $_SESSION['cart'][$_POST['id']]['quantity'] ++;
    }
}
?>