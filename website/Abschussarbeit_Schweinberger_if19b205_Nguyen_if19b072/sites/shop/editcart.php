<?php

// needed to use the edit buttons in the shoppingcart or checkout page
//sent by shoppingcart or checkout

require_once("../../sites/dependency_include/include_user.php");

use Model\UserModel;

session_start();

if (!empty($_SESSION["user"])) {
    if (UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
} else {
    header('location: ../../index.php');
}

if (!empty($_GET['item']) && !empty($_GET['site']) && !empty($_GET['action']) && $user->usertype == "user") {
    $redirect = $_GET['site'];
    $operation = $_GET['action'];
    
    if ($operation == "x") { // x means delete item
        unset($_SESSION['cart'][$_GET['item']]);
    }
    if ($operation == "u") { //u for increase by 1 see navbar cant send + with get
        $_SESSION['cart'][$_GET['item']]['quantity']++;
    }
    if ($operation == "d") { //d for decrease by 1 see navbar cant send - with get
        $_SESSION['cart'][$_GET['item']]['quantity']--;
        if ($_SESSION['cart'][$_GET['item']]['quantity'] <= 0) {
            unset($_SESSION['cart'][$_GET['item']]);
        }
    }
    if (isset($_GET['dontkeepopen'])) { // used in cart to keepopen onklick of buttons and in checkout set to false
        $_SESSION['keepopen'] = "false";
    } else {
        $_SESSION['keepopen'] = "true";
    }
    header("location: $redirect");
} else {
    header('location: ../../index.php');
}
?>
