<?php
require_once ("../../Entities/UserEntity.php");
session_start();
$user = $_SESSION["user"];
if(!empty($user) && $user->usertype="admin")
{
    $filename = $_POST["file_name"];
    unlink("../../data/news/".$filename);

    header("Location: ../../news_admin.php");
}

