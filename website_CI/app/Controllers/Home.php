<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends Controller
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

	public function index()
	{
	    if($this->session->has("user"))
        {
            $data["user"]=$this->session->get("user");
            return view('Home/index',$data);
        }

		return view('Home/index');
	}

	public function login()
    {
        $model = new UserModel();

        if(!$model->IsPassword($this->request->getPost("username"),$this->request->getPost("password")))
        {
            return redirect()->to(base_url(). "/home/index");
        }
        $this->session->start();
        $this->session->set("user",$model->GetUserObject());

        //echo var_dump($this->session->get("user"));
        return redirect()->to(base_url());
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url(). "/home/index");
    }

    public function shop()
    {
        if(!$this->session->has("user"))
        {
            return redirect()->to(base_url(). "/home/index");
        }

            $data["user"]=$this->session->get("user");
            return view("home/shop");

    }

    public function about()
    {
        if($this->session->has("user"))
        {
            $data["user"]=$this->session->get("user");
        }

        return view("home/about");
    }

}
