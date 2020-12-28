<?php
namespace App\Controllers;
use App\Models\Question_model;
use App\Models\Answer_model;

class QnaController extends BaseController{
    public function __construct(){
        $this->q_model = new Question_model;
        $this->a_model = new Answer_model;
    }
    public function index(){
        $id = $this->request->getPost('q_id');
        $data['questions'] = $this->q_model->getAQuestions($id)->getResult();
        $data['answers'] = $this->a_model->getAnswer($id)->getResult();
        return view('v_details',$data);
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