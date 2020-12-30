<?php
namespace App\Controllers;
use App\Models\Question_model;
use App\Models\Answer_model;

class QnaController extends BaseController{
    public function __construct(){
        $this->q_model = new Question_model;
        $this->a_model = new Answer_model;
    }
    public function index($id){
        $data['questions'] = $this->q_model->getAQuestions($id)->getResult();
        $data['answers'] = $this->a_model->getAnswer($id)->getResult();
        return view('v_details',$data);
    }
    public function answerPost(){
        $data = array(
            'a_body' => $this->request->getPost('a_body'),
            'a_question_id' => $this->request->getPost('a_question_id'),
            'a_user_id' => session()->get('id'),
            'a_issolution' => 0
        );
        $this->a_model->answerPost($data);
        return redirect()->to($this->request->getPost('a_question_id'));
    }

}