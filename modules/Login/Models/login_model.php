<?php 
namespace Modules\Login\Models;
use CodeIgniter\Model;

class login_model extends Model
{
    protected $table = 'login';
    protected $allowedFields = ['user_name', 'user_email','user_password','user_created_at',];
}