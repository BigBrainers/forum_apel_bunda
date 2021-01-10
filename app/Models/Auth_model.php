<?php
  
namespace App\Models;
  
use CodeIgniter\Model;
  
class Auth_model extends Model{
  
    protected $table = "ab_user";
    protected $primaryKey = "user_id";
  
    public function getLogin($username, $password)
    {
        $builder = $this->db->table($this->table);
        $builder->select('user_id, user_email, user_role, user_username, user_password');
            $builder->groupStart();
                $builder->where(['user_username' => $username]);
                $builder->orGroupStart();
                    $builder->orWhere(['user_email' => $username]);
                $builder->groupEnd();
            $builder->groupEnd();
            $builder->where(['user_password' => $password]);
        return $builder->get()->getRowArray();
    }

    public function userRegist($data){
        return $this->db->table($this->table)->insert($data);
    }
}