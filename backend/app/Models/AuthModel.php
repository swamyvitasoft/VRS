<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'auth';
    protected $primaryKey = 'auth_id';
    protected $allowedFields = ['pidData', 'nmPoints', 'qScore', 'skey', 'skey_ci', 'hmac', 'dataa', 'data_type', 'status', 'login_id'];
}
