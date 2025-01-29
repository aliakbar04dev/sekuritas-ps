<?php 
namespace App\Modules\Frontpage\Models;
use CodeIgniter\Model;
class hubungi_kami extends Model{
    protected $table = 'hubungi_kami';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'email', 'subjek', 'pesan', 'created_at', 'updated_at', 'status'
    ];
}