<?php

/**
 * Projects - Events Model
 */

namespace Modules\AdminProjects\Models;

class ProjectTTEventsModel extends \CodeIgniter\Model
{
    protected $table = 'p_projects_tt_events_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'image', 'sequence', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
