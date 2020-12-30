<?php
namespace App\Controllers;
use App\Models\Question_model;
use App\Models\Auth_model;

class UserController extends BaseController{
    public function __construct(){
        $this->model = new Question_model;
        $this->auth = new Auth_model;
    }
    public function index(){
        $data['questions'] = $this->model->getQuestions()->getResult();
        return view('v_user_dash',$data);
    }
    public function questionPost(){
        $data = array(
            'q_title' => $this->request->getPost('q_title'),
            'q_body' => $this->request->getPost('q_body'),
            'q_user_id' => session()->get('id'),
            'q_ishassolution' => 0
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
        $user_id = $this->request->getPost('q_user_id');
        if($user_id = session()->get('id')){
        $this->model->editQuestion($data, $id);
        return redirect()->to('/user');
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
    public function profile(){
        return view('v_profile');
    }
}