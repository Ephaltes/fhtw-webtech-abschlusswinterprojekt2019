<?php
session_start();
//integrate UserEntity Class
$root = $_SERVER['DOCUMENT_ROOT'];
$dep_inj = "/sites/dependency_include/include_user.php";
require_once($root . $dep_inj);
use Model\UserModel;

if (!empty($_SESSION["user"])) {
    if(UserModel::IsSessionTimeOut())
        header('location: /');
    $user = $_SESSION["user"];
}

if(!empty($user) && $user->usertype="admin")
{
    $filename = $_POST["file_name"];
    $id_file = "../../data/news/ids";
    $img_dir = "../../img/$filename";

    $xml = simplexml_load_file("../../data/news/" . $filename);

    //create id file if not exist
    if (!file_exists($id_file)) {
        $f = fopen($id_file, "a+");
        fclose($f);
    }
    //read from id file as array
    $json_id = json_decode(file_get_contents($id_file), true);

    $count=0;
    foreach($json_id as $i)
        {
            if($i == $xml->id)
            {
                //if i == id from file to delete delete that line
                unset($json_id[$count]);
                break;
            }
            $count++;
        }
    //write everything back without that deleted item into the file
    file_put_contents($id_file, json_encode($json_id));
    //delete file
    unlink("../../data/news/".$filename);

    //if there is an image folder delete everything
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
