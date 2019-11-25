<?php namespace App\Models;

use App\Entities\UserEntity;
use CodeIgniter\Model;

class UserModel extends Model
{
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $usertype;
    protected $xml;

    public function __construct()
    {
        helper("filesystem");
        $this->xml = simplexml_load_file("../app/database/user.xml") or die("Error: Cannot access database");
    }

    public function IsUser($username)
    {
        foreach ($this->xml->xpath('//user') as $user)
        {
            if(trim($username) == trim($user->username))
                return true;
        }
        return false;
    }

    public function IsPassword($username,$password)
    {
        foreach ($this->xml->xpath('//user') as $user)
        {
            if($username == trim($user->username) && $password == trim($user->password))
            {
                $this->username=strval($user->username);
                $this->firstname=strval($user->firstname);
                $this->lastname=strval($user->lastname);
                $this->usertype=strval($user['type']);
                return true;
            }
        }
        return false;
    }

    public function GetUserObject()
    {
        $temp = new UserEntity();
        $temp->username = $this->username;
        $temp->usertype = $this->usertype;
        $temp->firstname = $this->firstname;
        $temp->lastname = $this->lastname;

        return $temp;
    }



}