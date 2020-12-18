<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Question_model extends Model{
        protected $table = "question";
        protected $primaryKey = "q_id";

        public function getQuestions() {
            return $this->db->table($this->table)->get();
        }
        public function postQuestion($data) {
            return $this->db->table($this->table)->insert($data);
        }
        public function deleteQuestion($id) {
            return $this->db->table($this->table)->delete(array('q_id' => $id));
        }
    }
?>