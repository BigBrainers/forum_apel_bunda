<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Question_model extends Model{
        protected $table = "question";
        protected $primaryKey = "q_id";

        public function getQuestions() {
            return $this->db->table($this->table)->get();
        }
        public function getAQuestions($id) {
            $builder = $this->db->table($this->table);
            $builder->where('q_id', $id);
            return $builder->get();
        }
        public function postQuestion($data) {
            return $this->db->table($this->table)->insert($data);
        }
        public function deleteQuestion($id) {
            return $this->db->table($this->table)->delete(array('q_id' => $id));
        }
        public function editQuestion($data, $id){
            return $this->db->table($this->table)->update($data, array('q_id' => $id));
        }
    }
?>