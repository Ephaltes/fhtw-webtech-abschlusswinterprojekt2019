<?php

// should simulate an actual buy offer coming in and writes in same dir as json file.
// used in Meine Bestellungen.php zum zeigen der Bestellung
require_once("../../../Entities/UserEntity.php");
include_once ("../../../Model/UserModel.php");

use Model\UserModel;

session_start();
if (!empty($_SESSION["user"])) {
    if (UserModel::IsSessionTimeOut()) {
        $_SESSION['Einkaufdank'] = "Fehler";
        header('location: /');
    }
    $user = $_SESSION["user"];
} else {
    header('location: /');
}
if (!(UserModel::hasaescrypt())) {
    $_SESSION['Einkaufdank'] = "internerfehler";
    header('location: /');
    
} else if (!empty($_SESSION['cart']) && $user->usertype == 'user') {
    $dir = "";
    $dir .= trim("$user->username");
    $dir .= "_";
    $dir .= time();
    $dir .= ".json";
    $myfile = fopen($dir, "c") or die("Unable to open file!"); // create new file with UTC timestamp + username
    $gesamtpreis = 0;
    $json = array();
    foreach ($_SESSION['cart'] as $key) { //foreach item in $session cart
        $anzahl = $key['quantity'];
        $item = $key['item'];

        $read = file_get_contents("../json_datein/produkte.json"); //gets a string
        if ($read === false) {
            // deal with error...
        } else {
            // var_dump($read);
            $read = json_decode($read); //decodes string to array
        }
        foreach ($read as $data) { // write in file for each item
            if ($data->id == $item) {
                $gesamtpreis += $data->preis * $anzahl;
                $arrayitem = array('Anzahl' => $anzahl, 'Price' => $data->preis, 'itemID' => $item, 'titel' => $data->titel);
                array_push($json, $arrayitem);
            }
        }
    }
    $gesamtpreis = round($gesamtpreis, 4);
    $feedback = array('feedback' => $_POST['feedback'], 'Gesamtpreis' => $gesamtpreis);
    array_push($json, $feedback);
    $json = json_encode($json);
    $key = $user->username;
    $key .= 'FHTWWIEN';

    $json = openssl_encrypt($json, "AES-128-CTR", $key, 0, '1234567891011121'); //comment this line if u want plaintext
    fwrite($myfile, $json);
    fclose($myfile);
    $_SESSION['Einkaufdank'] = "true";
    unset($_SESSION['cart']);
    header('location: /');
    
} else {
    $_SESSION['Einkaufdank'] = "Fehler";
    header('location: /');
}
?>
