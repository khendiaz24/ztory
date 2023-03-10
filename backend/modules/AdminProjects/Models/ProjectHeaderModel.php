<?php

/**
 * Projects Header Model
 */

namespace Modules\AdminProjects\Models;

class ProjectHeaderModel extends \CodeIgniter\Model
{
    protected $table = 'p_project_header';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'title_sc', 'title_en', 'updatedBy', 'dateUpdated'];
}
