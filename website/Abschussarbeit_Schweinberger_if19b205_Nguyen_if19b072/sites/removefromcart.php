<?php
session_start();

if (!empty($_GET['itemtoremove'])&&!empty($_GET['site'])) {
    $_SESSION['cart'][$_GET['itemtoremove']]['quantity']--;
    $redirect= $_GET['site'];
    $redirect.=".php";
    var_dump($redirect);
    
    if($_SESSION['cart'][$_GET['itemtoremove']]['quantity']<=0){
        unset($_SESSION['cart'][$_GET['itemtoremove']]);
    }
    
    header("location: ../$redirect");
} else {
    header('location: ../index.php');
}