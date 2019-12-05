<?php

// Youtbe watch id besteht aus 8 stelliger ID die dann base64 encoded wird und dann geschaut ob schon vorhanden
// $returnValue = rand(9999999, 100000000); um 8 stellige zahl zu erstellen
if (!empty($_POST)) {

$base64=null;

    if(!empty($_POST["thumbnail_original"]))
    {
        $base64 = $_POST["thumbnail_original"];
    }

    if (!empty($_FILES['thumbnail']["size"])) {
        $file_tmp = $_FILES['thumbnail']['tmp_name'];
        $type = $_FILES['thumbnail']['type'];//pathinfo($file_tmp, PATHINFO_EXTENSION);
        $data = file_get_contents($file_tmp);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        //echo var_dump($_FILES["thumbnail"]);
    }

    if(!empty($_POST["edit_filename"]))
    {
        $xml_orgiginal = simplexml_load_file("../../data/news/ids") or die("Error: Cannot access database");

        foreach ($this->xml->xpath('//user') as $user) {
            if (trim($username) == trim($user->username))
                return true;
        }
    //geht noch nicht
    }

    $dom = new DOMDocument();
    $dom->encoding = "utf-8";
    $dom->formatOutput = true;

    $title_replaced = str_replace(" ", "", $_POST["title"]);

    $xml_name = $title_replaced . "_" . date("d_m_y_G_i_s") . ".xml";
    if(!empty($_POST["edit_filename"]))
        $xml_name=$_POST["edit_filename"];

    $root = $dom->createElement("news");

    $title_node = $dom->createElement("title", trim($_POST["title"]));
    if(empty($_POST["edit_filename"]))
    $time_node = $dom->createElement("date", date("d_m_y_G_i_s"));
    $content_node = $dom->createElement("content");
    $content_node->appendChild($dom->createCDATASection( $_POST["content"]));
    $image_node = $dom->createElement("thumbnail", $base64 == null ? null : $base64);
    $content_raw = $dom->createElement("content_raw",$_POST["content_raw"]);

    $root->appendChild($time_node);
    $root->appendChild($title_node);
    $root->appendChild($image_node);
    $root->appendChild($content_node);
    $root->appendChild($content_raw);

    $dom->appendChild($root);

    if ($dom->save("../../data/news/" . $xml_name) != false) {
        header("Location: ../../news_admin.php");
    } else {
        echo "Es ist ein Fehler aufgetreten";
    }


}
