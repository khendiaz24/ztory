<?php

/**
 * Projects - Categories Model
 */

namespace Modules\AdminProjects\Models;

class DataProjectCategoriesModel extends \CodeIgniter\Model
{
    protected $table = 'd_project_categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'name_sc', 'name_en', 'createdBy', 'dateCreated', 'updatedBy', 'dateUpdated'];
}
