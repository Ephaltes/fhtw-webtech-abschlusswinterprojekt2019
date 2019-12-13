<?php

const ROOTSAVEIMAGE = "../../img/";

if (!empty($_POST)) {


    if (!empty($_POST["edit_filename"])) {
        $xml_original = simplexml_load_file("../../data/news/" . $_POST["edit_filename"]);
        $xml_name = $_POST["edit_filename"];
    }
    else
    {
    $id_file = "../../data/news/ids";

    if (!file_exists($id_file)) {
        $f = fopen($id_file, "a+");
        fclose($f);
    }
    $json_id = json_decode(file_get_contents($id_file), true);
    do {
            // Youtbe watch id besteht aus 8 stelliger ID die dann base64 encoded wird und dann geschaut ob schon vorhanden
            // $returnValue = rand(99999999, 999999999); um 9 stellige zahl zu erstellen inclusive max
        $newid = rand(99999999, 999999999);
        $bool = false;
        if ($json_id != null) {
            foreach ($json_id as $i) {
                if ($i == $newid) {
                    $bool = true;
                }
            }
        } else {
            $json_id = array();
        }
    } while ($bool);

    array_push($json_id, $newid);
    $xml_name = base64_encode($newid);
    }

    $dom = new DOMDocument();
    $dom->encoding = "utf-8";
    $dom->formatOutput = true;

    $dir = DeleteAndCreateFolder(ROOTSAVEIMAGE . $xml_name);

    foreach ($_POST["thumbnail"] as $x) {
        base64_to_file($x, $dir . "/" . uniqid());
    }

    $root = $dom->createElement("news");

    $title_node = $dom->createElement("title", trim($_POST["title"]));
    if (empty($_POST["edit_filename"]))
        $time_node = $dom->createElement("date", date("d_m_y_G_i_s"));
    else
        $time_node = $dom->createElement("date", $xml_original->date);
    $content_node = $dom->createElement("content");
    $content_node->appendChild($dom->createCDATASection($_POST["content"]));
    $content_raw = $dom->createElement("content_raw", $_POST["content_raw"]);
    if (empty($_POST["edit_filename"]))
    $content_raw = $dom->createElement("id", $newid);
    else
        $content_raw = $dom->createElement("id", $xml_original->id);

    $root->appendChild($time_node);
    $root->appendChild($title_node);
    $root->appendChild($content_node);
    $root->appendChild($content_raw);

    $dom->appendChild($root);

    if ($dom->save("../../data/news/" . $xml_name) != false) {
        if (empty($_POST["edit_filename"]))
            file_put_contents($id_file, json_encode($json_id));
        header("Location: ../../news_admin.php");
    } else {
        echo "Es ist ein Fehler aufgetreten";
    }


}

function DeleteAndCreateFolder($dir)
{
    if (is_dir($dir) === false) {
        mkdir($dir);
    }
    else
        {
            rmdir_recursive($dir);
            mkdir($dir);
        }

    return $dir;
}

function base64_to_file($base64_string, $output_file)
{

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    if ($data > 1) {
        // open the output file for writing
        $ifp = fopen($output_file, 'wb');
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);
        return true;
    }
    return false;
}

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}
