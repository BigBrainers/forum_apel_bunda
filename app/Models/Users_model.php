<?php
  
namespace App\Models;
use CodeIgniter\Model;
class Users_model extends Model{
  
    protected $table = "ab_user";
    protected $table3 = "ab_user_roles";
    protected $primaryKey = "user_id";
    protected $mainQuery = "`ab_user.user_id`, `ab_user.user_username`, `ab_user.user_email`, `ab_user_roles.role_name`, `ab_user.user_date`";
    protected $column_order = array('user_id', 'user_username', 'user_email', 'role_name', 'user_date');
    protected $column_search = array('user_username', 'user_email');
    protected $order = array('user_id' => 'desc');
    protected $request;
    protected $db;
    protected $dt;

    public function __construct(){
        parent::__construct();
        $this->dt = $this->db->table($this->table);
     }

    public function checkUsername($username){
        return $this->db->table($this->table)->where(['user_username' => $username])->get()->getRowArray();
    }
    public function checkEmail($email){
        return $this->db->table($this->table)->where(['user_email' => $email])->get()->getRowArray();
    }
    public function editBio($data){
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $data['user_id']));
    }
    public function deleteUser($u_id){
        return $this->db->table($this->table)->delete(array($this->primaryKey => $u_id));
    }
    public function getUserdata($username)
    {
        $builder = $this->db->table($this->table);
        $builder->select('user_id, user_email, user_role, user_username, user_bio, user_date');
        $builder->where(['user_username' => $username]);
        return $builder->get();
    }
     private function _get_datatables_query($arr){
         $i = 0;
         foreach ($this->column_search as $item){
             if($arr['search']['value']){ 
                 if($i == 0){
                     $this->dt->groupStart();
                     $this->dt->like($item, $arr['search']['value']);
                 }
                 else{
                     $this->dt->orLike($item, $arr['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i)
                     $this->dt->groupEnd();
             }
             $i++;
         }
          
         if($arr['order']){
                 $this->dt->orderBy($this->column_order[$arr['order']['0']['column']], $arr['order']['0']['dir']);
             } 
         else if(isset($this->order)){
             $order = $this->order;
             $this->dt->orderBy(key($order), $order[key($order)]);
         }
     }
     function get_datatables($arr){
         $this->_get_datatables_query($arr);
         if($arr['length'] != -1)
         $this->dt->select($this->mainQuery);
         $this->dt->limit($arr['length'], $arr['start']);
         $this->dt->join($this->table3, 'ab_user_roles.role_id = ab_user.user_role');
         $query = $this->dt->get();
         return $query->getResult();
     }
     function count_filtered($arr){
         $this->_get_datatables_query($arr);
         return $this->dt->countAllResults();
     }
     public function count_all(){
         $tbl_storage = $this->db->table($this->table);
         return $tbl_storage->countAllResults();
     }
}