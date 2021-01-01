<?php
namespace App\Controllers;
use App\Models\Question_model;
use App\Models\Answer_model;

class AdminController extends BaseController{
    public function __construct(){
        $this->q_model = new Question_model;
        $this->a_model = new Answer_model;
    }
    public function index(){
        $data['questions'] = $this->q_model->getQuestions()->getResult();
        return view('v_admin_dash',$data);
    }
    public function deletePost(){
        $id = $this->request->getPost('q_id');
        $this->a_model->bulkDeleteAnswers($id);
        $this->q_model->deleteQuestion($id);
        return redirect()->to('/user');
    }
    public function deleteAnswer(){
        $id = $this->request->getPost('a_id');
        $this->a_model->deleteAnswer($id);
        return redirect()->to(base_url('qna/'.$this->request->getPost('a_question_id')));
    }
}