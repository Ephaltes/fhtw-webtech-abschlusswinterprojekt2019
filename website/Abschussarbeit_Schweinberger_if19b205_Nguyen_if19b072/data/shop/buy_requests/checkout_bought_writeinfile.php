<?php

require_once("../../../Entities/UserEntity.php");
session_start();
if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header('location: /');
}
if (!empty($_SESSION['cart'])) {
    $dir = "";
    $dir .= time();
    $dir .= trim("$user->username");
    $dir .= ".txt";
    $myfile = fopen($dir, "c") or die("Unable to open file!");
    foreach ($_SESSION['cart'] as $key) {
        $anzahl = $key['quantity'];
        $item = $key['item'];

        //json read needed here no clue why ????? will say not a object if somewhere else
        $read = file_get_contents("../json_datein/produkte.json"); //gets a string
        if ($read === false) {
            // deal with error...
        } else {
            // var_dump($read);
            $read = json_decode($read); //decodes string to array
        }
        foreach ($read as $data) {
            if ($data->id == $item) {
                $txt = "";
                $txt .= "Anzahl:$anzahl";
                $txt .= "_Pricewas:$data->preis";
                $txt .= "_itemID:$item";
                $txt .= "_end\n";
                fwrite($myfile, $txt);
            }
        }
    }
    fwrite($myfile, "$_POST[feedback]");
    fclose($myfile);
    unset($_SESSION['cart']);
}
header('location: /');
?>
