<?php

/**
 * Projects - Learn More Model
 */

namespace Modules\AdminProjects\Models;

class ProjectLMModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_lm_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'image', 'sequence', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
