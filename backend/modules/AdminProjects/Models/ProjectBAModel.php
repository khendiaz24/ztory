<?php

/**
 * Projects - Brand Approach Model
 */

namespace Modules\AdminProjects\Models;

class ProjectBAModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_ba_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'image', 'sequence', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
