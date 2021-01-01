<?php
namespace App\Controllers;
use App\Models\Auth_model;

class Register extends BaseController{
    public function __construct()
    {
        $this->auth = new Auth_model;
    }
    public function index(){
        return view('v_register');
    }
    public function usernamecheck(){
        if ($this->request->isAJAX()) {
            $username = service('request')->getPost('username');
            $check = $this->auth->checkUsername($username);
            //var_dump($this->request->getPost('query'));
            if(!empty($check)){
                return json_encode(['success'=> 'success', 'csrf' => csrf_hash(), 'available' => false ]);
            }else{
                return json_encode(['success'=> 'success', 'csrf' => csrf_hash(), 'available' => true ]);
            }
            
        }
    }

    public function emailCheck(){
        if ($this->request->isAJAX()) {
            $email = service('request')->getPost('email');
            $check = $this->auth->checkEmail($email);
            //var_dump($this->request->getPost('query'));
            if(!empty($check)){
                return json_encode(['success'=> 'success', 'csrf' => csrf_hash(), 'available' => false ]);
            }else{
                return json_encode(['success'=> 'success', 'csrf' => csrf_hash(), 'available' => true ]);
            }
            
        }
    }

    public function proceed(){
        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));
        $email = htmlspecialchars($this->request->getPost('email'));
        $data = [
            'user_username' => $username,
            'user_password'  => $password,
            'user_email'  => $email,
            'user_role'  => 1
    ];
       $this->auth->userRegist($data);
       return redirect()->to('/login');
    }
}