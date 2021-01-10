<?php
namespace App\Controllers;
use App\Models\Question_model;
use App\Models\Answer_model;
use App\Models\Users_model;

class AdminController extends BaseController{
    public function __construct(){
        $this->q_model = new Question_model;
        $this->a_model = new Answer_model;
        $this->u_model = new Users_model;
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

    public function deleteUser(){
        $u_id = $this->request->getPost('u_id');
        $lists = $this->a_model->checkisSolution($u_id);
        $q_data = array(
            'q_ishassolution' => 0
        );
        foreach ($lists as $list){
            $q_id = $list->a_question_id;
            $this->q_model->markQuestion($q_data, $q_id);
        }
        $this->a_model->deleteAnswerbyUser($u_id);
        $this->q_model->deleteQuestionbyUser($u_id);
        $this->u_model->deleteUser($u_id);
        return redirect()->to(base_url('admin/'));
    }

    public function checkSolution($u_id)
    {
        return $this->a_model->deleteAnswerbyUser($u_id);
    }
    public function viewTable()
    {
    $arr = array(
        'length' => $this->request->getPost('length'),
        'search' => $this->request->getPost('search'),
        'start' => $this->request->getPost("start"),
        'order' => $this->request->getPost('order')
    );
    // var_dump($arr['search']['value']);
    // die();
        $lists = $this->u_model->get_datatables($arr);
            $data = [];
            $no = $this->request->getPost("start");
            foreach ($lists as $list) {
                    $no++;
                    $data[] = array(
                        'user_id' => $list->user_id,
                        'user_username' => $list->user_username,
                        'user_email' => $list->user_email,
                        'role_name' => $list->role_name,
                        'user_date' => $list->user_date,
                        'action' => "<a type='button' class='btn btn-outline-danger deleteUser' data-toggle='modal' data-target='#delUser' data-user_id='$list->user_id' >Delete</a>"
                    );
        }
        $output = ["draw" => $this->request->getPost('draw'),
                            "recordsTotal" => $this->u_model->count_all(),
                            "recordsFiltered" => $this->u_model->count_filtered($arr),
                            "data" => $data];
            echo json_encode($output);
    }
}