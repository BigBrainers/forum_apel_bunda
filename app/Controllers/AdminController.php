<?php
namespace App\Controllers;
use App\Models\Auth_model;

class AdminController extends BaseController{
    public function __construct()
    {
        $this->auth = new Auth_model;
    }
    public function index(){
        return view('v_admin_dash');
    }
}