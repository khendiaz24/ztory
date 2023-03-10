<?php

/**
 * Projects - Intro Model
 */

namespace Modules\AdminProjects\Models;

class ProjectIntroModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_intro_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'image', 'sequence', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
