<?php

namespace Model;

include_once ("../Entities/UserEntity.php");

use Entities\UserEntity;

class UserModel {

    public $username;
    private $password;
    public $firstname;
    public $lastname;
    public $usertype;
    protected $xml;

    public function __construct() {
        $this->xml = simplexml_load_file("../data/xml/user.xml") or die("Error: Cannot access database");
    }

    public function IsUser($username) {
        foreach ($this->xml->xpath('//user') as $user) {
            if (trim($username) == trim($user->username))
                return true;
        }
        return false;
    }

    public function IsPassword($username, $password) {
        foreach ($this->xml->xpath('//user') as $user) {
            if ($username == trim($user->username) && $password == trim($user->password)) {
                $this->username = strval($user->username);
                $this->firstname = strval($user->firstname);
                $this->lastname = strval($user->lastname);
                $this->usertype = strval($user['type']);
                return true;
            }
        }
        return false;
    }

    public function cookiemonster($username) {
        $hashme = $username;
        $hashed = hash('sha256', "$hashme");
        setcookie("USERHASH", "$hashed", time() + 60 * 10 * 10, '/');
        return true;
    }

    /*public function comparecookie($USERHASH) {
        $xml = simplexml_load_file("data/xml/user.xml") or die("Error: Cannot access database");
        foreach ($xml->xpath('//user') as $hashcheck) {
            $compare = strval($hashcheck->username);
            $hashme = preg_replace("/[^a-zA-Z]/", "", $compare);
            $hashed = hash('sha256', "$hashme");
            if ($hashed == $_COOKIE['USERHASH']) {
                $this->username = strval($user->username);
                $this->firstname = strval($user->firstname);
                $this->lastname = strval($user->lastname);
                $this->usertype = strval($user['type']);
                return true;
            }
        }
        return false;
    }*/

    public function GetUserObject() {
        $user = new UserEntity();
        $user->username = $this->username;
        $user->usertype = $this->usertype;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;

        return $user;
    }

}
