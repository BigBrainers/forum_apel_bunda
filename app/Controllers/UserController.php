<?php
namespace App\Controllers;
use App\Models\Question_model;

class UserController extends BaseController{
    public function __construct(){
        $this->model = new Question_model;
    }
    public function index(){
        $data['questions'] = $this->model->getQuestions()->getResult();
        return view('v_user_dash',$data);
    }
    public function questionPost(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body')
        );
        $this->model->postQuestion($data);
        return redirect()->to('/user');
    }
}