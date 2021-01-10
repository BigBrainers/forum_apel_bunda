<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Answer_model extends Model{
        protected $table = "answer";
        protected $table2 = "question";
        protected $table3 = "ab_user";
        protected $primaryKey = "a_id";
        protected $userKey = "a_user_id";
        protected $foreignKey = "a_question_id";
        protected $mainQuery = '`answer`.`a_id`,
                                 `answer`.`a_date`,
                                  `answer`.`a_user_id`,
                                   `answer`.`a_issolution`,
                                    `answer`.`a_question_id`,
                                     `answer`.`a_body`,
                                     `ab_user`.`user_username`';

        public function getAnswer($id) {
            $builder = $this->db->table($this->table);
            $builder->select($this->mainQuery);
            $builder->join($this->table2, 'answer.a_question_id = question.q_id');
            $builder->join($this->table3, 'answer.a_user_id = ab_user.user_id');
            $builder->where('answer.a_question_id', $id);
            $builder->orderBy('answer.a_id', 'DESC');
            return $builder->get();
        }
        public function answerPost($data) {
            return $this->db->table($this->table)->insert($data);
        }
        public function deleteAnswer($id) {
            return $this->db->table($this->table)->delete(array($this->primaryKey => $id));
        }
        public function bulkDeleteAnswers($id) {
            return $this->db->table($this->table)->delete(array($this->foreignKey => $id));
        }
        public function deleteAnswerbyUser($u_id) {
            return $this->db->table($this->table)->delete(array('a_author_id' => $u_id));
        }
        public function editAnswer($data, $id){
            return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
        }
        public function markAnswer($a_data, $a_id){
            return $this->db->table($this->table)->update($a_data, array($this->primaryKey => $a_id));
        }

        public function checkisSolution($u_id) {
            $builder = $this->db->table($this->table);
            $builder->select($this->foreignKey);
            $builder->where('answer.a_user_id', $u_id);
            $builder->where('answer.a_issolution', 1);
            return $builder->get()->getResult();
        }
        
    }
?>