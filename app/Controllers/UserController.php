<?php
namespace App\Controllers;
use App\Models\Auth_model;

class UserController extends BaseController{
    public function __construct()
    {
        $this->auth = new Auth_model;
    }
    public function index(){
        return view('v_user_dash');
    }
}