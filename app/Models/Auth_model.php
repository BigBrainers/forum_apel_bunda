<?php
  
namespace App\Models;
  
use CodeIgniter\Model;
  
class Auth_model extends Model{
  
    protected $table = "ab_user";
    protected $primaryKey = "user_id";
  
    public function getLogin($username, $password)
    {
        return $this->db->table($this->table)->where(['user_username' => $username, 'user_password' => $password])->get()->getRowArray();
    }

    public function checkUsername($username){
        return $this->db->table($this->table)->where(['user_username' => $username])->get()->getRowArray();
    }
    public function checkEmail($email){
        return $this->db->table($this->table)->where(['user_email' => $email])->get()->getRowArray();
    }
    public function userRegist($data){
        return $this->db->table($this->table)->insert($data);
    }
}