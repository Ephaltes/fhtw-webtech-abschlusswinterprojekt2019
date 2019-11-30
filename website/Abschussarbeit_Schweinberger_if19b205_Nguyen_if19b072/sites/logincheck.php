<?php

include_once ("../Model/UserModel.php");

use Model\UserModel;

$model = new UserModel();

if (!empty($_POST)) {
    if ($model->IsPassword($_POST["username"], $_POST["password"])) {
        session_start();
        $_SESSION["user"] = $model->GetUserObject();
        if (!empty($_POST['rememberme'])) {
            $model->cookiemonster($_POST['username']);
                      return  header("Location: /index.php?rem=1");
        }
         return header("Location: /index.php");
    }
}
 return header("Location: /login.html");


