<?php
require_once ("../../Entities/UserEntity.php");
session_start();
$user = $_SESSION["user"];
if(!empty($user) && $user->usertype="admin")
{
    $filename = $_POST["file_name"];
    $id_file = "../../data/news/ids";
    $img_dir = "../../img/$filename";

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

    if (is_dir($img_dir) === true) {
        rmdir_recursive($img_dir);
    }


    header("Location: ../../news_admin.php");
}


function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}
