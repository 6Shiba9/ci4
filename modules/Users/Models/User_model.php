<?php
namespace Modules\Users\Models;
use CodeIgniter\Model;

class User_model extends Model {
    protected $table = 'data_users';
    
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'address', 'phone'];

}