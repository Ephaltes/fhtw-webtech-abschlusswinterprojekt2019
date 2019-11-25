<?php

if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
if (isset($_GET['passwort'])) {
    $passwort = $_GET['passwort'];
}
if (!(isset($passwort) && isset($username))) {
    echo"crash";
    echo"<script>alert(\"illegal move\");</script>";
    header('Location:index.php');
} else {
    $xml = simplexml_load_file("data/xml/user.xml") or die("Error: Cannot access database");

    foreach ($xml->xpath('//user') as $compareUsername) {
        $tempuser = trim("$compareUsername->username");
        $temppasswort = trim("$compareUsername->password");

        if ($tempuser == $username && $temppasswort == $passwort) {
            $Vorname = (string)$compareUsername->firstname;
            $Nachnahme = (string)$compareUsername->lastname;
            $Privs = (string)$compareUsername['type'];
            echo"hallo";
        }
    }
    if (isset($Vorname) && isset($Nachnahme) && isset($Privs)) {
        session_start();
        $_SESSION['Vorname'] = $Vorname;
        $_SESSION['Nachnahme'] = $Nachnahme;
        $_SESSION['Privs'] = $Privs;
        echo" $Vorname $Nachnahme $Privs";
        header('Location:index.php');
    } else {
        echo"crash3";
        echo"<script>alert(\"fail\");</script>";
        header('Location:index.php');
    }
}

