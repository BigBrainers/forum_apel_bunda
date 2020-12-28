<?php
namespace App\Controllers;
use App\Models\Question_model;

class AdminController extends BaseController{
    public function __construct(){
        $this->model = new Question_model;
    }
    public function index(){
        $data['questions'] = $this->model->getQuestions()->getResult();
        return view('v_admin_dash',$data);
    }
    public function questionPost(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body'),
            'q_user_id' => session()->get('id')
        );
        $this->model->postQuestion($data);
        return redirect()->to('/admin');
    }
    public function deletePost(){
        $id = $this->request->getPost('q_id');
        $this->model->deleteQuestion($id);
        return redirect()->to('/admin');
    }
}