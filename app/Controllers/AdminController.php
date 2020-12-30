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
    public function markSolution(){
        $a_data = array(
            'a_issolution' => 1
        );
        $q_data = array(
            'q_ishassolution' => 1
        );
        $q_id = $this->request->getPost('q_id');
        $a_id = $this->request->getPost('a_id');
        $this->q_model->markQuestion($q_data, $q_id);
        $this->a_model->markAnswer($a_data,$a_id);
        return redirect()->to(base_url('qna/'.$q_id));
    }
    public function revokeSolution(){
        $a_data = array(
            'a_issolution' => 0
        );
        $q_data = array(
            'q_ishassolution' => 0
        );
        $q_id = $this->request->getPost('q_id');
        $a_id = $this->request->getPost('a_id');
        $this->q_model->markQuestion($q_data, $q_id);
        $this->a_model->markAnswer($a_data,$a_id);
        return redirect()->to(base_url('qna/'.$q_id));
    }
}