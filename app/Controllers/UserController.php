<?php
namespace App\Controllers;

use App\Models\Answer_model;
use App\Models\Question_model;
use App\Models\Auth_model;

class UserController extends BaseController{
    public function __construct(){
        $this->q_model = new Question_model;
        $this->a_model = new Answer_model;
        $this->auth = new Auth_model;
    }
    public function index(){
        $data['questions'] = $this->q_model->getQuestions()->getResult();
        return view('v_user_dash',$data);
    }
    public function questionPost(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body'),
            'q_user_id' => session()->get('id'),
            'q_ishassolution' => 0
        );
        $this->q_model->postQuestion($data);
        return redirect()->to('/user');
    }
    public function questionEdit(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body')
        );
        $id = $this->request->getPost('q_id');
        $user_id = $this->request->getPost('q_user_id');
        if(intval($user_id) == intval(session()->get('id'))){
        $this->q_model->editQuestion($data, $id);
        return redirect()->to('/user');
        }else{
            return redirect()->to('/user');
        }
    }

    public function editAnswer(){
        $data = array(
            'a_body' => $this->request->getPost('a_body')
        );
        $id = $this->request->getPost('a_id');
        $user_id = $this->request->getPost('a_user_id');
        if(intval($user_id) == intval(session()->get('id'))){
        $this->a_model->editAnswer($data, $id);
        return redirect()->to(base_url('qna/'.$this->request->getPost('q_id')));
        }else{
            return redirect()->to('/user');
        }
    }
    public function editBio(){
        $data = array(
            'user_bio' => $this->request->getPost('u_bio'),
            'user_id' => session()->get('id')
        );
        $goedit = $this->auth->editBio($data);
        if($goedit){
            session()->set("bio", $this->request->getPost('u_bio'));
            return redirect()->to('/user/profile');
        }
        return redirect()->to('/user/profile');
       
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
        $user_id = $this->request->getPost('q_user_id');
        if(intval($user_id) == intval(session()->get('id'))){
        $this->q_model->markQuestion($q_data, $q_id);
        $this->a_model->markAnswer($a_data,$a_id);
        return redirect()->to(base_url('qna/'.$q_id));
        }else{
            return redirect()->to('/user');
        }
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
        $user_id = $this->request->getPost('q_user_id');
        if(intval($user_id) == intval(session()->get('id'))){
        $this->q_model->markQuestion($q_data, $q_id);
        $this->a_model->markAnswer($a_data,$a_id);
        return redirect()->to(base_url('qna/'.$q_id));
        }else{
            return redirect()->to('/user');
        }
    }
    public function profile(){
        return view('v_profile');
    }
}