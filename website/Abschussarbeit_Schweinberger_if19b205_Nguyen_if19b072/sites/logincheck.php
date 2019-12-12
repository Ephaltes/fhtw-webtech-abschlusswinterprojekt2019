<?php

include_once ("../Model/UserModel.php");

use Model\UserModel;

$model = new UserModel();

session_start([
    'cookie_lifetime' => 86400, //1 Tag
]);
if (isset($_COOKIE['USERHASH'])) {
    if ($model->validcookie($_COOKIE['USERHASH'])) {
        $_SESSION["user"] = $model->GetUserObject();
        return header("Location: /index.php");
    }
    return header("Location: /index.php");
}
if (!empty($_POST['username'])&&!empty($_POST['password'])) {
    if ($model->IsPassword($_POST["username"], $_POST["password"])) {
        $_SESSION["user"] = $model->GetUserObject();
        if (!empty($_POST['rememberme'])) {
            $model->cookiemonster($_POST['username']);
            return header("Location: /index.php?rem=1");
        }
        return header("Location: /index.php");
    }
}

return header("Location: /login.php");


