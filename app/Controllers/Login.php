<?php
namespace App\Controllers;
use App\Models\Auth_model;

class Login extends BaseController{
    public function __construct()
    {
        $this->auth = new Auth_model;
    }
    public function index(){
        return view('v_login');
    }

    public function proceed(){
        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));

        $check = $this->auth->getLogin($username, $password);
        if(!empty($check)){
            session()->set("id", $check['user_id']);
            session()->set("username", $check['user_username']);
            session()->set("email", $check['user_email']);
            session()->set("bio", $check['user_bio']);
            session()->set("password", $check['user_password']);
            session()->set("role", $check['user_role']);
            $isAdmin = $check['user_role'] === '2';
            if($isAdmin)
            {
                session()->set("isAdmin", true);
            }else{
                session()->set("isAdmin", false);
            }
            return redirect()->to('/user');
        } else{
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}