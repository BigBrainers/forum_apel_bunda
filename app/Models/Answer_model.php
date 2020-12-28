<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Answer_model extends Model{
        protected $table = "answer";
        protected $table2 = "question";
        protected $table3 = "user";
        protected $primaryKey = "a_id";

        public function getAnswer($id) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->join($this->table2, 'answer.a_question_id = question.q_id');
            $builder->where('answer.a_question_id', $id);
            $builder->groupBy('answer.a_id');
            return $builder->get();
        }
        public function postAnswer($data) {
            return $this->db->table($this->table)->insert($data);
        }
        public function deleteAnswer($id) {
            return $this->db->table($this->table)->delete(array($this->primaryKey => $id));
        }
        public function editAnswer($data, $id){
            return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
        }
    }
?>