<?php
require_once ("../../Entities/UserEntity.php");
session_start();
$user = $_SESSION["user"];
if(!empty($user) && $user->usertype="admin")
{
    $filename = $_POST["file_name"];
    $id_file = "../../data/news/ids";


    $xml = simplexml_load_file("../../data/news/" . $filename);
    if (!file_exists($id_file)) {
        $f = fopen($id_file, "a+");
        fclose($f);
    }
    $json_id = json_decode(file_get_contents($id_file), true);

    $count=0;
    foreach($json_id as $i)
        {
            if($i == $xml->id)
            {
                unset($json_id[$count]);
                break;
            }
            $count++;
        }
    file_put_contents($id_file, json_encode($json_id));
    unlink("../../data/news/".$filename);

    header("Location: ../../news_admin.php");
}

