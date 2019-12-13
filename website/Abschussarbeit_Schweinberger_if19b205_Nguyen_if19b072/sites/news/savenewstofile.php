<?php

// Youtbe watch id besteht aus 8 stelliger ID die dann base64 encoded wird und dann geschaut ob schon vorhanden
// $returnValue = rand(99999999, 999999999); um 9 stellige zahl zu erstellen inclusive max
if (!empty($_POST)) {

$base64=null;

    if(!empty($_POST["thumbnail_original"]))
    {
        $base64 = $_POST["thumbnail_original"];
    }


    var_dump( sizeof($_FILES["thumbnail"]["size"]));
    return;

    if (!empty($_FILES['thumbnail']["size"])) {
        $file_tmp = $_FILES['thumbnail']['tmp_name'];
        $type = $_FILES['thumbnail']['type'];//pathinfo($file_tmp, PATHINFO_EXTENSION);
        $data = file_get_contents($file_tmp);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    if(!empty($_POST["edit_filename"]))
    {
        $xml_original = simplexml_load_file("../../data/news/".$_POST["edit_filename"]);
    }

    $id_file = "../../data/news/ids";

    if (!file_exists($id_file)) {
        $f = fopen($id_file, "a+");
        fclose($f);
    }
    $json_id = json_decode(file_get_contents($id_file), true);
    do
        {

        $newid = rand(99999999, 999999999); // um 9 stellige zahl zu erstellen inclusive max
        $bool = false;
        if ($json_id != null)
        {
            foreach ($json_id as $i)
            {
                if ($i == $newid)
                {
                    $bool = true;
                }
            }
        }
        else
        {
            $json_id=array();
        }
    } while ($bool);

    array_push($json_id,$newid);


    $dom = new DOMDocument();
    $dom->encoding = "utf-8";
    $dom->formatOutput = true;

    //$title_replaced = str_replace(" ", "", $_POST["title"]);

    $xml_name = base64_encode($newid);
    if(!empty($_POST["edit_filename"]))
        $xml_name=$_POST["edit_filename"];

    $root = $dom->createElement("news");

    $title_node = $dom->createElement("title", trim($_POST["title"]));
    if(empty($_POST["edit_filename"]))
        $time_node = $dom->createElement("date", date("d_m_y_G_i_s"));
    else
        $time_node = $dom->createElement("date", $xml_original->date);
    $content_node = $dom->createElement("content");
    $content_node->appendChild($dom->createCDATASection( $_POST["content"]));
    $image_node = $dom->createElement("thumbnail", $base64 == null ? null : $base64);
    $content_raw = $dom->createElement("content_raw",$_POST["content_raw"]);
    $content_raw = $dom->createElement("id",$newid);

    $root->appendChild($time_node);
    $root->appendChild($title_node);
    $root->appendChild($image_node);
    $root->appendChild($content_node);
    $root->appendChild($content_raw);

    $dom->appendChild($root);

    if ($dom->save("../../data/news/" . $xml_name) != false) {
        file_put_contents($id_file, json_encode($json_id));
        header("Location: ../../news_admin.php");
    } else {
        echo "Es ist ein Fehler aufgetreten";
    }


}
