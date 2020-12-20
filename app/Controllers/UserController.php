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
            'q_body' => $this->request->getPost('q_body'),
            'q_user_id' => session()->get('id')
        );
        $this->model->postQuestion($data);
        return redirect()->to('/user');
    }
    public function questionEdit(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body')
        );
        $id = $this->request->getPost('q_id');
        $this->model->editQuestion($data, $id);
        return redirect()->to('/user');
    }
}