<?php

/**
 * User Roles Models
 */

namespace Modules\Users\Models;

class UserrolesModel extends \CodeIgniter\Model
{
    protected $table = 'sys_roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
