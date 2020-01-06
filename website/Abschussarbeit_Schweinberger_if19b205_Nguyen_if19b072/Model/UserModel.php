<?php

namespace Model;

$root = $_SERVER['DOCUMENT_ROOT'];
$entity = "/Entities/UserEntity.php";

require_once ($root . $entity);

use Entities\UserEntity;

class UserModel {

    public $username;
    private $password;
    public $firstname;
    public $lastname;
    public $usertype;
    protected $xml;

    public function __construct() {
        $userxml = "/data/xml/user.xml";
        $root = $_SERVER['DOCUMENT_ROOT'];
        $this->xml = simplexml_load_file($root . $userxml) or die("Error: Cannot access database");
    }

    //Check if user and password exists and return an object
    public function IsPassword($username, $password) {
        foreach ($this->xml->xpath('//user') as $user) {
            if ($username == trim($user->username) && $password == trim($user->password)) {
                //below regex replace needed because of weird caracters in xml
                $this->username = preg_replace("/[^a-zA-Z]/", "", $user->username);
                $this->firstname = preg_replace("/[^a-zA-Z]/", "", $user->firstname);
                $this->lastname = preg_replace("/[^a-zA-Z]/", "", $user->lastname);
                $this->usertype = preg_replace("/[^a-zA-Z]/", "", $user['type']);

                return true;
            }
        }
        return false;
    }

    //Hashes username and sets cookie
    public function CreateUserHash($username) {
        $hash = hash('sha256', $username);
        $timeout = 60 * 60 * 12; // 12h
        setcookie("USERHASH", $hash, time() + $timeout, '/', null, false, true);
        return;
    }

    //Checks if cookie is valid
    public function ValidateCookie($USERHASH) {
        foreach ($this->xml->xpath('//user') as $hashcheck) {
            $hashme = preg_replace("/[^a-zA-Z]/", "", $hashcheck->username);
            $hashed = hash('sha256', $hashme);
            if ($hashed == $USERHASH) {
                //below regex replace needed because of weird caracters in xml
                $this->username = preg_replace("/[^a-zA-Z]/", "", $hashcheck->username);
                $this->firstname = preg_replace("/[^a-zA-Z]/", "", $hashcheck->firstname);
                $this->lastname = preg_replace("/[^a-zA-Z]/", "", $hashcheck->lastname);
                $this->usertype = preg_replace("/[^a-zA-Z]/", "", $hashcheck['type']);

                return true;
            }
        }
        return false;
    }

    //Returns model as Entity class object
    public function GetUserObject() {
        $user = new UserEntity();
        $user->username = $this->username;
        $user->usertype = $this->usertype;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;

        $user->last_activity = time();

        return $user;
    }

    public static function IsSessionTimeOut() {
        $timeout = 60 * 5; // 5 min inactivity
        $model = new UserModel();
        if (time() - $_SESSION["user"]->last_activity > $timeout) {

            if (empty($_COOKIE['USERHASH']) || !$model->ValidateCookie($_COOKIE['USERHASH'])) {
                session_unset();
                session_destroy();
                session_start();
                return true;
            }
        }
        $_SESSION["user"]->last_activity = time();
        return false;
    }

    // used in buy requests and show bestellungen
    public static function hasaescrypt() {
        $cryptoptions = openssl_get_cipher_methods();
        foreach ($cryptoptions as $string) {
            if ($string == "aes-128-ctr") {
                return true;
            }
        }
        return false;
    }

}
