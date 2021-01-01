<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Answer_model extends Model{
        protected $table = "answer";
        protected $table2 = "question";
        protected $table3 = "ab_user";
        protected $primaryKey = "a_id";
        protected $foreignKey = "a_question_id";

        public function getAnswer($id) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
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
        public function editAnswer($data, $id){
            return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
        }
        public function markAnswer($a_data, $a_id){
            return $this->db->table($this->table)->update($a_data, array($this->primaryKey => $a_id));
        }
        
    }
?>