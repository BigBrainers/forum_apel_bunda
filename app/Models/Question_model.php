<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Question_model extends Model{
        protected $table = "question";
        protected $table3 = "ab_user";
        protected $userKey = "q_user_id";
        protected $primaryKey = "q_id";
        protected $mainQuery = '`question`.`q_id`,
                                `question`.`q_title`,
                                `question`.`q_body`,
                                `question`.`q_user_id`,
                                `question`.`q_ishassolution`,
                                `question`.`q_date`,
                                `ab_user`.`user_username`,
                                `ab_user`.`user_role`';

        public function getQuestions() {
            $builder = $this->db->table($this->table);
            $builder->select($this->mainQuery);
            $builder->join($this->table3, 'question.q_user_id = ab_user.user_id');
            $builder->limit(5);
            $builder->orderBy('question.q_date', "DESC");
            return $builder->get();
        }
        public function getAQuestions($id) {
            $builder = $this->db->table($this->table);
            $builder->select($this->mainQuery);
            $builder->join($this->table3, 'question.q_user_id = ab_user.user_id');
            $builder->where('q_id', $id);
            return $builder->get();
        }
        public function postQuestion($data) {
            return $this->db->table($this->table)->insert($data);
        }
        public function deleteQuestion($id) {
            return $this->db->table($this->table)->delete(array('q_id' => $id));
        }
        public function deleteQuestionbyUser($u_id) {
            return $this->db->table($this->table)->delete(array($this->userKey => $u_id));
        }
        public function editQuestion($data, $id){
            return $this->db->table($this->table)->update($data, array('q_id' => $id));
        }
        public function markQuestion($q_data, $q_id){
            return $this->db->table($this->table)->update($q_data, array($this->primaryKey => $q_id));
        }
    }
?>