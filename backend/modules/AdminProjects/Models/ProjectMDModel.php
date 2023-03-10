<?php

/**
 * Projects - More Details Model
 */

namespace Modules\AdminProjects\Models;

class ProjectMDModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_md_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'full_width_image', 'left_image_2', 'right_image_2', 'left_image_3', 
                                'right_top_image_3', 'right_bottom_image_3', 'type', 'sequence', 
                                'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
