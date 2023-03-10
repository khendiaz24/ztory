<?php

/**
 * Projects - Branch Volume Model
 */

namespace Modules\AdminProjects\Models;

class ProjectTOBVModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_to_bv_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'image', 'sequence', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
