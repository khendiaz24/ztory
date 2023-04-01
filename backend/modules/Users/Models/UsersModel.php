<?php

/**
 * Users Models
 */

namespace Modules\Users\Models;

class UsersModel extends \CodeIgniter\Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'forgotten_password_code', 'forgotten_password_time', 'created_on', 'last_login', 'active', 'first_name', 'last_name', 'company', 'title', 'phone', 'photo', 'staff_id', 'role', 'themes'];
}