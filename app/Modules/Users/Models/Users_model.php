<?php 
namespace App\Modules\Users\Models;
use CodeIgniter\Model;
class Users_model extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'jenis_kelamin', 'alamat', 'username', 'role', 'tempat_lahir', 'tanggal_lahir', 'created_date','status', 'login_key', 'login_expired'];
    public function getRole($obj = 1, $role = null){
        $rolesList = ['Sysadmin' => 'System Admnistrator', 'User' => 'Customer'];
        switch($obj){
            case 2:
                return $rolesList[$role] ?? '';
            break;
            default: 
                return $rolesList;
        }
    }
}