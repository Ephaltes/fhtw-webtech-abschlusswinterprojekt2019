<?php
// needed to use the edit buttons in the shoppingcart or checkout page
session_start();

if (!empty($_GET['item']) && !empty($_GET['site']) && !empty($_GET['action'])) {
    $redirect = $_GET['site'];
    $operation = $_GET['action'];


    if ($operation == "x") {
        unset($_SESSION['cart'][$_GET['item']]);
    }
    if ($operation == "u") { //u for increase by 1 see navbar cant send + with get
        $_SESSION['cart'][$_GET['item']]['quantity'] ++;
    }
    if ($operation == "d") { //d for decrease by 1 see navbar cant send - with get
        $_SESSION['cart'][$_GET['item']]['quantity'] --;
        if ($_SESSION['cart'][$_GET['item']]['quantity'] <= 0) {
            unset($_SESSION['cart'][$_GET['item']]);
        }
    }
    if (isset($_GET['dontkeepopen'])) { // used in cart to keepopen onklick of buttons and in checkout set to false
        $_SESSION['keepopen'] ="false";
    } else {
        $_SESSION['keepopen'] = "true";
    }
    header("location: $redirect");
} else {
    header('location: ../../index.php');
}
?>
